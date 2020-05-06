<?php 
  $rol = "nada";
  $navSuperior = file_get_contents('navSuperior.php');
  $sidebarAdmin = file_get_contents('admin/sidebarAdmin.php');
  $sidebar = file_get_contents('sidebar.php');
  $sidebarEmpleados = file_get_contents('empleados/sidebarUser.php');
  $contenidoAdmin = file_get_contents('admin/Index.php');
  $contenidoEmpleados = file_get_contents('empleados/Index.php');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../CSS/styleUser.css">
  <title>SedeSoft</title>
</head>
<body>
  <div class="d-flex toggled" id="wrapper">
    <?php 
      if ($rol=="admin") {
          echo $sidebarAdmin;
      }elseif ($rol=="user") {
          echo $sidebarUser;
      }elseif ($rol=="nada") {
          echo $sidebar;
      } 
    ?>
    <div id="page-content-wrapper">
      <?php echo $navSuperior; ?>
      <div id="contenido">             
      </div>      
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <input type="hidden" id="pagina" value="index" name="editar"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
    <!-- Librearía para las funcionalidades de la tabla -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="../js/funcionesJquery.js"></script>
  <script type="text/javascript">
    $(document).ready(inicio)
  </script>
</body>

</html>