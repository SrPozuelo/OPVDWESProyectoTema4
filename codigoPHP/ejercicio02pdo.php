<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tema 4 | Óscar Pozuelo Villamandos</title>
        <link rel="stylesheet" href="../webroot/css/fonts.css">
        <link rel="stylesheet" href="../webroot/css/all.min.css">
        <link rel="stylesheet" href="../webroot/css/estilos.css"> 
        <link rel="stylesheet" href="../webroot/css/estilosTabla.css"> 
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
                    Tema 4
                </div>
            </div>
        </header>
        <main id="contenedor">
            <div id="titulo">2-Mostrar el contenido de la tabla Departamento y el número de registros..</div>
            <?php
                /**
                * @author: Óscar Pozuelo
                * @since: 18/03/2026
                * 2. Mostrar el contenido de la tabla Departamento y el número de registros.
                */
                require_once '../conf/ConfDBPDO.php';
                echo("<h3>Tabla usando fetchObject() y consultas preparadas:</h3>");
                echo'<table class="TablaPHP">';
                    echo("<thead>");
                    echo '<tr>';
                    echo' <th>Codigo </th>';
                    echo '<th>Descripción </th>';
                    echo '<th>Fecha Creación </th>';     
                    echo '<th>Volumen de Negocio</th>';
                    echo '<th>Fecha Baja</th>';
                    echo '</tr>';
                    echo("</thead>");
                    $miDB=new PDO(DSN,USERNAME,PASSWORD);
                    $resultadoConsulta=$miDB->prepare('SELECT * FROM T02_Departamento');
                    $resultadoConsulta->execute();
                    while ($oRegistroObject = $resultadoConsulta->fetchObject()) {
                        echo '<tr>';
                        echo '<td>'.$oRegistroObject->T02_CodDepartamento.'</td>';
                        echo '<td>'.$oRegistroObject->T02_DescDepartamento.'</td>';
                        $oFechaCreacion = new DateTime($oRegistroObject->T02_FechaCreacionDepartamento);
                        echo "<td class='centrado'>".$oFechaCreacion->format("d-m-Y")."</td>";
                        echo '<td class="importe">'.number_format($oRegistroObject->T02_VolumenDeNegocio, 2, ',', '.').'€</td>';
                        if(!is_null($oRegistroObject->T02_FechaBajaDepartamento)) {
                            //si no se pone la condición la fecha no es null
                            $oFechaBaja = new DateTime($oRegistroObject->T02_FechaBajaDepartamento);
                            echo '<td>' . $oFechaBaja->format("d-m-Y") . '</td>';
                        }
                        else{
                            echo '<td>Activo</td>';
                        }
                        echo '</tr>';
                    }
                    echo '<tr>';
                    echo "<td class='centrado' colspan=5><strong>Número de registros:</strong>".$resultadoConsulta->rowCount()."</td>";
                echo '</table>';
                echo '<h3>Tabla usando consultas preparadas:</h3>';
                //variable para contar el numero de registros recuperados de la BBDD
                $iNumRegistros=0;
                try {
                    $miDB=new PDO(DSN,USERNAME,PASSWORD);
                    $sql="select * from T02_Departamento";
                    $consulta=$miDB->prepare($sql);
                    $consulta->execute();
                    echo '<table class="TablaPHP">';
                    echo("<thead>");
                    echo '<tr>';
                    echo '<th>Código▼</th>';
                    echo '<th>Departamento</th>';
                    echo '<th>Fecha de Creacion</th>';
                    echo '<th>Volumen de Negocio</th>';
                    echo '<th>Fecha de Baja</th>';
                    echo '</tr>';
                    echo("</thead>");
                    while ($registro = $consulta->fetch()) {
                        echo '<tr>';
                        echo '<td>'.$registro['T02_CodDepartamento'].'</td>';
                        echo '<td>'.$registro["T02_DescDepartamento"].'</td>';
                        //construimos la fecha a partir de la que hay en la bbdd y luego mostramos sólo dia mes y año
                        $oFecha=new DateTime($registro["T02_FechaCreacionDepartamento"]);
                        echo '<td>'.$oFecha->format('d/m/Y').'</td>';
                        //formateamos el float para que se vea en €
                        echo '<td>'.number_format($registro["T02_VolumenDeNegocio"],2,',','.').' €</td>';
                        if(is_null($registro["T02_FechaBajaDepartamento"])){
                            echo '<td></td>';
                        }
                        else{
                            $oFecha = new DateTime($registro["T02_FechaBajaDepartamento"]);
                            echo '<td>'.$oFecha->format('d/m/Y').'</td>';
                        }
                        echo '</tr>';
                        $iNumRegistros++;
                    }
                    echo '</table>';
                    echo '<h4>Número de registros: '.$iNumRegistros.'</h4>';
                }
                catch(PDOException $miExceptionPDO) {
                    echo 'Error: '.$miExceptionPDO->getMessage();
                    echo '<br>';
                    echo 'Código de error: '.$miExceptionPDO->getCode();
                }
                finally{
                    unset($miDB);
                }
                echo '<h3>Tabla usando consultas con query:</h3>';
                try {
                    $miDB=new PDO(DSN,USERNAME,PASSWORD);
                    $sql="select * from T02_Departamento";
                    // No se puede usar exec para consultas de select https://www.php.net/manual/es/pdo.exec.php
                    // $numRegistros = $miDB->exec('select * from T02_Departamento');
                    $iNumRegistros=0;
                    $consulta=$miDB->query($sql);
                    echo '<table class="TablaPHP">';
                    echo("<thead>");
                    echo '<tr>';
                    echo '<th>Código▼</th>';
                    echo '<th>Departamento</th>';
                    echo '<th>Fecha de Creacion</th>';
                    echo '<th>Volumen de Negocio</th>';
                    echo '<th>Fecha de Baja</th>';
                    echo '</tr>';
                    echo("</thead>");
                    while ($registro=$consulta->fetch()) {
                        echo '<tr>';
                        echo '<td>'.$registro['T02_CodDepartamento'].'</td>';
                        echo '<td>'.$registro["T02_DescDepartamento"].'</td>';
                        //construimos la fecha a partir de la que hay en la bbdd y luego mostramos sólo dia mes y año
                        $oFecha=new DateTime($registro["T02_FechaCreacionDepartamento"]);
                        echo '<td>'.$oFecha->format('d/m/Y').'</td>';
                        //formateamos el float para que se vea en €
                        echo '<td>'.number_format($registro["T02_VolumenDeNegocio"],2,',','.').' €</td>';
                        if(is_null($registro["T02_FechaBajaDepartamento"])){
                            echo '<td></td>';
                        }
                        else{
                            $oFecha = new DateTime($registro["T02_FechaBajaDepartamento"]);
                            echo '<td>'.$oFecha->format('d/m/Y').'</td>';
                        }
                        echo '</tr>';
                        $iNumRegistros++;
                    }
                    echo '</table>';
                    echo '<h4>Número de registros: '.$iNumRegistros.'</h4>';
                }
                catch (PDOException $miExceptionPDO) {
                    echo 'Error: '.$miExceptionPDO->getMessage();
                    echo '<br>';
                    echo 'Código de error: '.$miExceptionPDO->getCode();
                }
                finally {
                    unset($miDB);
                }
            ?>
        </main>
        <footer class="pie-pagina">
            <div class="contenido-footer">
                <div class="texto-legal">
                    <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 18-03-2026</p>
                </div>
                <div class="iconos-footer">
                    <a href="https://github.com/SrPozuelo/OPVDWESProyectoTema4" target="_blank" title="GitHub"><i class="fa-brands fa-github"></i></a>
                    <a href="../indexProyectoTema4.html" title="Inicio"><i class="fa-solid fa-house"></i></a>
                    <a href="../indexProyectoTema4.html" title="Volver a Tema4"><i class="fa-solid fa-arrow-turn-up"></i></a>
                </div>
            </div>
        </footer>
    </body>
</html>