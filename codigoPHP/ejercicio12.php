<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tema 3 | Óscar Pozuelo Villamandos</title>
        <link rel="stylesheet" href="../webroot/css/fonts.css">
        <link rel="stylesheet" href="../webroot/css/all.min.css">
        <link rel="stylesheet" href="webroot/css/estilos.css"> 
        <link rel="stylesheet" href="webroot/css/estilosTabla.css"> 
    </head>
    <body>
        <header class="cabecera-principal">
            <div class="contenido-cabecera">
                <div class="identidad">
                    <a href="../index.html" style="text-decoration:none;">
                        <div class="logo-iniciales">ÓS</div>
                    </a>
                    <h1>Óscar Pozuelo Villamandos</h1>
                </div>
                <div class="curso-badge" style="background-color: #777BB4; color: white;">
                    Tema 3
                </div>
            </div>
        </header>
        <main id="contenedor">
            <div id="titulo">12-Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).</div>
            <?php
                echo("<h3>Supergrobales con foreach:</h3>");
                echo('<h4>Contenido de la variable $_SESSION:</h4>');
            ?>
            <table class="TablaPHP">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_SESSION)){
                            foreach($_SESSION AS $sVariable => $sResultado){
                                echo("<tr>");
                                    echo('<td>$_SERVER['.$sVariable.']</td>');
                                    echo('<td>'.$sResultado.'</td>');
                                echo("</tr>");
                            }
                        }
                        else{
                            echo('<tr><td class="centrado" colspan="2">La variable $_SESSION está vacía.</td></tr>');
                        }
                    ?>
                </tbody>
            </table>
            <?php
                echo('<h4>Contenido de la variable $_COOKIE:</h4>');
            ?>
            <table class="TablaPHP">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_COOKIE)){
                            foreach($_COOKIE AS $sVariable => $sResultado){
                                echo("<tr>");
                                    echo('<td>$_SERVER['.$sVariable.']</td>');
                                    echo('<td>'.$sResultado.'</td>');
                                echo("</tr>");
                            }
                        }
                        else{
                            echo('<tr><td class="centrado" colspan="2">La variable $_COOKIE está vacía.</td></tr>');
                        }
                    ?>
                </tbody>
            </table>
            <?php
                echo('<h4>Contenido de la variable $_SERVER:</h4>');
            ?>
            <table class="TablaPHP">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_SERVER)){
                            foreach($_SERVER AS $sVariable => $sResultado){
                                echo("<tr>");
                                    echo('<td>$_SERVER['.$sVariable.']</td>');
                                    echo('<td>'.$sResultado.'</td>');
                                echo("</tr>");
                            }
                        }
                        else{
                            echo('<tr><td class="centrado" colspan="2">La variable $_SERVER está vacía.</td></tr>');
                        }
                    ?>
                </tbody>
            </table>
            <?php
                echo('<h4>Contenido de la variable $_REQUEST:</h4>');
            ?>
            <table class="TablaPHP">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_REQUEST)){
                            foreach($_REQUEST AS $sVariable => $sResultado){
                                echo("<tr>");
                                    echo('<td>$_SERVER['.$sVariable.']</td>');
                                    echo('<td>'.$sResultado.'</td>');
                                echo("</tr>");
                            }
                        }
                        else{
                            echo('<tr><td class="centrado" colspan="2">La variable $_REQUEST está vacía.</td></tr>');
                        }
                    ?>
                </tbody>
            </table>
            <?php
                echo('<h4>Contenido de la variable $_GET:</h4>');
            ?>
            <table class="TablaPHP">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_GET)){
                            foreach($_GET AS $sVariable => $sResultado){
                                echo("<tr>");
                                    echo('<td>$_SERVER['.$sVariable.']</td>');
                                    echo('<td>'.$sResultado.'</td>');
                                echo("</tr>");
                            }
                        }
                        else{
                            echo('<tr><td class="centrado" colspan="2">La variable $_GET está vacía.</td></tr>');
                        }
                    ?>
                </tbody>
            </table>
            <?php
                echo('<h4>Contenido de la variable $_POST:</h4>');
            ?>
            <table class="TablaPHP">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_POST)){
                            foreach($_POST AS $sVariable => $sResultado){
                                echo("<tr>");
                                    echo('<td>$_SERVER['.$sVariable.']</td>');
                                    echo('<td>'.$sResultado.'</td>');
                                echo("</tr>");
                            }
                        }
                        else{
                            echo('<tr><td class="centrado" colspan="2">La variable $_POST está vacía.</td></tr>');
                        }
                    ?>
                </tbody>
            </table>
            <?php
                echo('<h4>Contenido de la variable $_FILES:</h4>');
            ?>
            <table class="TablaPHP">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_FILES)){
                            foreach($_FILES AS $sVariable => $sResultado){
                                echo("<tr>");
                                    echo('<td>$_SERVER['.$sVariable.']</td>');
                                    echo('<td>'.$sResultado.'</td>');
                                echo("</tr>");
                            }
                        }
                        else{
                            echo('<tr><td class="centrado" colspan="2">La variable $_FILES está vacía.</td></tr>');
                        }
                    ?>
                </tbody>
            </table>
            <?php
                echo('<h4>Contenido de la variable $_ENV:</h4>');
            ?>
            <table class="TablaPHP">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($_ENV)){
                            foreach($_ENV AS $sVariable => $sResultado){
                                echo("<tr>");
                                    echo('<td>$_SERVER['.$sVariable.']</td>');
                                    echo('<td>'.$sResultado.'</td>');
                                echo("</tr>");
                            }
                        }
                        else{
                            echo('<tr><td class="centrado" colspan="2">La variable $_ENV está vacía.</td></tr>');
                        }
                    ?>
                </tbody>
            </table>
        </main>
        <footer class="pie-pagina">
            <div class="contenido-footer">
                <div class="texto-legal">
                    <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 23-02-2026</p>
                </div>
                <div class="iconos-footer">
                    <a href="https://github.com/SrPozuelo/OPVDWESProyectoTema3" target="_blank" title="GitHub"><i class="fa-brands fa-github"></i></a>
                    <a href="../indexProyectoTema3.html" title="Inicio"><i class="fa-solid fa-house"></i></a>
                    <a href="../indexProyectoTema3.html" title="Volver a Tema3"><i class="fa-solid fa-arrow-turn-up"></i></a>
                </div>
            </div>
        </footer>
    </body>
</html>