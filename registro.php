<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		header("location:index.php");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>registro</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>

</head>
<body background="img/innovattia fondo.jpg">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-danger">
					<div class="panel panel-heading"style="background-color:#1560BD;"><center><font color="#FFFFFF">Registro <br>Administrador</font></center></div>
					<div class="panel panel-body">
					<p>
							<center><img src="img/innovattia.png"  height="190"></center>
						</p>
						<form id="frmRegistro">
							<center><label>Nombre</label></center>
							<input type="text" class="form-control input-sm" name="nombre" id="nombre">
							<center><label>Apellido</label></center>
							<input type="text" class="form-control input-sm" name="apellido" id="apellido">
							<center><label>Usuario</label></center>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<center><label>Password</label></center>
							<input type="text" class="form-control input-sm" name="password" id="password">
							<p></p>
							<center><span class="btn btn-primary" id="registro" style="background-color:#1560BD;">Registrar</span>
							<a href="index.php" class="btn btn-primary"  style="background-color:#1560BD;">Regresar a inicio</a></center>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					alert(r);

					if(r==1){
						alert("Agregado con exito");
					}else{
						alert("Fallo al agregar :(");
					}
				}
			});
		});
	});
</script>

