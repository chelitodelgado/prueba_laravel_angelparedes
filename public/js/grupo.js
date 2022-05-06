(function ($) {
    'use strict';

    function tablaGrupos() {
        $("#table_grupos").DataTable({
            processing: false,
            serverSide: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            ajax: {
                url: "api/grupos",
                type: "GET",
                method: "GET",
                dataType: 'json'
            },
            columns: [
                { data: "semestre" },
                { data: "grupo" },
                { data: "turno" },
                {
                    data: "id", render: function (data) {
                        return `
                        <div class="table-action">
                            <a id="${data}" style='cursor: pointer;' class="edit action-icon"> <i class="fa fa-pencil"></i></a>
                            <a id="${data}" style='cursor: pointer;' class="del action-icon"> <i class="fa fa-trash"></i></a>
                        </div>
                        `;
                    }
                },
            ]
        });
    }

    $('#form_grupo').validate({
        rules: {
          semestre: {
            required: true
          },
          grupo: {
            required: true
          },
          turno: {
            required: true
          }
        },
        messages: {
          semestre: {
            required: 'Registra un semestre.'
          },
          grupo: {
            required: 'Registra un grupo.'
          },
          turno: {
            required: 'Registra un turno'
          }
        },
        submitHandler: function (form) {
            if ($('#guardar').val() == 'Guardar') {
                $(form).ajaxSubmit({
                    type: 'POST',
                    data: $(form).serialize(),
                    url: 'api/insertGrupo',
                    success: function () {
                        $('#table_grupos').DataTable().ajax.reload();
                        $('#form_grupo')[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Se agrego un nuevo estudiante.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function () {
                      Swal.fire({
                        icon: 'error',
                        title: 'TOpps no fue posible agregar el estudiante verifica los campos.',
                        showConfirmButton: false,
                        timer: 1500
                      }); 
                    }
                });
            }
            else if ($('#guardar').val() == 'Actualizar') {
                $(form).ajaxSubmit({
                    type: 'POST',
                    data: $(form).serialize(),
                    url: 'api/updateGrupo',
                    success: function () {
                        $('#table_grupos').DataTable().ajax.reload();
                        $('#form_grupo')[0].reset();
                        $('#guardar').removeClass('btn-outline-success');
                        $('#guardar').addClass('btn-outline-primary');
                        $('#guardar').val('Guardar');
                        Swal.fire({
                            icon: 'success',
                            title: 'La información del estudiante fue actualizada.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function () {
                      Swal.fire({
                        icon: 'error',
                        title: 'Opps no fue posible actualizar al estudiante',
                        showConfirmButton: false,
                        timer: 1500
                      }); 
                    }
                });
            }
        }
    });

    $(document).on('click', '.edit', function () {
        var id_grupo;
        id_grupo = $(this).attr('id');
        $.ajax({
            url: 'api/editGrupo',
            method: "POST",
            type: "POST",
            dataType: 'json',
            data: { 'id': id_grupo },
            success: function (data) {
                $('#semestre').val(data.data[0].semestre);
                $('#grupo').val(data.data[0].grupo);
                $('#turno').val(data.data[0].turno);
                $('#id').val(data.data[0].id);

                $('#guardar').removeClass('btn-outline-primary');
                $('#guardar').addClass('btn-outline-success');
                $('#guardar').val('Actualizar');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
            }
        });
    });

    $(document).on('click', '.del', function () {
        var id_estudiante;
        id_estudiante = $(this).attr('id');
        $.ajax({
            url: 'api/destroyGrupo',
            method: "POST",
            type: "POST",
            dataType: 'json',
            data: { 'id': id_estudiante },
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Eliminar grupo',
                    text: 'Un grupo fue eliminada con exito.',
                });
                $('#table_grupos').DataTable().ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No fue posible eliminar el grupo intente nuevamente.',
                });
            }
        });
    });

    tablaGrupos();


})(jQuery);
