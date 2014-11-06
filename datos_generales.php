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

$consulta= "SELECT twitter,facebook,name,info,tipo,horaa,horac FROM trucks WHERE id='".$id."'"; 
$resultado= mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$twitter = $fila['twitter'];
$facebook = $fila['facebook'];
$name = $fila['name'];
$info = $fila['info'];
$tipo = $fila['tipo'];
$horaa = $fila['horaa'];
$horac = $fila['horac'];
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
   <form action="actualiza_datos.php" method="post" name="actualiza" id="actualiza">
     <table width="500" align="center">
        <tr>
          <td colspan="2"><div align="center" class="Estilo17">
            <h3><img src="camion.png" />   </h3>
          </div></td>
        </tr>
         <tr>
    <td colspan="2"><div align="center">Usuario: <span class="Estilo6"><strong><? echo $_SESSION['name'];?></strong></span></div></td>
  </tr>
        <tr>
          <td colspan="2"><div align="justify" class="Estilo20"></div></td>
        </tr>
        <tr>
          <td width="33%"><div align="right"><span class="Estilo16">Nombre: </span></div></td>
          <td width="67%"><div align="left">
              <input name="name" type="text" id="name" size="20" value="<?php echo $name?>"/>
          </div></td>
        </tr>
        <tr>
          <td width="33%"><div align="right"><span class="Estilo16">Tipo de Comida: </span></div></td>
          <td width="67%"><div align="left">
              <input name="tipo" type="text" id="tipo" size="20" value="<?php echo $tipo?>"/>
          </div></td>
        </tr>
        <tr>
          <td width="33%"><div align="right"><span class="Estilo16">Hora de apertura: </span></div></td>
          <td width="67%"><div align="left">
              <input name="horaa" type="datetime" id="horaa" size="20" value="<?php echo $horaa?>"/>
          </div></td>
        </tr>
        <tr>
          <td width="33%"><div align="right"><span class="Estilo16">Hora de cierre: </span></div></td>
          <td width="67%"><div align="left">
              <input name="horac" type="text" id="horac" size="20" value="<?php echo $horac?>"/>
          </div></td>
        </tr>
        <tr>
          <td width="33%"><div align="right"><span class="Estilo16">Descripción: </span></div></td>
          <td width="67%" height="50%"><div align="left">
             <textarea rows="10" cols="22" name="desc" id="desc" size="20" /><?php echo $info?></textarea>
          </div></td>
        </tr>
        <tr>
          <td width="33%"><div align="right"><span class="Estilo16">Facebook: </span></div></td>
          <td width="67%"><div align="left">
              <input name="facebook" type="text" id="facebook" size="20" value="<?php echo $facebook?>"/>
          </div></td>
        </tr>
        <tr>
          <td width="33%"><div align="right"><span class="Estilo16">Twitter: </span></div></td>
          <td width="67%"><div align="left">
              <input name="twitter" type="text" id="twitter" size="20" value="<?php echo $twitter?>"/>
          </div></td>
        </tr>
        <tr>
          <td height="44">&nbsp;</td>
          <td><div align="left">
              <input type="submit" name="Submit" value="actualizar"/>
          </div></td>
       </tr>
        <tr>
    <td colspan="2"><div align="center"><a href="contrasena.php">actualizar contraseña</a> </div></td>
  </tr>
         <tr>
    <td colspan="2"><div align="center"><a href="menu.php">Menú</a> </div></td>
  </tr>
         <tr>
    <td colspan="2"><div align="center"><a href="desconectar_usuario.php">Cerrar Sesi&oacute;n</a> </div></td>
  </tr>
      </table>
    </form>
</body>
</html>