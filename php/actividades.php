<?php
session_start();
include("conexion_BD.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Aplicación Gestión Dual</title>

    <!--hoja de estilos -->
    <link type="text/css" href="../include/estilo.css" rel="stylesheet" />

    <!--estilo de datatables -->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.11.4/css/dataTables.bootstrap5.min.css" />

    <!--estilos de sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!--estilos de boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <?php
    //Conectamos con la BD
    $link = conectar();
    $query = "SELECT * FROM actividades WHERE alumno_id=" . $_SESSION['id_alumno'] . ";";

    //Ejecutar consulta
    $result = mysqli_query($link, $query);
    ?>

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

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <h2 style="margin-top: 30px;"><b>Actividades</b></h2>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead style="background-color:white">
                            <tr>
                                <th>Editar</th>
                                <th>Tipo</th>
                                <th>Horas</th>
                                <th>Actividad</th>
                                <th>Observaciones</th>
                                <th>Fecha</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:white">
                            <?php

                            while ($fila = mysqli_fetch_array($result)) {
                                echo "<tr>
                                <td><a href='editarActividadFormulario.php?id_actividad=" . $fila["id"] . "'>
                                <img src='../imagenes/edit.png' width='20'></a></td>
                                <td>" . utf8_encode($fila['tipo_practica']) . "</td>
                                <td>" . utf8_encode($fila['total_horas']) . "</td>
                                <td>" . utf8_encode($fila['actividad_realizada']) . "</td>
                                <td>" . utf8_encode($fila['observaciones']) . "</td>
                                <td>" . utf8_encode($fila['fecha']) . "</td>
                                <td><a onclick='return confirmar(" . $fila['id'] . ")'>
                                <img src='../imagenes/delete.png' width='20'></a></td>
                                </tr>";
                            }

                            mysqli_close($link);
                            ?>
                        </tbody>
                    </table>

                    <div id="centrado">
                        <form id="form1" name="form1" method="post" action="insertarActividadFormulario.php">
                            <input type="submit" class="btn btn-primary" style="font-weight:bold; color:white; margin-bottom:20px;" name="enviar" id="enviar" value="Insertar actividades" />
                        </form>
                    </div>

                    <?php
                    if (isset($_SESSION["error"])) {
                        echo "<div id='mensaje'>" . $_SESSION["error"] . "</div>";
                        unset($_SESSION["error"]);
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../scripts/main.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../scripts/validaciones.js"></script>

</body>

</html>