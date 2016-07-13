<?php
session_start();
////Validamos si existe realmente una sesión activa o no 
if ($_SESSION["tipo"] !== "supervisor") {
    //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión)
    header("Location: ../../index.php");
    exit();
}
?>

<html>
    <head>        
        <title>Trazabilidad Formato</title>

        <?php
        include 'head.php';
        ?>        
    </head>
    <body>
        <!-- Encabezado-->
        <header>
            <?php include_once './panel_header.php'; ?>
        </header>

        <!--contenido-->
        <main>
            <h1 class="titulo"><i class="material-icons prefix" style="font-size: 43px">timeline</i> Trazabilidad del formato</h1>
            <div class="col-lg-12 col-xs-12 col-md-12 center">
                <div class="form-inline" id="fechas">
                    <?php
                    date_default_timezone_set('America/Bogota');
                    $fechaMin = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y") - 1));
                    $fechaAct = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
                    ?>
                    <div class="form-group">
                        <label>Fecha de inicio del análisis</label>
                        <input type="date" id="fechaInicio" name="fechaInicio" min="<?php echo$fechaMin ?>" max="<?php echo $fechaAct ?>" value="<?php echo $fechaAct ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Fecha de finalización del análisis</label>
                        <input type="date" id="fechaFin" name="fechaFin" min="<?php echo$fechaMin ?>" max="<?php echo $fechaAct ?>" value="<?php echo $fechaAct ?>"/>
                    </div>
                    <button onclick="mostrarForm();">Consultar</button>
                </div>



                <form id="visualizarFormato" hidden>
                </form>
                <!--<button id="modificarRegistro"type="button" class="btn btn-danger btn-lg center-block" onclick="">MODIFICAR</button>-->
            </div>

            <!--            <div class="col-lg-5">
                            <div  class="btn-group btn-group-justified" role="group">
                                <a type="button" class="btn btn-default">Izquierda</a>
                                <a type="button" class="btn btn-default">Centro</a>
                                <a type="button" class="btn btn-default">Derecha</a>
                            </div>                
                        </div>-->
            <div class="col-lg-12" id="resultado"></div>
            <div class="col-lg-12" id="res1"></div>
            <div id="chart-container" class="col-lg-12"></div>
            
        </main>

        <!-- Pie de pagina-->
        <footer>
            <div class="col-lg-12" id="footer">
                <?php
                include 'footer.php';
                ?>
            </div>
        </footer>

        <!--script-->
        <?php
        include 'script.php';
        ?>
        <script type="text/javascript" src="../util/js/fusioncharts.js"></script>
        <script type="text/javascript" src="../util/js/fusioncharts-jquery-plugin.js"></script>
        <script type="text/javascript" src="../util/js/analisis.js"></script>
    </body>
</html>