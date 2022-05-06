(function ($) {
    'use strict';

    function tablaUsers() {
        $("#table_estudiantes").DataTable({
            processing: false,
            serverSide: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            ajax: {
                url: "api/estudiantes",
                type: "GET",
                method: "GET",
                dataType: 'json'
            },
            columns: [
                { data: "nombre" },
                { data: "apellidos" },
                { data: "edad" },
                { data: "email" },
                { data: "telefono" },
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

    $('#form_estudiante').validate({
        rules: {
          nombre: {
            required: true,
            minlength: 3
          },
          apellidos: {
            required: true,
            minlength: 3
          },
          email: {
            required: true,
            email: true
          },
          edad: {
            required: true
          },
          telefono: {
            required: true
          }
        },
        messages: {
          nombre: {
            required: 'Ingresa tu nombre.',
            minlength: 'Tu nombre debe tener mas de 2 letras'
          },
          apellidos: {
            required: 'Ingresa tus apellidos.',
            minlength: 'Tu apellido debe tener mas de 2 letras'
          },
          email: {
            required: 'Ingresa tu email'
          },
          edad: {
            required: 'Ingresa tu edad.'
          },
          telefono: {
            required: 'Ingresa tu numero telefonico.'
          }
        },
        submitHandler: function (form) {
            if ($('#guardar').val() == 'Guardar') {
                $(form).ajaxSubmit({
                    type: 'POST',
                    data: $(form).serialize(),
                    url: 'api/insertEstudiante',
                    success: function () {
                        $('#table_estudiantes').DataTable().ajax.reload();
                        $('#form_estudiante')[0].reset();
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
                    url: 'api/updateEstudiante',
                    success: function () {
                        $('#table_estudiantes').DataTable().ajax.reload();
                        $('#form_estudiante')[0].reset();
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
        var id_estudiante;
        id_estudiante = $(this).attr('id');
        $.ajax({
            url: 'api/editEstudiante',
            method: "POST",
            type: "POST",
            dataType: 'json',
            data: { 'id': id_estudiante },
            success: function (data) {
                $('#nombre').val(data.data[0].nombre);
                $('#apellidos').val(data.data[0].apellidos);
                $('#edad').val(data.data[0].edad);
                $('#email').val(data.data[0].email);
                $('#telefono').val(data.data[0].telefono);
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
            url: 'api/destroyEstudiante',
            method: "POST",
            type: "POST",
            dataType: 'json',
            data: { 'id': id_estudiante },
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Eliminar estudiante',
                    text: 'Un estudiante fue eliminada con exito.',
                });
                $('#table_estudiantes').DataTable().ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No fue posible eliminar el estudiante intente nuevamente.',
                });
            }
        });
    });

    tablaUsers();


})(jQuery);
