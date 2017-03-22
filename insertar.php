<?php
  var_dump($_POST);
  $stringJSON = $_POST['json'];
  $arrayJSON = json_decode($stringJSON,true);

  var_dump($arrayJSON);

if ($arrayJSON['nombre']=="")
  {
    $error= array('error'=>'campo nombre no definido');
    return json_encode($error);
  }

  if ($arrayJSON['apellido']=="")
  {
    $error= array('error'=>'campo nombre no definido');
    return json_encode($error);

  }
  if ($arrayJSON['numColegiado']=="")
  {
    $error= array('error'=>'campo nombre no definido');
    return json_encode($error);

  }
  if ($arrayJSON['tMinConsulta']=="")
  {
    $error= array('error'=>'campo nombre no definido');
    return json_encode($error);

  }
  if ($arrayJSON['diasConsulta']=="")
  {
    $error= array('error'=>'campo nombre no definido');
    return json_encode($error);

  }
  if ($arrayJSON['dni']=="")
  {
    $error= array('error'=>'campo nombre no definido');
    return json_encode($error);

  }
  if ($arrayJSON['contraseña']=="")
  {
    $error= array('error'=>'campo nombre no definido');
    return json_encode($error);

  }
  if ($arrayJSON['especialidad']=="")
  {
    $error= array('error'=>'campo nombre no definido');
    return json_encode($error);

  }
  
  $hotsdb= "localhost";
  $basededatos="clinica_upm";
  $usuariodb="root";
  $clavedb="";

  $conexion_db = mysqli_connect("$hotsdb", "$usuariodb","$clavedb") or die ("Conexion denegada, la base de datos No Existe");
  $db= mysqli_select_db($conexion_db, $basededatos) or die ("La base de datos <b>$basededatos</b> No existe");

  //echo "DB: ".var_dump($db)."<br>";
  //TABLA USUARIO (NOMBRE APELLIDOS DNI PASSWORD TIPO_USUARIO)
  $nombre=$arrayJSON['nombre'];
  $apellidos=$arrayJSON['apellido'];
  $dni=$arrayJSON['dni'];
  $password=$arrayJSON['contraseña'];  

  //TABLA PERSONAL (ID_USUARIO, NUM_COLEGIADO, DISPONIBILIDAD, TIEMPO_MIN_CONSULTA)
  
  $num_colegiado=$arrayJSON['numColegiado'];
  $disponibilidad=$arrayJSON['diasConsulta'];
  $tiempo_min_consulta=$arrayJSON['tMinConsulta'];
  
  //TABLA ESPECIALIDAD (NOMBRE)
  //$nombre_especialidad=$arrayJSON['especialidad'];

  $sql="SELECT nombre, apellidos FROM USUARIO";  
  if(mysqli_num_rows(mysqli_query($conexion_db, $sql))==0)
  {
     // $sql="INSERT INTO especialidad (NOMBRE) VALUES ('$nombre_especialidad')";
  //$result=mysqli_query($conexion_db, $sql);

  //var_dump($_POST);
  $sql="INSERT INTO usuario (NOMBRE,APELLIDOS,DNI,PASSWORD,TIPO_USUARIO) VALUES ('$nombre','$apellidos','$dni','$password','Medico')";
  $result=mysqli_query($conexion_db, $sql);

  $sql= "INSERT INTO personal (ID_USUARIO,NUM_COLEGIADO,DISPONIBILIDAD,TIEMPO_MIN_CONSULTA) VALUES ('','$num_colegiado','$disponibilidad','$tiempo_min_consulta')";
  //echo "SQL : $sql <br>";
  $result=mysqli_query($conexion_db, $sql);
  //echo "RESULT: ".var_dump($result)."<br>";
  //echo "Datos recibidos";

  }
  else echo "El usuario ya esta registrado, introduzca un nuevo usuario";

  





?>