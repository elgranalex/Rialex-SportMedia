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

        <form action="">
          <p>
            <label for="username">Username</label>
            <input class="input" type="text" name="username" />
          </p>

          <p>
            <label for="password">Password</label>
            <input class="input" type="password" name="password" />
          </p>

          <div class="options">
            <div>
              Remember me <input type="checkbox" name="remeberme" id="" />
            </div>
            <div>
              <a href="./olvido.php">Olvide mi password</a>
            </div>
          </div>

          <p>
            <input class="btn btn-login" type="submit" value="Iniciar sesión" />
          </p>
          <p>
            <input class="btn btn-login" type="submit" value="Entrar como invitado" />
          </p>
          <p><a href="./registrsrse.php" class="options">
            REGISTRARSE
          </p></a>
          <div class="providers">
            <span>Otros métodos para hacer login</span>
            <button class="btn google-provider">Google</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>