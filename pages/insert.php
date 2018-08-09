<?php

include('conexion.php');

if(!empty($_POST))
{
 $output = '';
    $nombres = mysqli_real_escape_string($conn, $_POST["nombres"]);
    $paterno = mysqli_real_escape_string($conn, $_POST["paterno"]);
    $materno = mysqli_real_escape_string($conn, $_POST["materno"]);
    $DNI = mysqli_real_escape_string($conn, $_POST["nroDoc"]);
    $direccion = mysqli_real_escape_string($conn, $_POST["direccion"]);
    $genero = mysqli_real_escape_string($conn, $_POST["genero"]);      
    $telefono = mysqli_real_escape_string($conn, $_POST["telefono"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $fechaNacimiento = mysqli_real_escape_string($conn, $_POST["fechaNacimiento"]);    
    $fechaNacimiento = add_dash_mysql($fechaNacimiento); 
    
    $query = " INSERT INTO estudiant (DNI,paterno,materno,nombres,genero,email,telefono,fechaNacimiento)
               VALUES('$DNI','$paterno','$materno','$nombres','$genero','$email','$telefono','$fechaNacimiento')";

    if(mysqli_query($conn, $query))
    {
     $output.= '<label class="text-success">Registro Insertado Correctamente</label>';    
     
     $select_query ='Select e.*, ( Case e.genero When "M" Then "Masculino" Else "Femenino" End) As genero_desc FROM `estudiant` e ORDER BY e.`paterno` ASC';
     
     $result = $conn->query($select_query);
     $output.="
      <table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-estudiantes'>
                                <thead>
                                    <tr>
                    <th class='center'>
                      <input type='checkbox'  
                        onClick='seleccionarTodo(this)'/>
                    </th>
                                        <th width='10'>Nro.</th>
                    <th>DNI</th>
                    <th>Apellidos y Nombres</th>
                                        <th>Género</th>
                                        <th>Email</th>
                                        <th>Teléfo</th>
                    <th></th>
                                    </tr>
                                </thead>
                                <tbody> ";
    if($result->num_rows > 0) {
        $i = 1;   
      while($row = $result->fetch_assoc())

          $output.="<tr>
          <td class='center'> <input type='checkbox' name='fila'/></td>
          <td class='center'>".$i."</td>
          <td>".$row["DNI"]."</td>
          <td>".mb_convert_encoding($row["paterno"]." ".$row["materno"]." ".$row["nombres"], "UTF-8", "ISO-8859-1")."</td>
          <td>".$row["genero_desc"]."</td> 
          <td class='center'>".$row["email"]."</td>
          <td class='center'>".$row["telefono"]."        </td>       
          <td class='center'>".$row["fechaNacimiento"]."</td>       
          <td>
              <div class='tooltip-demo'>
                  <button type='button' class='btn btn-xs btn-primary' data-toggle='tooltip' data-placement='bottom' title='Editar'><i class='ace-icon fa fa-pencil bigger-120'></i></button>
                  <button type='button' class='btn btn-xs btn-warning' data-toggle='tooltip' data-placement='bottom' title='Ver Cursos'> <i class='ace-icon fa fa-columns bigger-120'></i></button>
                  <button type='button' class='btn btn-xs btn-success' data-toggle='tooltip' data-placement='bottom' title='Asistencias'><i class='ace-icon fa fa-check bigger-120'></i></button>
              </div>       
          </td>     
          </tr>
          </tbody>
          </table>";
          $i++;
      } 
   }
    echo $output;
}
?>