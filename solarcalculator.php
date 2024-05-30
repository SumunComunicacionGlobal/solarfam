<?php
/**
 * The template for displaying calculadora solar
 * 
 * Template Name: Calculadora
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Solarfam
 */

get_header();
?>

<main id="main" class="site-main wp-site-blocks">
		
		<?php get_template_part( 'template-parts/hero', 'page' ); ?>
		
		<?php
		//******calculadora
		session_start();
		$ano=date("y");
		$mes=date("m");
		$dia=date("d");
		$_SESSION["clave"]=$ano."XX".$dia.$mes;	
		//echo "<script>alert('".$_SESSION["clave"]."');</script>";
		
		$_SESSION["errorcp"]="";
		$_SESSION["errorsuperficie"]="";
		$_SESSION["errorgasto"]="";
		
		$_SESSION["errorempresa"]="";
		$_SESSION["errorcif"]="";
		$_SESSION["erroremail"]="";
		
		
		//miro si se ha pulsado el boton de calcular
		if($_POST["btnCalcular"]){
			
			$_SESSION["PrecioProduccion"]="0";
			$_SESSION["ProduccionEstimada"]="0";
			$_SESSION["PotenciaaInstalar"]="0";
			$_SESSION["ImpactoAmbiental"]="0";
			
			$_SESSION["Texto1"]="";
			$_SESSION["Texto2"]="";
			$_SESSION["Texto3"]="";
			$_SESSION["Texto4"]="";
			
			$_SESSION["cp"]="";
			$_SESSION["gasto"]="";
			$_SESSION["superficie"]="3000";
			$_SESSION["roof"]="panel";	
				
			$metros=$_POST["superficie"];
			$cp=$_POST["cp"];
			$gasto=$_POST["gasto"];
			$roof = $_POST["roof"];
			
			$_SESSION["cp"]=$cp;	
			$_SESSION["superficie"]=$metros;	
			$_SESSION["gasto"]=$gasto;	
			$_SESSION["roof"]=$roof;	
			
					
			$continuar=true;
			if($cp==""){
				$_SESSION["errorcp"]="Campo Obligatorio";
				$continuar=false;				
			}
			elseif($gasto==""){
				$_SESSION["errorgasto"]="Campo Obligatorio";
				$continuar=false;
			}
			
			if($continuar==true){
				$client = new SoapClient("https://solarfam.atlas-sap.com/ws/ws.asmx?WSDL");
				$params->clave = $_SESSION["clave"];
				$params->CodPostal = $cp;
				$params->Metros = $metros;   
				$params->TipoCubierta = $roof; 
				$params->GastoMensual = $gasto; 
				$params->CIF = ''; 
				$params->RazonSocial = ''; 
				
				$result = $client->GetCalculadora($params)->GetCalculadoraResult;
				
				if($result->Codigo==0){
					$_SESSION["PrecioProduccion"]=$result->PrecioProduccion;
					$_SESSION["ProduccionEstimada"]=$result->ProduccionEstimada;
					$_SESSION["PotenciaaInstalar"]=$result->PotenciaaInstalar;
					$_SESSION["ImpactoAmbiental"]=$result->ImpactoAmbiental;
					
					$_SESSION["Texto1"]=$result->Texto1;
					$_SESSION["Texto2"]=$result->Texto2;
					$_SESSION["Texto3"]=$result->Texto3;
					$_SESSION["Texto4"]=$result->Texto4;
			
					
					get_template_part( 'template-parts/calculator', 'success' ); 
					echo "<script>location.hash = '#a_resultados';</script>";
					
				}
				else{
					
					if($result->Codigo==12000){
						$_SESSION["errorcp"]=$result->Descripcion;
					}
					elseif($result->Codigo==11000){
						$_SESSION["errorsuperficie"]=$result->Descripcion;
					}
					elseif($result->Codigo==13000){
						$_SESSION["errorgasto"]=$result->Descripcion;
					}
					else {
						echo "<script>alert('".$result->Descripcion."');</script>";
					}
					
					$_SESSION["cp"]=$result->CodPostal;
					$_SESSION["gasto"]=$result->GastoMensual;
					$_SESSION["superficie"]=$result->Metros;
					$_SESSION["roof"]=$result->TipoCubierta;
					
					get_template_part( 'template-parts/calculator', 'form' ); 
				}
			}
			else{
				get_template_part( 'template-parts/calculator', 'form' ); 
			}
		}
		elseif($_POST["btnSolicitud"]){
			
			$empresa=$_POST["empresa"];
			$cif=$_POST["cif"];
			$email=$_POST["email"];
					
			$_SESSION["empresa"]=$empresa;	
			$_SESSION["cif"]=$cif;	
			$_SESSION["email"]=$email;	
			
			
			$_SESSION["PrecioProduccion"]=$_POST["resPrecioProduccion"];
			$_SESSION["ProduccionEstimada"]=$_POST["resProduccionEstimada"];
			$_SESSION["PotenciaaInstalar"]=$_POST["resPotenciaaInstalar"];
			$_SESSION["ImpactoAmbiental"]=$_POST["resImpactoAmbiental"];
		
			$_SESSION["Texto1"]=$_POST["Texto1"];
			$_SESSION["Texto2"]=$_POST["Texto2"];
			$_SESSION["Texto3"]=$_POST["Texto3"];
			$_SESSION["Texto4"]=$_POST["Texto4"];
			
			$_SESSION["cp"]=$_POST["rescp"];
			$_SESSION["gasto"]=$_POST["resgasto"];
			$_SESSION["superficie"]=$_POST["ressuperficie"];
			$_SESSION["roof"]=$_POST["resroof"];

			$client = new SoapClient("https://solarfam.atlas-sap.com/ws/ws.asmx?WSDL");
			$params->clave = $_SESSION["clave"];
			$params->CIF = $_SESSION["cif"];
			$params->CodPostal = $_SESSION["cp"];
			$params->email = $_SESSION["email"];
			$params->GastoEnergia = $_SESSION["gasto"];
			$params->RazSocial = $_SESSION["empresa"];
			$params->Superficie = $_SESSION["superficie"];
			$params->Cubierta = $_SESSION["roof"];
			
			$result = $client->AddRegSolicitudEstudio2($params)->AddRegSolicitudEstudio2Result;
		
			if($result->Codigo==0){
				echo "<script>location.href='./gracias-por-calcular';</script>";
				
			}
			else{
				if($result->Codigo==11000){
					$_SESSION["errorempresa"]=$result->Descripcion;
				}
				elseif($result->Codigo==12000){
					$_SESSION["errorcif"]=$result->Descripcion;
				}
				elseif($result->Codigo==13000){
					$_SESSION["erroremail"]=$result->Descripcion;
				}
				else {
					echo "<script>alert('".$result->Descripcion."');</script>";
				}
												
				get_template_part( 'template-parts/calculator', 'success' ); 
			}
						
		}
		else{
			$_SESSION["errorcp"]="";
			$_SESSION["errorsuperficie"]="";
			$_SESSION["errorgasto"]="";
			
			$_SESSION["cp"]="";
			$_SESSION["gasto"]="";
			$_SESSION["superficie"]="3000";
			$_SESSION["roof"]="panel";	
			
			
			$cp=$_GET["cp"];
			$continuar=true;
			if($cp==""){
				//$_SESSION["errorcp"]="Campo Obligatorio";
				$continuar=false;
			}
			if($continuar==true){
				$client = new SoapClient("https://solarfam.atlas-sap.com/ws/ws.asmx?WSDL");
				$params->clave = $_SESSION["clave"];
				$params->CodPostal = $cp;
							
				$result = $client->GetCodPostal($params)->GetCodPostalResult;
				
				if($result->Codigo!=0){
					//echo "<script>alert('".$result->Codigo."');</script>";
					//echo "<script>alert('".$result->Descripcion."');</script>";
					$_SESSION["errorcp"]=$result->Descripcion;				
				}
				$_SESSION["cp"]=$result->CodPostal;
			}
			
			get_template_part( 'template-parts/calculator', 'form' ); 
			
		}
		//******
		
		session_destroy();
		?>
		
		
        <?php get_template_part( 'template-parts/content', 'page' ); ?>
		
		
	</main><!-- #main -->

<?php
get_footer();

