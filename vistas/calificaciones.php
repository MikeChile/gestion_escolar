<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
} else {


  require 'header.php';

  if ($_SESSION['grupos'] == 1) {

?>
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h1 class="box-title">Seleciona un curso</h1>
                <div class="box-tools pull-right">
                  <a href="../vistas/vista_grupo.php?idgrupo=<?php echo $_GET["idgrupo"]; ?>"><button class="btn btn-success"><i class='fa fa-arrow-circle-left'></i> Volver</button></a>
                  <input type="hidden" id="idgrupo" name="idgrupo" value="<?php echo $_GET["idgrupo"]; ?>">
                </div>
              </div>
              <!--box-header-->
              <!--centro-->
              <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <select name="curso" id="curso" class="form-control selectpicker" data-live-search="true" required>
                </select>
              </div>
              <div class="form-inline col-lg-12 col-md-12 col-sm-12 col-xs-12">

              </div>

              <div class="panel-body table-responsive" id="listadoregistros">
                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Calificaciones</th>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Calificaciones</th>
                  </tfoot>
                </table>
              </div>

              <!--fin centro-->
            </div>
          </div>
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>


    <!--Modal-->
    <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Califique...</h4>
          </div>
          <div class="modal-body">
            <form action="" name="formulario" id="formulario" method="POST">
              <div class="form-group col-lg-12 col-md-12 col-xs-12">
                <label for="">Valor de calificación(*):</label>
                <input type="hidden" id="idcalificacion" name="idcalificacion">
                <input type="hidden" id="alumn_id" name="alumn_id">
                <input type="hidden" id="idcurso" name="idcurso">
                <input class="form-control" type="text" id="valor" name="valor">

              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                <button class="btn btn-danger pull-right" data-dismiss="modal" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

              </div>
            </form>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>

    <!-- Modal Calificar -->
    <div class="modal fade" id="modalCalificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Calificar Alumno</h4>
          </div>
          <div class="modal-body">
            <!-- Aquí puedes agregar el contenido del modal -->
            <input type="text" id="idAlumnoCalificar" name="idAlumnoCalificar">
            <!-- Resto del contenido del modal -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nota</th>
                  <th>Evaluación</th>
                  <th>Comentario</th>
                  <th>Fecha Registro</th>
                  <th>Materia</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="cuerpoTablaCalificaciones">
                <!-- Aquí se cargarán las calificaciones del usuario -->
              </tbody>
            </table>

            <form id="formCalificar">
              <div class="form-group">
                <label for="nota">Nota:</label>
                <input type="number" class="form-control" id="nota" name="nota" step="0.1" min="1.0" max="7.0">
              </div>
              <div class="form-group">
                <label for="nombre_evaluacion">Evaluación:</label>
                <input type="text" class="form-control" id="nombre_evaluacion" name="nombre_evaluacion">
              </div>
              <div class="form-group">
                <label for="comentario">Comentario:</label>
                <textarea class="form-control" id="comentario" name="comentario"></textarea>
              </div>
              <div class="form-group">
                <label for="id_materia">Materia:</label>
                <select class="form-control" id="id_materia" name="id_materia">

                </select>
              </div>
              <input type="hidden" id="id_curso" name="id_curso" value="<?php echo $_GET["idgrupo"]; ?>">
              <button type="submit" class="btn btn-primary">Guardar Calificación</button>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

  <?php
  } else {
    require 'noacceso.php';
  }

  require 'footer.php';
  ?>
  <script src="scripts/calificaciones.js"></script>
  <script>
    $('#modalCalificar').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var idAlumno = button.data('id'); // Extract info from data-* attributes
      $('#idAlumnoCalificar').val(idAlumno); // Asigna el valor de idAlumno al campo idAlumnoCalificar

      // Cargar calificaciones del usuario
      cargarCalificacionesAlumno(idAlumno);

      // Cargar materias en el select
      $.ajax({
        type: 'GET',
        url: '../ajax/materias.php?op=listarMaterias',
        dataType: 'json',
        success: function(data) {
          var selectMaterias = $('#id_materia');
          selectMaterias.empty();
          selectMaterias.append('<option value="">Seleccione una materia</option>');
          $.each(data, function(index, value) {
            selectMaterias.append('<option value="' + value.id_materia + '">' + value.nombre + '</option>');
          });
        }
      });
    });

    function cargarCalificacionesAlumno(idAlumno) {
      console.log('alumno: ' + idAlumno)
      $.ajax({
        type: 'GET',
        url: '../ajax/calificaciones.php?op=mostrarCalificaciones&id_alumno=' + idAlumno,
        dataType: 'json',
        success: function(data) {

          console.log('Respuesta del servidor:', data);

          var cuerpoTabla = $('#cuerpoTablaCalificaciones');
          cuerpoTabla.empty();
          if (data.length > 0) {
            console.log('Hay calificaciones para mostrar');
            $.each(data, function(index, value) {
              console.log('Calificación:', value);
              cuerpoTabla.append('<tr>' +
                '<td>' + value.nota + '</td>' +
                '<td>' + value.nombre_evaluacion + '</td>' +
                '<td>' + value.comentario + '</td>' +
                '<td>' + value.fecha_registro + '</td>' +
                '<td>' + value.nombre_materia + '</td>' +
                '<td><button class="btn btn-danger btn-xs" onclick="eliminarCalificacion(' + value.id_calificacion + ')">Eliminar</button></td>' +
                '</tr>');
            });
          } else {
            console.log('No hay calificaciones para mostrar');
            cuerpoTabla.append('<tr><td colspan="6">No hay calificaciones para mostrar</td></tr>');
          }
        },
        error: function(xhr, status, error) {
          console.log('Error al cargar calificaciones:', error);
        }
      });
    }
  </script>
<?php
}

ob_end_flush();
?>