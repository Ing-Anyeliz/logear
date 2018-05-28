<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>usuario</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--fuente 'Merriweather Sans'-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container-form">
        <div class="header">
            <div class="logo-title">
                <!-- <img src="image/logosu.png" alt=""> -->
                <!--<h2>mis15</h2>-->
            </div>
            <!--menu login register-->
            <div class="menu">
                <a href="login.php"><li class="module-login active">Iniciar</li></a>
                <a href="register.php"><li class="module-register">Registrarse</li></a>
            </div>
        </div>
        <!--convierte caracteres especiales en entidades HTML -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Iniciar sesión</h1><!--<h2>presentacion</h2>--></div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>
            <!--MOSTRAR UN MENSAJE DE ERROR -->
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>

            <button type="submit">Entrar<!--<label class="lnr lnr-chevron-right"></label>--></button>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
