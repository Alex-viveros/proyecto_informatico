<?php
include 'conexion.php';

$sql = "SELECT * FROM roles";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Lista de Usuarios</title>
</head>

<body>

<section>
    <div class ="contenedor">
        <div class="formulario">
            <h2 class="my-4">Registro</h2>
            <form method="POST" action="register.php">
                <div class="input-contenedor">
                    <input type="text" id="username" name="username" required>
                    <label for="username" >Usuario</label>
                </div>
                <div class="input-contenedor">
                    <input type="text"  id="email" name="email" required>
                    <label for="email" >email</label>
                </div>
                <div class="input-contenedor">
                    <input type="password"  id="password" name="password" required>
                    <label for="password" >Contraseña</label>
                </div>
                <div class = "input-contenedor">
                    <select id="rol" name="rol" class="form-select" aria-label="Default select example">
                    <label for="rol" >Rol</label>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value={$row['id']}>{$row['nombre']}</option>
";
                            }
                        }
                        ?>

                    </select>
                </div>
                <div class="d-flex justify-content-center pb-3">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>

</section>

</body>

</html>

<?php
$conn->close();
?>