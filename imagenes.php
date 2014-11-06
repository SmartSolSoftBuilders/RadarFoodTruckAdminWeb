<?php 
//Proceso de conexión con la base de datos
$conex = mysql_connect("db545232790.db.1and1.com", "dbo545232790", "RadarFood+1")
		or die("No se pudo realizar la conexion");
	mysql_select_db("db545232790",$conex)
		or die("ERROR con la base de datos");

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.html"
</script>';
}

$id = $_SESSION['id'];

$consulta= "SELECT twitter,facebook FROM trucks WHERE id='".$id."'"; 
$resultado= mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$twitter = $fila['twitter'];
$facebook = $fila['facebook'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pagina de Usuario</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</head>
<body>
<table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">Usuario: <span class="Estilo6"><strong><? echo $_SESSION['name'];?></strong></span></div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right"><a href="desconectar_usuario.php">Cerrar Sesi&oacute;n</a> </div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><img src="camion.png" /></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <p>Su apellido es <?php echo $twitter; ?></p>
      <p>Su edad es: <?php echo $facebook; ?></p>
    </div></td>
  </tr>
</table>
</body>
</html>