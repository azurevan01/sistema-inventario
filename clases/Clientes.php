<?php 

	class clientes{

		public function agregaCliente($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$idusuario=$_SESSION['iduser'];

			$sql="INSERT into clientes (id_usuario,
										nombre,
										apellido,
										unidad_departamento,
										direccion,
										email,
										telefono)
							values ('$idusuario',
									'$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]')";
			return mysqli_query($conexion,$sql);	
		}

		public function obtenDatosCliente($idcliente){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_cliente, 
							nombre,
							apellido,
							unidad_departamento,
							direccion,
							email,
							telefono
				from clientes";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
					'id_cliente' => $ver[0], 
					'nombre' => $ver[1],
					'apellido' => $ver[2],
					'unidad_departamento' => $ver[3],
					'direccion' => $ver[4],
					'email' => $ver[5],
					'telefono' => $ver[6],
						);
			return $datos;
		}

		public function actualizaCliente($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE clientes set nombre='$datos[1]',
										apellido='$datos[2]',
										unidad_departamento='$datos[3]',
										direccion='$datos[4]',
										email='$datos[5]',
										telefono='$datos[6]'
								where id_cliente='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminaCliente($idcliente){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from clientes where id_cliente='$idcliente'";

			return mysqli_query($conexion,$sql);
		}
	}

 ?>