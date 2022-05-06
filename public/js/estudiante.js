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

    $('#form_estudiante').on('submit', function (event) {
        event.preventDefault();
        if ($('#guardar').val() == 'Guardar') {
            $.ajax({
                url: 'api/insertEstudiante',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario nuevo',
                        text: 'Se agrego un usuario con exito.',
                    });
                    $('#table_estudiantes').DataTable().ajax.reload();
                    $('#form_estudiante')[0].reset();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No fue posible agregar el usuario intente nuevamente.',
                    });
                }
            });
        }
        else if ($('#guardar').val() == 'Actualizar') {
            $.ajax({
                url: 'api/updateEstudiante',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Actualizar estudiante',
                        text: 'Se actualizo un estudiante con exito.',
                    });
                    $('#table_estudiantes').DataTable().ajax.reload();
                    $('#form_estudiante')[0].reset();
                    $('#guardar').removeClass('btn-outline-success');
                    $('#guardar').addClass('btn-outline-primary');
                    $('#guardar').val('Guardar');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No fue posible actualizar al estudiante intente nuevamente.',
                    });
                }
            });
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
