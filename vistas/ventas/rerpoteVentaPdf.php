<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$objv= new ventas();


	$c=new conectar();
	$conexion= $c->conexion();	
	$idventa=$_GET['idventa'];

 
 $sql="SELECT ve.id_venta,
		ve.fechaCompra,
		ve.id_cliente,
		ve.cantidad,
		art.nombre,
        art.precio,
        art.descripcion
	from ventas  as ve 
	inner join articulos as art
	on ve.id_producto=art.id_producto
	and ve.id_venta='$idventa'";
	
$result=mysqli_query($conexion,$sql);

	$ver=mysqli_fetch_row($result);

	$folio=$ver[0];
	$fecha=$ver[1];
	$idcliente=$ver[2];

 ?>	

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Reporte Salida de Productos</title>
 	

 </head>
 <body>
 
 <table style="border: hidden">

<tbody style="border: hidden">

<tr style="border: hidden">

<td style="border: hidden"><img src="data:image/jpeg;base64,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" width="100" height="50"></td>

<td style="border: hidden"><center><h4>Sistema Control de Inventario</h4></center></td>

</tr>
 </tbody>

</table>
 		
		
 		<p>
 			Fecha: <?php echo $fecha; ?>
 		</p>
 		<p>
 			Folio: <?php echo $folio ?>
 		</p>
 		<p>
 			Cliente: <?php echo $objv->nombreCliente($idcliente); ?>
 		</p>
 		<center>
 		<table FRAME="void" RULES="rows">
 			<tr>
 				<td>Nombre</td>
 				<td>Precio</td>
				<td>Cantidad</td>
				<td>Descripción</td>
 			</tr>
 			<?php 
 				$sql="SELECT ve.id_venta,
						ve.fechaCompra,
						ve.id_cliente,
						ve.cantidad,
						art.nombre,
				        art.precio,
				        art.descripcion
					from ventas  as ve 
					inner join articulos as art
					on ve.id_producto=art.id_producto
					and ve.id_venta='$idventa'";

				$result=mysqli_query($conexion,$sql);
				$total=0;
				while($mostrar=mysqli_fetch_row($result)){
 			 ?>
 			<tr>
 				<td><?php echo $mostrar[4]; ?></td>
 				<td><?php echo $mostrar[5] ?></td>
				<td><?php echo $mostrar[3] ?></td>
				<td><?php echo $mostrar[6] ?></td>
 			</tr>
 			<?php
 				$total=$total + $mostrar[5]*$mostrar[3];
 				} 
 			 ?>
 			 <tr>
 			 	<td>Total: <?php echo "$".$total ?></td>
 			 </tr>
 		</table>
		</center>

 		
 </body>
 </html>