<?php 
    ini_set("dispaly_erros",E_ALL);
    $usuario = [];
    $flores = [];

    $cnx = mysqli_connect("localhost","root","usbw","Floreria") or die ("Error en la conexion a MySql");

    $queryflor = "SELECT * FROM `catalogoprincipal` LIMIT 0, 62 ";
    $resFlor = mysqli_query($cnx, $queryflor);

    while($registroFlor = mysqli_fetch_row($resFlor)){
        $flores[] = $registroFlor;
    }
    mysqli_free_result($resFlor);

    $query = "SELECT * FROM `usuarios` LIMIT 0, 30 ";
    $res = mysqli_query($cnx, $query);

    while($registro = mysqli_fetch_row($res)){
        $usuario[] = $registro;
    }
    mysqli_free_result($res);
    mysqli_close($cnx);
?>

<html>
    <head>
    <title>Florería "ACM" - Catálogo principal</title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        
        <!-- Boostrap Core CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        
        <!-- CSS Principal -->
        <link rel="stylesheet" href="css/style.css">
        
        <!-- CSS Animado -->
        <link href="css/animate.css" rel="stylesheet">
        
        <!-- Fuentes Google -->
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
         <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <!-- Fuente awesome -->
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script>
            function inicializaDataTablaFlor(){
                let tablaFlor = new DataTable('#tablaFlor');
            }
            function inicializaDataTablaUser(){
                let tablaUser = new DataTable('#tablaUser');
            }
        </script>
    </head>
    <body onload="inicializaDataTablaFlor(); inicializaDataTablaUser();">
        <!-- Inicio del "wrapper" -->
        <div class="wrapper-admin">
            <!-- Barra de Navigación -->
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="container">
                    <!-- Marca y alternar se agrupan para una mejor visualización móvil -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Logo de la página -->
                        <a class="navbar-brand" href="adminView.php"><img src="img/admin.png" alt="logo"/></a>
                    </div>
                    <!-- Recopile los enlaces de navegación, formularios y otro contenido para alternar -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="login.php">Iniciar sesión</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /navbar-collapse -->
                </div>
                <!-- /container -->
            </nav>
            <!-- /Barra de Navigación -->

            <!-- Contenedor tabla -->
            <div class="table-container">
            <br><br>
                <table id="tablaFlor">
                    <thead class="thead">
                        <tr>
                            <th>Id</th>
                            <th>Tipo de Arreglo</th>
                            <th>Tipo de flor 1</th>
                            <th>Color</th>
                            <th>Cantidad</th>
                            <th>Tipo de flor 2</th>
                            <th>Color</th>
                            <th>Cantidad</th>
                            <th>Tipo de flor 3</th>
                            <th>Color</th>
                            <th>Cantidad</th>
                            <th>Cantidad total 
                                <br>de flores</th>
                            <th>Tamaño</th>
                            <th>Precio</th>
                            <th>Opcion Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0;$i<count($flores);$i++) : ?>
                        <tr>
                            <td><?php echo $flores[$i][0] ?></td>
                            <td><?php echo $flores[$i][1] ?></td>
                            <td><?php echo $flores[$i][2] ?></td>
                            <td><?php echo $flores[$i][3] ?></td>
                            <td><?php echo $flores[$i][4] ?></td>
                            <td><?php echo $flores[$i][5] ?></td>
                            <td><?php echo $flores[$i][6] ?></td>
                            <td><?php echo $flores[$i][7] ?></td>
                            <td><?php echo $flores[$i][8] ?></td>
                            <td><?php echo $flores[$i][9] ?></td>
                            <td><?php echo $flores[$i][10] ?></td>
                            <td><?php echo $flores[$i][11] ?></td>
                            <td><?php echo $flores[$i][12] ?></td>
                            <td><?php echo $flores[$i][13] ?></td>
                            <td> <a href="editFlor.php?valorF=<?php echo urlencode($flores[$i][0]); ?>" class="custom-link">Editar</a><br>
                            <a href="deleteFlor.php" class="custom-link">Eliminar</a><br></td>
                        </tr>
                        <?php endfor ?>
                    </tbody>
                </table>
                <button class="btn first-btn"><a href="addFlor.php">Añadir Arreglo</a></button>
                <br><br>
                <table id="tablaUser">
                    <thead class="thead">
                        <tr>
                            <th>ID</th>
                            <th>Rol</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Calle</th>
                            <th>Numero Exterior</th>
                            <th>Numero Interior</th>
                            <th>Colonia</th>
                            <th>Delegacion</th>
                            <th>Codigo Postal</th>
                            <th>Nombre(s)</th>
                            <th>Apellidos</th>
                            <th>Opcion Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<count($usuario);$i++): ?>
                        <tr>
                            <td><?php echo $usuario[$i][0] ?></td>
                            <td><?php echo $usuario[$i][1] ?></td>
                            <td><?php echo $usuario[$i][2] ?></td>
                            <td><?php echo $usuario[$i][3] ?></td>
                            <td><?php echo $usuario[$i][4] ?></td>
                            <td><?php echo $usuario[$i][5] ?></td>
                            <td><?php echo $usuario[$i][6] ?></td>
                            <td><?php echo $usuario[$i][7] ?></td>
                            <td><?php echo $usuario[$i][8] ?></td>
                            <td><?php echo $usuario[$i][9] ?></td>
                            <td><?php echo $usuario[$i][10] ?></td>
                            <td><?php echo $usuario[$i][11]?></td>
                            <td> <a href="editUser.php?valorU=<?php echo urlencode($usuario[$i][0]); ?>" class="custom-link">Editar</a><br>
                            <a href="deleteUser.php" class="custom-link">Eliminar</a></td>
                        </tr>
                        <?php endfor ?>
                    </tbody>
                </table>
                <button class="btn first-btn"><a href="addUser.php">Añadir Usuario</a></button>
                <br><br>
            </div>
            <!-- /Contenedor tabla -->
        </div>
        <!-- Fin del "wrapper" -->
    </body>
</html>