<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<style> 
	
	 .sinborde {
    border: 0;
  }
	
	
	</style>
	
	
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
				<div class="panel panel-primary">
					<div class="panel panel-heading" style="background-color:#1560BD;"><center>Sistema de Control de Inventario</center></div>
					<div class="panel panel-body">
						<p>
							<center><img src="img/innovattia.png"  height="190"></center>
						</p>
						<form id="frmLogin">
							<center><label>Usuario</label></center>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<center><label>Password</label></center>
							<input type="password" name="password" id="password" class="form-control input-sm">
							<p></p>
							<center><span class="btn btn-primary" id="entrarSistema" style="background-color:#1560BD;">Entrar</span>
							<?php  if(!$validar): ?>
							<a href="registro.php" class="btn btn-primary" style="background-color:#1560BD;">Registrar</a></center>
							<?php endif; ?>
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
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>