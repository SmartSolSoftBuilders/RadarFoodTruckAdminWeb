<?php 
//Proceso de conexión con la base de datos
$conex = mysql_connect("db545232790.db.1and1.com", "dbo545232790", "RadarFood+1")
		or die("No se pudo realizar la conexion");
	mysql_select_db("db545232790",$conex)
		or die("ERROR con la base de datos");

//Inicio de variables de sesión
  session_start();

$id = $_SESSION['id'];
//Recibir los datos ingresados en el formulario
$pass= $_POST['pass'];
$pass2= $_POST['pass2'];

if ($pass == $pass2) {
	# code...


//actualizar la base de datos
$actualiza= "UPDATE trucks SET password='".$pass."' WHERE id='".$id."' "; 
$resultado= mysql_query($actualiza,$conex) or die (mysql_error());

	//mostramos datos actualizados
	echo '<script language = javascript>
	alert("contrase&ntilde;a actualizada.")
	self.location = "datos_generales.php"
	</script>';
}

else
{

	echo '<script language = javascript>
	alert("las contrase&ntilde;as no coinciden.")
	</script>';


}
?>