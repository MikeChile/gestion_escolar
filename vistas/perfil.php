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
                <h2>perfil</h2>

            </section>
            <!-- /.content -->
        </div>
    <?php
    } else {
        require 'noacceso.php';
    }

    require 'footer.php';
    ?>
    <script src="scripts/cursos.js"></script>
<?php
}

ob_end_flush();
?>