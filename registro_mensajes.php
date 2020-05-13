<?php
	session_start();
	if($_SESSION['autorID']!=''){
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="author" content="Juan José Fernández Duarte" />
		<title>RAV</title>
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
			crossorigin="anonymous"
		/>
		<!--Aqui viene el icono de RAV
			<link rel="icon" href=""
			>-->
        <link rel="stylesheet" href="styles/index.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			$(document).ready(function () {
                $("#publicar").click(function () {
                    var titulo = $("#titulo").val();
                    var contenido = $("#contenido").val();
                    var enlace = $("#enlace").val();
                    var categoria = $('#categoria').find(":selected").val();
                    $.ajax({
                        url: "nueva_noticia.php",
                        method: "post",
                        data: { titulo: titulo, contenido: contenido, enlace: enlace, categoria: categoria },
                        success: function (response) {
                            alert(""+response);
                            // location.reload(true);
                        }
                    });
                });
            });
        </script>
	</head>
	<body data-spy="scroll" data-target="#navbar" data-offset="56">
		<!--Header-->
		<nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
			<div class="container">
				<a class="navbar-brand" href="#">RAV</a>
				<button
					class="navbar-toggler"
					type="button"
					data-toggle="collapse"
					data-target="#navbar"
					aria-controls="navbarSupportedContent"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="registro_noticias.php">Inicio<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#main">Mensajes</a>
						</li>
                    </ul>
					<a href="logout.php" class="btn ml-3 btn-outline-primary text-md">Cerrar Sesion</a>
				</div>
			</div>
		</nav>
		<!--header-->
		<!--Main-->
		<main id="main">
			<div id="carousel" class="carousel slide" data-ride="carousel" data-pause="false">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="assets/rios.jpg" class="d-block w-100" alt="Rios1" />
					</div>
					<div class="carousel-item">
						<img src="assets/rios2.jpg" class="d-block w-100" alt="Rios2" />
					</div>
					<div class="carousel-item">
						<img src="assets/riversunshining2.jpg" class="d-block w-100" alt="Rios3" />
					</div>
					<div class="overlay">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-md-6 offset-md-6 text-center text-md-right">
									<h1><strong>Rios de Agua Viva</strong></h1>
									<h2>Mensajes</h2>
									<p class="d-none d-md-block">
										Aqui tu puedes escribir ver todos los mensajes que nuestros lectores mandan a la pagina.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!--Main-->
		<div class="container-fluid">
			<div class="row">
				<nav class="col-md-2 d-none d-md-block bg-dark">
					<div id="alimentoDiario" class="position-sticky sticky-top text-center text-white mt-4 margin:2rem">
						<br />
						<br />
						<h5>
							ALIMENTO DIARIO
						</h5>
						<h3>02</h3>
						<span>Lunes</span>
						<p>
							La paga del pecado es muerte, mas la dádiva de Dios es vida eterna en Cristo Jesús Señor nuestro.
						</p>
						<span>
							Romanos 6:23
						</span>
					</div>
				</nav>
				<!--Todos los mensajes-->
				<section id="noticias-todas" class="mt-4 col-md-10">
					<div class="container">
						<div class="row">
							<div class="col text-center text-uppercase">
								<h2>Estas son Todas las Noticias Registradas:</h2>
							</div>
						</div>
						<div class="row">
                            <?php 
                                require 'conexionBD.php';

                                $cod_autor=$_SESSION['autorID'];

                                $data = "SELECT * FROM mensajes";
                                $dataResult = $conn->query($data);
                                if($dataResult->num_rows>0){
                                    while($row=$dataResult->fetch_array()){?>
                                        <div class="col-sm-6 col-lg-6 col-md-2 mb-4 mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><strong><?php echo $row['escritor_nombre'];?></strong></h5>
                                                    <a href="mailto:<?php echo $row['escritor_correo'];?>"><h6 class="card-subtitle mb-2 text-muted"><?php echo $row['escritor_correo'];?></h6></a>
                                                    <div class="badge">
                                                        <span class="badge badge-info"> Fecha y Hora que se Mando: <?php echo $row['fecha'];?></span>
                                                    </div>
                                                    <p class="card-text"><?php echo $row['mensaje'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
						</div>
					</div>
				</section>
				<!--Todos los mensajes-->
			</div>
		</div>
		<!--Footer-->
		<footer id="footer" class="pb-4 pt-4">
			<div class="container">
				<div class="row text-center">
					<div class="col">
						<h4>
							Puedes mandarnos algo, aqui:
						</h4>
						<div>
							<address>
								<a href="mailto:escritoestarav@gmail.com">escritoestarav@gmail.com</a>
							</address>
						</div>
					</div>
					<div class="col">
						<div id="sfcz9crywd3187mbeel81t9aacm8tzbyh7m"></div>
						<script
							type="text/javascript"
							src="https://counter10.stat.ovh/private/counter.js?c=z9crywd3187mbeel81t9aacm8tzbyh7m&down=async"
							async
						></script>
						<noscript
							><a href="https://www.contadorvisitasgratis.com" title="contador de visitas para blogger"
								><img
									src="https://counter10.stat.ovh/private/contadorvisitasgratis.php?c=z9crywd3187mbeel81t9aacm8tzbyh7m"
									border="0"
									title="contador de visitas para blogger"
									alt="contador de visitas para blogger" /></a
						></noscript>
					</div>
					<div class="col">
						<h4>
							Siguenos en Nuestras Redes
						</h4>
						<a href="https://www.youtube.com/channel/UCp1PiCAGhFYn20BlkNGVTRA" target="youtube">
							<img class="youtube" src="assets/youtube-dark.png" alt="Youtbe" width="70" height="70" />
						</a>
						<a
							href="https://www.facebook.com/Rios-De-Agua-Viva-Preparandonos-Para-El-Dia-del-Rapto-1110444619026844/"
							target="facebook"
						>
							<img class="facebook" src="assets/facebook-dark.png" alt="Facebook" width="50" height="50" />
						</a>
					</div>
					<div class="col">
						<div id="cont_f8754b0b4832a473be4f8a6632eee424">
							<script
								type="text/javascript"
								async
								src="https://www.meteored.com.bo/wid_loader/f8754b0b4832a473be4f8a6632eee424"
							></script>
						</div>
					</div>
				</div>
			</div>
		</footer>
        <!--Footer-->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script>
			$(function () {
				$('[data-toggle="tooltip"').tooltip();
			});
			$(function () {
				$(".sticky-content").sticky({
					topSpacing: 50,
					zIndex: 2,
					stopper: "#footer"
				});
			});
		</script>
    </body>    
</html>
<?php
} else{
	header("Location: index.php");
}
?>
