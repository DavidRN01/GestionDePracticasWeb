<?php
session_start();
include("conexion_BD.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación Gestión Dual</title>
    <script type="text/javascript" src="../scripts/validaciones.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- Bootstrap de CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link type="text/css" href="../include/estilo.css" rel="stylesheet" />

</head>

<body style="margin-top: 200px;">

    <a class="btn btn-primary" style="position:fixed; top:0; margin:20px; color:white;" data-bs-toggle="offcanvas" href="#menu" role="button" aria-controls="offcanvasExample">
        Desplegar Menu
    </a>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="menu" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Opciones</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled components">
                <li class="active">

                </li>
                <li>
                    <a href="inicio.php">Inicio</a>
                </li>
                <li>
                    <a href="actividades.php">Actividades</a>
                </li>
                <li>
                    <a href="salir.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>

    <?php
    $id_actividad = htmlspecialchars($_GET["id_actividad"]);
    //Conectamos con la BD
    $link = conectar();

    $query = "SELECT * FROM actividades WHERE id=" . $id_actividad . ";";

    //Ejecutar consulta
    $result = mysqli_query($link, $query);

    //Extraemos datos de la consulta del profesor
    $fila = mysqli_fetch_array($result);

    mysqli_close($link);
    ?>


    <div id="content" style="padding:10px 20px;">
        <div class="container mt-3">
            <h2>Datos de la actividad</h2>
            <form id="formEditar" name="formEditar" method="post" action="editarActividad.php" onsubmit="return validaractividad()" enctype="multipart/form-data">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="a" name="tipo_practica" id="tipo_practica" value="<?php echo utf8_encode($fila["tipo_practica"]); ?>" readonly />
                    <label for="tipo_practica">Tipo de práctica</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="number" class="form-control" name="horas" placeholder="Introduce el número de horas" id="horas" min="0.5" max="6" step="0.5" value="<?php echo utf8_encode($fila["total_horas"]); ?>" readonly />
                    <label for="horas">Total de horas</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" name="actividad" id="actividad" placeholder="Ingrese la actividad realizada" />
                    <label for="actividad">Actividad realizada</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Ingrese la observación"></textarea>
                    <label for="observaciones">Observaciones</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="date" class="form-control" name="fecha" id="fecha" min='2022-03-21' max='2022-05-27' value="<?php echo utf8_encode($fila["fecha"]); ?>" readonly />
                    <label for="fecha">Fecha</label>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo utf8_encode($fila["id"]); ?>">

                <button style="margin-bottom:20px;" type="submit" class="btn btn-primary">Editar</button>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    </div>
</body>

</html>