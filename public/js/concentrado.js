(function ($) {
    'use strict';

    function tablaConcentrados() {
        $("#table_concentrados").DataTable({
            processing: false,
            serverSide: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            ajax: {
                url: "api/concentrados",
                type: "GET",
                method: "GET",
                dataType: 'json'
            },
            columns: [
                { data: "nombre" },
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

    function listEstudiantes() {
        $('#id_estudiante').select2();
        $.ajax({
            url: 'api/listEstudiantes',
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                $('#id_estudiante').append($('<option>', {
                    value: null,
                    text: 'Selecciona un estudiante'
                }));
                $.each(data.data, function (i, item) {
                    $('#id_estudiante').append($('<option>', {
                        value: item.id,
                        text: item.nombre + ' ' +item.apellidos
                    }));
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
            }
        });
    }
    function listGrpos() {
        $('#id_grupo').select2();
        $.ajax({
            url: 'api/listGrupos',
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {

                $('#id_grupo').append($('<option>', {
                    value: null,
                    text: 'Selecciona un grupo'
                }));
                $.each(data.data, function (i, item) {
                    $('#id_grupo').append($('<option>', {
                        value: item.id,
                        text: item.semestre +' - '+ item.grupo
                    }));
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
            }
        });
    }

    $('#form_concentrado').on('submit', function (event) {
        event.preventDefault();
        if ($('#guardar').val() == 'Guardar') {
            $.ajax({
                url: 'api/insertConcentrado',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Asignar estudiante a un grupo',
                        text: 'Se agrego un estudiante al grupo con exito.',
                    });
                    $('#table_concentrados').DataTable().ajax.reload();
                    $('#form_concentrado')[0].reset();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No fue posible asignar un estudiante el grupo intente nuevamente.',
                    });
                }
            });
        }
        else if ($('#guardar').val() == 'Actualizar') {
            $.ajax({
                url: 'api/updateConcentrado',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Actualizar grupo',
                        text: 'Se actualizo un grupo con exito.',
                    });
                    $('#table_concentrados').DataTable().ajax.reload();
                    $('#form_concentrado')[0].reset();
                    $('#guardar').removeClass('btn-outline-success');
                    $('#guardar').addClass('btn-outline-primary');
                    $('#guardar').val('Guardar');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No fue posible actualizar el grupo intente nuevamente.',
                    });
                }
            });
        }
    });

    $(document).on('click', '.edit', function () {
        var id_grupo;
        id_grupo = $(this).attr('id');
        $.ajax({
            url: 'api/editConcentrado',
            method: "POST",
            type: "POST",
            dataType: 'json',
            data: { 'id': id_grupo },
            success: function (data) {
                $('#id_estudiante').val(data.data[0].id_estudiante);
                $('#id_grupo').val(data.data[0].id_grupo);
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
        var id_esgr;
        id_esgr = $(this).attr('id');
        $.ajax({
            url: 'api/destroyConcentrado',
            method: "POST",
            type: "POST",
            dataType: 'json',
            data: { 'id': id_esgr },
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Eliminar grupo',
                    text: 'Un grupo fue eliminada con exito.',
                });
                $('#table_concentrados').DataTable().ajax.reload();
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

    tablaConcentrados();
    listEstudiantes();
    listGrpos();


})(jQuery);
