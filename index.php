<!DOCTYPE html>
<html lang="en">
<head>
    
 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">




    <title>Registro de estudiantes</title>
</head>
<body>
    <h1>Registro de Estudiantes</h1>

    <div class="container">
    <form class="d-flex" action="" method="post">
      <div class="col">

        <div class="mb-3">
          <label for="lbl_id" class="form-label"><b>ID</b></label>
          <input type="text" name="txt_id" id="txt_id" class="form-control" value="0" readonly>
        </div>

        <div class="mb-3">
          <label for="lbl_carnet" class="form-label" ><b>Numero de carnet</b></label>
          <input type="text" name="txt_carnet" id="txt_carnet" class="form-control" placeholder="codigo 001" required>
        </div>

        <div class="mb-3">
          <label for="lbl_nombres" class="form-label" ><b>Nombres</b></label>
          <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="walter anibal" required>
        </div>

        <div class="mb-3">
          <label for="lbl_apellidos" class="form-label" ><b>Apellidos</b></label>
          <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="ajbal ordoñez" required>
        </div>

        <div class="mb-3">
          <label for="lbl_direccion" class="form-label" ><b>Direccion</b></label>
          <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="4av 5-38 Antigua" required>
        </div>


        <div class="mb-3">
          <label for="lbl_telefono" class="form-label" ><b>Telefono</b></label>
          <input type="text" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="12345678" required>
        </div>

        <div class="mb-3">
          <label for="lbl_genero" class="form-label"><b>Genero</b></label>
          <select class="form-select" name="drop_genero" id="drop_genero">
            <option value=0>---Genero M-F --- </option>

             <?php
                 include("Conexion.php");
                 $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                 $db_conexion ->real_query("select idestudiantes,genero from estudiantes_1.estudiantes;");
                 $resultado =  $db_conexion-> use_result();
                 while($fila = $resultado->fetch_assoc()){
                 echo"<option value=". $fila['idestudiantes'] .">" .$fila['genero']. "</option>";
                 }
                 $db_conexion -> close();
            ?>
             </select>
        </div>
        <div class="mb-3">
          <label for="" class="lbl_correo"><b>Correo</b></label>
          <input type="text" name="txt_correo" id="txt_correo" class="form-control" placeholder="walterumg.0umw@gmail.com" required>
        </div>

        <div class="mb-3">
          <label for="" class="lbl_fn"><b>Fecha Nacimiento</b></label>
          <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" required>
        </div>

        <div class="btn-group">
        <div class="mb-3">
          <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value="Agregar" >
        </div>
        <div class="mb-3">
          <input type="submit" name="btn_actualizar" id="btn_actualizar" class="btn btn-primary" value="Actualizar" >
        </div>
        <div class="mb-3">
          <input type="submit" name="btn_borrar" id="btn_borrar" class="btn btn-primary" value="Borrar estudiantes" >
        </div>
</div>

<div class="table-responsive">
    <table class="table table-hover	table-borderless table-primary align-middle">
      <thead class="table-light">
        
        <tr>
          <th>carnet</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Genero</th>
          <th>correo</th>
          <th>Nacimiento</th>

        </tr>
        </thead>
        <tbody >
            <?php
                 include("Conexion.php");
                 $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                 $db_conexion ->real_query("select idestudiantes,carnet,nombres,apellidos,direccion,telefono,genero,correo,fecha_nacimiento from estudiantes_1.estudiantes;");
                 $resultado =  $db_conexion-> use_result();
                 while($fila = $resultado->fetch_assoc()){
                 echo"<tr data-id=". $fila['idestudiantes'].">";
                 echo"<td>". $fila['carnet']."</td>";
                 echo"<td>". $fila['nombres']."</td>";
                 echo"<td>". $fila['apellidos']. "</td>";
                 echo"<td>". $fila['direccion']. "</td>";
                 echo"<td>". $fila['telefono']. "</td>";
                 echo"<td>". $fila['genero']. "</td>";
                 echo"<td>". $fila['correo']. "</td>";
                 echo"<td>". $fila['fecha_nacimiento']. "</td>";
                 echo"<tr>";
                 }
                 $db_conexion -> close();
            ?>
    </tbody>

     </table>
  </div>
<?php
    if(isset($_POST["btn_agregar"])){
      include("Conexion.php");
                 $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                 $txt_carnet = utf8_decode ($_POST["txt_carnet"]);
                 $txt_nombres = utf8_decode ($_POST["txt_nombres"]);
                 $txt_apellidos = utf8_decode ($_POST["txt_apellidos"]);
                 $txt_direccion = utf8_decode ($_POST["txt_direccion"]);
                 $txt_telefono = utf8_decode ($_POST["txt_telefono"]);
                 $drop_genero = utf8_decode ($_POST["drop_genero"]);
                 $txt_correo = utf8_decode ($_POST["txt_correo"]);
                 $txt_fn = utf8_decode ($_POST["txt_fn"]);
                 $sql = "INSERT INTO estudiantes(carnet,nombres,apellidos,direccion,telefono,genero,correo,fecha_nacimiento)VALUES('".$txt_carnet."','".$txt_nombres."','".$txt_apellidos."','".$txt_direccion."','".$txt_telefono."',".$drop_genero.",'".$txt_correo."', '".$txt_fn."');";
                 if($db_conexion->query($sql)===true){
                    $db_conexion ->close();
                  echo"Exito";
                 header("Refresh:0");
                 }else{
                  echo"Error" .$sql ."<br>".$db_conexion-> close(); 
                 }
                }
  ?>









  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
</body>
</html>