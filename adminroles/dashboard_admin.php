<?php
include '../conexion.php';
session_start();
if (!isset($_SESSION['username'])) {

    header("Location: ../login.php");
    exit;
}

$_SESSION['rol'] = 1; // Para pruebas

if (isset($_SESSION['rol'])) {
    $rol = $_SESSION['rol'];
    if ($rol !== 1) {
        header("Location: ../login.php");
        exit;
    }
}
$id = $_SESSION['id'];
$sql = "SELECT * FROM noticias ";
$result = $conn->query($sql);

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>

<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container">

        <a class="navbar-brand" href="/">
            <img src="../img/Noticias_Argentinas.jpg" alt="" height="60">
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mi-menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mi-menu">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item"><a href="dashboard_admin.php" class="nav-link active" aria-current="true">
                            Principal
                </a></li>
                <li class="nav-item"><a href="noticias_admin.php" class="nav-link">Noticias</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Usuarios</a></li>
                <li class="nav-item"><a href="roles_admin.php" class="nav-link">Roles</a></li>
                <li class="nav-item"><a class="nav-link disabled" aria-disabled="true">Categorias</a></li>

            </ul>
        
        
        </div>

    <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
</nav>


    <div class="container">
        <h2 class="my-4">Bienvenido, <?php echo $_SESSION['username']; ?></h2>
        <div class="container text-center">
            <div class="row">
                <div class=" col-sm-12 col-md-4">
                    <div class="list-group">
                        
                    </div>
                </div>
            <div class="col">
        </div>

            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>


</html>