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
$idImagen = $_SESSION['id'];

$consulta= "SELECT imagen,imgtext1,imagenpin,imgtext2,imagenlogo,imgtext3 FROM trucks WHERE id='".$idImagen."'"; 
$resultado= mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$imagen=$fila['imagen'];
$texto=$fila['imgtext1'];
$imagenpin=$fila['imagenpin'];
$textopin=$fila['imgtext2'];
$imagenlogo=$fila['imagenlogo'];
$textologo=$fila['imgtext3'];




echo "<table width='600' border='0' align='center'>
        <tr>
            <th>Imagen</th>
            <th>nombre imagen</th>
            <th>Cambiar</th>
        
        </tr>
";
    
    echo "<tr>
            
            <td><img src='$imagen' width='150' height='100'></td>
            <td>$texto</td>
            
            <td><a href='cambiarImagen.php?idImagen=$idImagen&texto=$texto&imagen=$imagen'>Cambiar</a></td>
        </tr>"  ;   
   echo "<tr>
            
            <td><img src='$imagenpin' width='150' height='100'></td>
            <td>$textopin</td>
            
            <td><a href='cambiarpin.php?idImagen=$idImagen&textopin=$textopin&imagenpin=$imagenpin'>Cambiar</a></td>
        </tr>"  ;   
    echo "<tr>
            
            <td><img src='$imagenlogo' width='150' height='100'></td>
            <td>$textologo</td>
            
            <td><a href='cambiarlogo.php?idImagen=$idImagen&textologo=$textologo&imagenlogo=$imagenlogo'>Cambiar</a></td>
        </tr>"  ;   

     echo "   <tr>
    <td colspan='2'><div align='center'><a href='menu.php'>Menu</a> </div></td>
  </tr>    ";        

     echo    "<tr>
    <td colspan='2'><div align='center'><a href='desconectar_usuario.php'>Cerrar Sesi&oacute;n</a> </td>
  </tr>";

echo "</table>

    


";

?>
