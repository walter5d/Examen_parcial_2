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
    <form class="d-flex" action="crud_estudiante.php" method="post">
      <div class="col">

        <div class="mb-3">
          <label for="lbl_idE" class="form-label"><b>ID</b></label>
          <input type="text" name="txt_idE" id="txt_idE" class="form-control" value="0" readonly>
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
          <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-success" value="Modificar" >
          <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger" value="Borrar estudiantes" >
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
        <tbody id="tbl_estudiantes">
            <?php
                 include("Conexion.php");
                 $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                 $db_conexion ->real_query("select idestudiantes,carnet,nombres,apellidos,direccion,telefono,genero,correo,fecha_nacimiento from estudiantes_1.estudiantes;");
                 $resultado =  $db_conexion-> use_result();
                 while($fila = $resultado->fetch_assoc()){
                 echo"<tr data-idestudiantes=". $fila['idestudiantes']."data-idE".$fila['genero'].">";
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
  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
<script>
    $("#tbl_estudiantes").on('click','tr td',function (e) {
      var target, id_estudiantes, idE, carnet, nombres, apellidos, direccion,correo,telefono, nacimiento;
      target = $(event.target);
      id_estudiantes = target.parent().data('id_estudiantes');  
      idE = target.parent().data('idE'); 
      carnet =target.parent('tr').find("td").eq(0).html();
      nombres =target.parent('tr').find("td").eq(1).html();
      apellidos =target.parent('tr').find("td").eq(2).html();
      direccion =target.parent('tr').find("td").eq(3).html();
      correo =target.parent('tr').find("td").eq(4).html();
      telefono =target.parent('tr').find("td").eq(5).html();
      nacimiento =target.parent('tr').find("td").eq(7).html();
      $("#txt_idestudiantes").val(idestudiantes);
      $("#txt_codigo").val(codigo);
      $("#txt_nombres").val(nombres);
      $("#txt_apellidos").val(apellidos);
      $("#txt_direccion").val(direccion);
      $("#txt_correo").val(correo);
      $("#txt_telefono").val(telefono);
      $("#txt_fn").val(nacimiento);
      $("#drop_genero").val(idp);
    });
  </script>


</body>
</html>