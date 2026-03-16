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
            <div id="titulo">15-Crear e inicializar un array con el sueldo de lunes a domingo. Recorrer para calcular total semanal.</div>
            <?php
                define("SALARIO_MAXIMO",1000);
                define("SALARIO_MINIMO",50);
                $iSalarioTotal=0;
                $iSalarioPromedio=0;
                $iSalarioMaximo=SALARIO_MINIMO;
                $iSalarioMinimo=SALARIO_MAXIMO;
                $aSalarioDiario=[
                    'Lunes'    => random_int(SALARIO_MINIMO,SALARIO_MAXIMO),
                    'Martes'   => random_int(SALARIO_MINIMO,SALARIO_MAXIMO),
                    'Miércoles'=> random_int(SALARIO_MINIMO,SALARIO_MAXIMO),
                    'Jueves'   => random_int(0,SALARIO_MAXIMO),
                    'Viernes'  => random_int(SALARIO_MINIMO,SALARIO_MAXIMO),
                    'Sabado'  =>  random_int(SALARIO_MINIMO,SALARIO_MAXIMO),
                    'Domingo'  => random_int(SALARIO_MINIMO,SALARIO_MAXIMO)
                ];
                foreach($aSalarioDiario as $iSueldoDiario){
                    $iSalarioTotal=$iSalarioTotal+$iSueldoDiario;
                    if($iSalarioMaximo<$iSueldoDiario){
                        $iSalarioMaximo=$iSueldoDiario;
                    }
                    else{
                        if($iSalarioMinimo>$iSueldoDiario){
                            $iSalarioMinimo=$iSueldoDiario;
                        }
                    }
                }
                $iSalarioPromedio=$iSalarioTotal/(count($aSalarioDiario));
                echo("<h3>Sueldo diario:</h3>");
                foreach($aSalarioDiario as $Sdia => $iSueldoDiario){        
                    print("<p>El ".$Sdia ." has cobrado ". $iSueldoDiario ."€</p>");
                }
                echo("<h3>Resultados:</h3>");
                echo("<p>El total del salario semanal es de ".$iSalarioTotal."€</p>");
                echo("<p>El salario más alto es de ".$iSalarioMaximo."€</p>");
                echo("<p>El salario más bajo es de ".$iSalarioMinimo."€</p>");
                echo("<p>El salario promedio es de ".number_format($iSalarioPromedio,2,',',' ')."€</p>");
                echo("<p>Días contabilizados:".count($aSalarioDiario)."</p>")
                
            ?>
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