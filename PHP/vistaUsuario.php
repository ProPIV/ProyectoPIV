<?php 
  $navSuperior = file_get_contents('navSuperior.php');
  $sidebar = file_get_contents('sidebar.php');
  $contenidoAdmin = file_get_contents('contenidoAdmin.php');
  $contenidoUsuario = file_get_contents('contenidoUsuario.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/styleUsuario.css">
  <title>SedeSoft</title>
</head>
<body>
  <div class="d-flex toggled" id="wrapper">
    <?php echo $sidebar; ?>
    <div id="page-content-wrapper">
      <?php echo $navSuperior; ?>
      <?php 
        $rol = "usuario";
        if ($rol=="admon") {
            echo $contenidoAdmin;
        }elseif ($rol=="usuario") {
            echo $contenidoUsuario;
        }
      ?>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="../JS/abrir.js"></script>
  <script type="text/javascript">
    $(document).ready(abrir)
  </script>
</body>

</html>