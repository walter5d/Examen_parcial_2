
<?php
if(!empty($_POST)){
$txt_carnet = utf8_decode ($_POST["txt_carnet"]);
                 $txt_nombres = utf8_decode ($_POST["txt_nombres"]);
                 $txt_apellidos = utf8_decode ($_POST["txt_apellidos"]);
                 $txt_direccion = utf8_decode ($_POST["txt_direccion"]);
                 $txt_telefono = utf8_decode ($_POST["txt_telefono"]);
                 $drop_genero = utf8_decode ($_POST["drop_genero"]);
                 $txt_correo = utf8_decode ($_POST["txt_correo"]);
                 $txt_fn = utf8_decode ($_POST["txt_fn"]);

 $sql="";

 if(isset($_POST["btn_agregar"])){
$sql = "INSERT INTO estudiantes(carnet,nombres,apellidos,direccion,telefono,genero,correo,fecha_nacimiento)VALUES('".$txt_carnet."','".$txt_nombres."','".$txt_apellidos."','".$txt_direccion."','".$txt_telefono."',".$drop_genero.",'".$txt_correo."', '".$txt_fn."');";
}
 if(isset($_POST["btn_modificar"])){
$sql = "update estudiantes set carnet='".$txt_carnet."',  nombres='".$txt_nombres."',  apellidos='".$txt_apellidos."',  direccion'".$txt_direccion."',  telefono='".$txt_telefono."',  genero=".$drop_genero.",  correo='".$txt_correo."', fecha_nacimiento='".$txt_fn."');";
}

 if(isset($_POST["btn_eliminar"])){
$sql = " delete from estudiantes  where genero=".$drop_genero.";";
}

 


      include("Conexion.php");
                 $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                 
                 
                 if($db_conexion->query($sql)===true){
                    $db_conexion ->close();
                 
                 header("Location: index.php");
                 }else{
                  echo"Error" .$sql ."<br>".$db_conexion-> close(); 
                 }
                

}   
  ?>
