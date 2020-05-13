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
                            alert("Noticia Publicada!");
                            location.reload(true);
                        }
                    });
                });
                $(document).on("click", "button[data-role=update]", function () {
                    var id = $(this).data("id");
                    var titulo = $("#titulo"+id).text();
                    var contenido = $.trim($("#contenido"+id).text());
                    var enlace = $("#enlace"+id).attr('href');
                    var categoria = $.trim($("#categoria"+id).text());
                    $("#codEdit").val(id);
                    $("#tituloEdit").val(titulo);
                    $("#contenidoEdit").val(contenido);
                    $("#enlaceEdit").val(enlace);
                    $("#categoriaEdit").val(categoria);
                });
                $("#editar").click(function () {
                    var cod_noticia = $("#codEdit").val();
                    var titulo = $("#tituloEdit").val();
                    var contenido = $("#contenidoEdit").val();
                    var enlace = $("#enlaceEdit").val();
                    var categoria = $('#categoriaEdit').find(":selected").val();
                    $.ajax({
                        url: "editar_noticia.php",
                        method: "post",
                        data: { cod_noticia: cod_noticia, titulo: titulo, contenido: contenido, enlace: enlace, categoria: categoria },
                        success: function (response) {
                            alert(""+response);
                            location.reload(true);
                        }
                    });
                });
                $(document).on("click", "button[data-role=delete]", function () {
                    var id = $(this).data("id");
                    var titulo = $("#titulo"+id).text();
                    $("#cod_noticiaE").val(id);
                    $("#tituloE").val(titulo);
                    $("#deleteModal").modal("toggle");
                });
                $("#eliminar").click(function () {
                    var cod_noticia = $("#cod_noticiaE").val();                    
                    var titulo = $("#tituloE").val();
                    $.ajax({
                        url: "eliminar_noticia.php",
                        method: "post",
                        data: { cod_noticia: cod_noticia },
                        success: function (response) {
                            alert(response);
                            location.reload(true);
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
							<a class="nav-link" href="#main">Inicio<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="registro_mensajes.php">Mensajes</a>
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
									<h2>Pagina de Autores!</h2>
									<p class="d-none d-md-block">
										Bienvenido! Aqui tu puedes escribir noticias que seran mostradas en la pagina principal. Tambien puedes revisar los mensajes que nos envian.
									</p>
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#modalNoticia" role="button">Nueva Noticia</a>
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
				<!--Noticias Todas-->
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
                                $data = "SELECT * FROM noticias";
                                $dataResult = $conn->query($data);
                                if($dataResult->num_rows>0){
                                    while($row=$dataResult->fetch_array()){?>
                                        <div class="col-sm-6 col-lg-6 col-md-2 mb-4 mt-4">
                                            <div data-target="codigo" id="<?php echo $row['cod_noticia'];?>" class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><strong data-target="titulo" id="titulo<?php echo $row['cod_noticia'];?>"><?php echo $row['titulo'];?></strong></h5>
                                                    <div class="badge">
                                                        <?php 
                                                            $categoria=$row['cod_categoria'];
                                                            $cat = "SELECT * FROM categorias_noticias WHERE cod_categoria='$categoria'";
                                                            $dataResultCat = $conn->query($cat);
                                                            if($dataResultCat->num_rows>0){
                                                                while($rowCat=$dataResultCat->fetch_array()){
                                                                    switch($rowCat['categoria']){
                                                                        case 'Profesias':
                                                                            echo "<span class='badge badge-info' data-target='categoria' id='categoria".$row['cod_noticia']."'>".$rowCat['categoria']."</span>";
                                                                            break;
                                                                        case 'Desastres Naturales':
                                                                            echo "<span class='badge badge-secondary' data-target='categoria' id='categoria".$row['cod_noticia']."'>".$rowCat['categoria']."</span>";
                                                                            break;
                                                                        case 'Israel':
                                                                            echo "<span class='badge badge-primary' data-target='categoria' id='categoria".$row['cod_noticia']."'>".$rowCat['categoria']."</span>";
                                                                            break;
                                                                        case 'Ciencia y Tecnologia':
                                                                            echo "<span class='badge badge-success' data-target='categoria' id='categoria".$row['cod_noticia']."'>".$rowCat['categoria']."</span>";
                                                                            break;
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                    <p class="card-text" data-target="contenido" id="contenido<?php echo $row['cod_noticia'];?>">
                                                    <?php echo $row['contenido'];?>
                                                    </p>
                                                    <div class="d-flex bd-highlight mb-3">    
                                                        <a target="_blank" href="<?php echo $row['enlace_noticia'];?>" data-target="enlace" id="enlace<?php echo $row['cod_noticia'];?>" class="mr-auto p-2 bd-highlight btn btn-outline-primary"
                                                            >Ver Noticia Original</a
                                                        >                                        
                                                        <button class="p-2 bd-highlight btn btn-success" data-role="update" data-toggle="modal" data-target="#modalEditarNoticia" role="button" data-id="<?php echo $row['cod_noticia'];?>">Editar</button>
                                                        <button class="p-2 bd-highlight btn btn-outline-danger ml-2" data-role="delete" data-toggle="modal" data-target="#deleteModal" role="button" data-id="<?php echo $row['cod_noticia'];?>">Borrar</button>
                                                    </div>
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
				<!--Noticias Todas-->
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
        <!-- Modal Nueva Noticia -->
		<div class="modal fade" id="modalNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><strong>Nueva Noticia</strong></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="alert alert-primary" role="alert">
							Aqui debes configurar la noticia que deseas publicar!
						</div>
						<!--Contacto-->
						<form action="" method="post">
							<div class="form-row">
								<div class="form-group col">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Titulo:</span>
										</div>
										<input type="text" class="form-control" placeholder="Titulo de la noticia." id="titulo" name="titulo"/>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Contenido:</span>
										</div>
										<textarea
										name="contenido"
										class="form-control form-control-lg"
										placeholder="Contenido del post."
                                        id="contenido"
                                        maxlength="400"
										cols="40"
										rows="3"
									></textarea>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Enlace de fuente:</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enlace a la fuente de la noticia original." id="enlace" name="enlace" />
								</div>
                            </div>
                            <div class="form-row">
								<div class="form-group col">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Categoria:</span>
                                    </div>
                                    <select class="custom-select" id=categoria name=categoria> 
                                        <?php 
                                            require 'conexionBD.php';

                                            $cod_autor=$_SESSION['autorID'];
                                            $correo=$_SESSION['correo'];
                                            $contraseña=$_SESSION['contraseña'];

                                            $data = "SELECT * FROM categorias_noticias";
                                            $dataResult = $conn->query($data);
                                            if($dataResult->num_rows>0){
                                                while($row=$dataResult->fetch_array()){?>
                                                    <option value="<?php echo $row['cod_categoria'];?>" ><?php echo $row['categoria'];?></option>
                                        <?php   }
                                        }
                                        ?>
                                    </select>
								</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" id="publicar" name="publicar">Publicar</button>
                            </div>
						</form>
						<!--Contacto-->
					</div>
				</div>
			</div>
		</div>
        <!--Modal Nueva Noticia-->		
        <!-- Modal Editar Noticia -->
		<div class="modal fade" id="modalEditarNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><strong>Editar Noticia</strong></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="alert alert-primary" role="alert">
							Aqui debes modificar la noticia que seleccionaste!
						</div>
						<form action="" method="post">
                            <div class="form-row">
								<div class="form-group col">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Codigo:</span>
										</div>
										<input type="text" class="form-control" id="codEdit" name="codEdit" disabled/>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Titulo:</span>
										</div>
										<input type="text" class="form-control" placeholder="Titulo de la noticia." id="tituloEdit" name="tituloEdit"/>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Contenido:</span>
										</div>
										<textarea
										name="contenidoEdit"
										class="form-control form-control-lg"
										placeholder="Contenido del post."
                                        id="contenidoEdit"
                                        maxlength="400"
										cols="40"
										rows="3"
									></textarea>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Enlace de fuente:</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enlace a la fuente de la noticia original." id="enlaceEdit" name="enlaceEdit" />
								</div>
                            </div>
                            <div class="form-row">
								<div class="form-group col">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Categoria:</span>
                                    </div>
                                    <select class="custom-select" id=categoriaEdit name=categoriaEdit> 
                                        <?php 
                                            require 'conexionBD.php';

                                            $cod_autor=$_SESSION['autorID'];
                                            $correo=$_SESSION['correo'];
                                            $contraseña=$_SESSION['contraseña'];

                                            $data = "SELECT * FROM categorias_noticias";
                                            $dataResult = $conn->query($data);
                                            if($dataResult->num_rows>0){
                                                while($row=$dataResult->fetch_array()){?>
                                                    <option value="<?php echo $row['categoria'];?>" ><?php echo $row['categoria'];?></option>
                                        <?php   }
                                        }
                                        ?>
                                    </select>
								</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" id="editar" name="editar">Guardar Cambios</button>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
        <!--Modal Editar Noticia-->	
        <!-- Modal Eliminar-->
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteModalLabel">Eliminar Noticia</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning" role="alert">
							<p>¡¿Esta seguro que desea eliminar este post?!</p>
							<br>
							<p>¡Si borra este post no podra recuperarlo!</p>
						</div>
						<form action="" method="post">
							<div class="form-group">
								<label for="cod_noticiaE">Codigo</label>
								<input type="text" class="form-control" id="cod_noticiaE" name="cod_noticiaE" disabled />
							</div>
							<div class="form-group">
								<label for="tituloE">Titulo</label>
								<input type="text" class="form-control" id="tituloE" name="tituloE" disabled />
							</div>							
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-danger" id="eliminar" name="eliminar">Eliminar</button>
							</div>
						</form>
					</div>	
				</div>
			</div>
        </div>	
        <!-- Modal Eliminar-->
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
}else{
	header("Location: index.php");
}
?>
