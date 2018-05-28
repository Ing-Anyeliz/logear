<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }



    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];

        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);

        $error = '';

        if (empty($correo) or empty($usuario) or empty($clave) or empty($clave2)){

            $error .= '<i>Rellenar todos los campos vacios</i>';
        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=login_tuto', 'root', '796534');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }

            $statement = $conexion->prepare('SELECT * FROM login WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();


            if ($resultado != false){
                $error .= '<i> Este usuario ya existe</i>';
            }

            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }

        }

        try{
            $conexion = new PDO('mysql:host=localhost;dbname=login_tuto', 'root', '796534');
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }

        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
          

                  if ($error == ''){
                      $statement = $conexion->prepare('INSERT INTO login (id, correo, usuario, clave) VALUES (null, :correo, :usuario, :clave)');
                      $statement->execute(array(

                          ':correo' => $correo,
                          ':usuario' => $usuario,
                          ':clave' => $clave

                      ));

                      $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
                  }

        }else {
          $error .= '<i> Correo no válido ex: keyquotest@me.com  </i>';
        }

    }


    require 'frontend/register-vista.php';

?>
