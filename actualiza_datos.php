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
$name= $_POST['name'];
$tipo= $_POST['tipo'];
$horaa= $_POST['horaa'];
$horac= $_POST['horac'];
$desc= $_POST['desc'];
$facebook= $_POST['facebook'];
$twitter= $_POST['twitter'];

//actualizar la base de datos
$actualiza= "UPDATE trucks SET name='".$name."',tipo='".$tipo."',horaa='".$horaa."',horac='".$horac."',info='".$desc."',facebook='".$facebook."',twitter='".$twitter."' WHERE id='".$id."' "; 
$resultado= mysql_query($actualiza,$conex) or die (mysql_error());

	//mostramos datos actualizados
	echo '<script language = javascript>
	alert("datos actualizados correctamente.")
	self.location = "datos_generales.php"
	</script>';

?>