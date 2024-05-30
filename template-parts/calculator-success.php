<a name="a_resultados"></a>
	
<div class="container mt-2" id="calculator-success">
    
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <p class="text-h2">El precio de producción de un kWh de origen solar para tu empresa es de:</p>
        </div>
    </div>
    
    <div class="row mt-2">
        
        <div class="col-xs-12 col-md-6">
            
            <div class="mb-3 dflex">
                <div class="icon-success">
                    <svg class="icon" width="64" height="64" viewBox="0 0 32 32">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#tag" />
                    </svg>
                </div> 
                <div class="text-success">   
                    <div class="number-success"><p class="text-h2"><?php echo $_SESSION["PrecioProduccion"]; ?> €</p></div>
                    <span class="text-h4">Precio de producir tu propia energía (€/kWh)</span>
                    <p><?php echo $_SESSION["Texto1"]; ?></p>
                </div>
            </div>
        
            <div class="mb-3 dflex">
                <div class="icon-success">
                    <svg class="icon" width="64" height="64" viewBox="0 0 32 32">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#activity" />
                    </svg>
                </div>
                <div class="text-success">  
                    <div class="number-success"><p class="text-h2"><?php echo $_SESSION["PotenciaaInstalar"] ?> <small>kWp</small></p></div>
                    <span class="text-h4">Potencia a instalar de origen solar (kWp)</span>
                    <p><?php echo $_SESSION["Texto3"]; ?></p>
                </div>
            </div>
        
            <div class="mb-3 dflex">
                <div class="icon-success">
                    <svg class="icon" width="64" height="64" viewBox="0 0 32 32">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#sun" />
                    </svg>
                </div> 
                <div class="text-success"> 
                    <div class="number-success"><p class="text-h2"><?php echo $_SESSION["ProduccionEstimada"]  ?> <small>kWh</small></p></div>
                    <span class="text-h4">Producción de energía estimada de la instalación (kWh/año)</span>
                    <p><?php echo $_SESSION["Texto2"]; ?></p>
                </div>
            </div>

            <div class="mb-3 dflex">
                <div class="icon-success">
                    <svg class="icon" width="64" height="64" viewBox="0 0 32 32">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#tree" />
                    </svg>
                </div>
                <div class="text-success">  
                    <div class="number-success"><p class="text-h2"><?php echo $_SESSION["ImpactoAmbiental"] ?> <small>t CO2</small></p></div>
                    <span class="text-h4">Impacto ambiental en toneladas de CO2</span>
                    <p><?php echo $_SESSION["Texto4"]; ?></p>
                </div>
            </div>
            <div class="mt-2">
                <small>Estos datos se han contrastado con el programa de cálculo PV GIS de la Comisión Europea
                según el código postal donde se encuentra ubicada tu empresa. Todas las cifras son estimadas
                y se encuentran sujetas a un estudio llave en mano.</small>
            </div>
            
        </div>

        <div class="col-xs-12 col-md-5 col-md-offset-1">
            <form method="post" action="./" class="sf-card-red sticky-form slideanim slide">
                <input type="hidden" id="resPrecioProduccion" name="resPrecioProduccion" value="<?php echo $_SESSION["PrecioProduccion"]; ?>" />
                <input type="hidden" id="Texto1" name="Texto1" value="<?php echo $_SESSION["Texto1"]; ?>" />
                <input type="hidden" id="resProduccionEstimada" name="resProduccionEstimada" value="<?php echo $_SESSION["ProduccionEstimada"]; ?>" />
                <input type="hidden" id="Texto2" name="Texto2" value="<?php echo $_SESSION["Texto2"]; ?>" />
                <input type="hidden" id="resPotenciaaInstalar" name="resPotenciaaInstalar" value="<?php echo $_SESSION["PotenciaaInstalar"]; ?>" />
                <input type="hidden" id="Texto3" name="Texto3" value="<?php echo $_SESSION["Texto3"]; ?>" />
                <input type="hidden" id="resImpactoAmbiental" name="resImpactoAmbiental" value="<?php echo $_SESSION["ImpactoAmbiental"]; ?>" />
                <input type="hidden" id="Texto4" name="Texto4" value="<?php echo $_SESSION["Texto4"]; ?>" />
                <input type="hidden" id="rescp" name="rescp" value="<?php echo $_SESSION["cp"]; ?>" />
                <input type="hidden" id="resgasto" name="resgasto" value="<?php echo $_SESSION["gasto"]; ?>" />
                <input type="hidden" id="ressuperficie" name="ressuperficie" value="<?php echo $_SESSION["superficie"]; ?>" />
                <input type="hidden" id="resroof" name="resroof" value="<?php echo $_SESSION["roof"]; ?>" />
                
                <a name="a_datos"></a>
                <p class="text-h4 text-white mb-5">Contacte con Solarfam para solicitar un estudio detallado o subvenciones disponibles</p>
                        
                <div class="mb-1">
                    <?php 
                        if($_SESSION["errorempresa"]!=""){
                            echo " <label>Nombre empresa*<input type=\"text\" class=\"input-gasto error\" name=\"empresa\" aria-required=\"true\" aria-invalid=\"false\" value=\"".$_SESSION["empresa"]."\"></label>";
                            echo "<span class=\"error\">".$_SESSION["errorempresa"]."</span>";
                            echo "<script>location.hash = '#a_datos';</script>";
                        } 
                        else{
                            echo " <label>Nombre empresa*<input type=\"text\" class=\"input-gasto\" name=\"empresa\" aria-required=\"true\" aria-invalid=\"false\" value=\"".$_SESSION["empresa"]."\"></label>";
                        }
                    ?>
                </div>
                <div class="mb-1">
                    <label>Teléfono
                        <input type="text" class="input-gasto" id="cif" name="cif" aria-required="true" aria-invalid="false" value="<?php echo $_SESSION["cif"]; ?>">
                    </label>
                </div>
                <div class="">
                    <?php 
                        if($_SESSION["erroremail"]!=""){
                            echo "<label>Email*<input type=\"email\" class=\"input-gasto error\" name=\"email\" aria-required=\"true\" aria-invalid=\"false\" value=\"".$_SESSION["email"]."\"></label>";
                            echo "<span class=\"error\">".$_SESSION["erroremail"]."</span>";
                            echo "<script>location.hash = '#a_datos';</script>";
                        } 
                        else{
                            echo "<label>Email*<input type=\"email\" class=\"input-gasto\" name=\"email\" aria-required=\"true\" aria-invalid=\"false\" value=\"".$_SESSION["email"]."\"></label>";
                        }
                    ?>
                </div>        
                <div class="mt-3">
                    <input type="submit" class="btn btn--accent btn--full btn--md" value="Solicitar estudio detallado" name="btnSolicitud" id="btnSolicitud" >
                </div>
            </form> 
        </div>

    </div>
</div>
<hr class="mt-6 mb-6">