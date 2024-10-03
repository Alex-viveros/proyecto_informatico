<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
        
    <section>
        <div class ="contenedor">
            <div class = "formulario">
                <h2 class="my-4">Iniciar Sesión</h2>
                <form method="POST" action="login.php">
                    <div class="input-contenedor">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" id="username" name="username" required>
                        <label for="username">Usuario</label>
                    </div>
                    <div class="input-contenedor">
                        <i class="fa-regular fa-lock"></i>
                        <input type="password" id="password" name="password" required>
                        <label for="password">Contraseña</label>
                    </div>
                    <div class = "olvidar">
                        <label for="#">
                            <input type="checkbox">
                            <a href="#">olvide mi contraseña</a>
                        </label>
                    </div>

                    <div class="d-flex justify-content-center p-2">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                    <div class = "registrar">
                        <p>no tengo cuenta   <a href="index.php">crear una</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE nombre = '$username'";
        $result = $conn->query($sql);
        //Verifico que me este trayendo un usuario
        if ($result->num_rows > 0) {

            $user = $result->fetch_assoc();
            if (password_verify($password, $user['contraseña'])) {
                //Estoy asignando un usuario a la sesion
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $user['id'];
                header("Location: dashboard.php");
            } else {
                echo "<div class='alert alert-danger mt-3'>Contraseña incorrecta</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-3'>Usuario no encontrado</div>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>