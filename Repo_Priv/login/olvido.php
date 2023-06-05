<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login-FootPassion</title>
    <link rel="shortcut icon" href="../iconos/ms-icon-70x70.png">	
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="form-container">
      <div class="login-container">
        <h2>Welcome to FOOTPASSION</h2>

        <form action="../control.php" method="get">
          <p>
            <label for="username">Username</label>
            <input class="input" type="text" name="username" />
          </p>

          <p>
            <label for="email">E-Mail</label>
            <input class="input" type="email" name="email" />
          </p>

          <p>
            <input class="btn btn-login" type="submit" value="Enviar" />
          </p>

          <h3>
            Se le enviará por correo la nueva contraseña
          </h3>

        </form>
      </div>
    </div>
  </body>
</html>
