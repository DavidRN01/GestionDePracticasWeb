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
    <link type="text/css" href="../include/estilo.css" rel="stylesheet" />
    <script type="text/javascript" src="../scripts/validaciones.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- Bootstrap de CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        textarea {
            float: left;
            font-size: 12px;
            padding: 4px 2px;
            border: solid 1px #aacfe4;
            width: 200px;
            margin: 2px 0 20px 10px;
            resize: none
        }
        .fondo {
            background-image: url(../imagenes/header.jpg);
            background-position: 10% 25%;
            background-size: cover;
            height: 30vh;

        }
    </style>

</head>

<body>
    <div id="wrapper">
    <div class="header fondo d-none d-lg-block header-md-5 header-lg-5 header-xl-6">

        <div class="mb-4">

            <div class="mb-4">

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

                <h2>Editar actividad</h2>

                <div id="stylized" class="myform">
                    <form id="form" name="form" method="post" action="editarActividad.php" onsubmit="return validaractividad()" enctype="multipart/form-data">

                        <h1 class="fw-bold text-center py-5">Datos de la actividad</h1>
                        <p></p>

                        <label>Tipo de práctica
                            <span class="small" id="validatipo">El tipo de práctica tiene que ser FCT o dual</span>
                        </label>
                        <input type="text" name="tipo_practica" id="tipo_practica" value="<?php echo utf8_encode($fila["tipo_practica"]); ?>" readonly />

                        <label>Total de horas
                            <span class="small" id="validahoras">Total de tiempo requerido</span>
                        </label>
                        <input type="number" name="horas" id="horas" min="0.5" max="6" step="0.5" value="<?php echo utf8_encode($fila["total_horas"]); ?>" readonly />

                        <label>Actividad realizada
                            <span class="small" id="validaactividad">Nombre de actividad requerido</span>
                        </label>
                        <input type="text" name="actividad" id="actividad" />

                        <label>Observaciones</label>
                        <textarea name="observaciones" rows="4" id="observaciones"></textarea>

                        <label>Fecha</label>
                        <input type="date" name="fecha" id="fecha" min='2022-03-21' max='2022-05-27' value="<?php echo utf8_encode($fila["fecha"]); ?>" readonly />

                        <input type="hidden" name="id" id="id" value="<?php echo utf8_encode($fila["id"]); ?>">

                        <button type="submit">Editar</button>

                        <div class="spacer"></div>

                    </form>

                </div> <!--Este es el final del myform-->

            </div> <!--final del antiguo content, debajo de main-->
        </div> <!--final del antigo main, debajo de wrapper-->
    </div>
    </div> <!--final del wrapper, mantener-->
</body>

</html>