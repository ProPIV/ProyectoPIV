<?php 
  $rol = "usuario";
  $navSuperior = file_get_contents('navSuperior.php');
  $sidebar = file_get_contents('sidebar.php');
  $contenidoAdmin = file_get_contents('admin/contenidoAdmin.php');
  $contenidoUsuario = file_get_contents('usuario/contenidoUsuario.php');
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
  <link rel="stylesheet" href="../CSS/styleUsuario.css">
  <title>SedeSoft</title>
</head>
<body>
  <div class="d-flex toggled" id="wrapper">
    <div class="nav_tog border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
          <div class="input-group input-group-sm mb-3 ">
              <div class="input-group-prepend ">
                  <span class="input-group-text lupa1" id="inputGroup-sizing-sm"><img src="../Imagenes/Lupa.png"
                          class="lupa" alt=""></span>
              </div>
              <input type="text" class="form-control" aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm" placeholder="Buscar">
          </div>
      </div>
      <div class="list-group list-group-flush">
          <ul>
              <?php         
                if ($rol=="admin") {
                    echo "<li><a href=''><img src='../Imagenes/inicio.png' class='inicio' alt=''>admin</a></li>";
                }elseif ($rol=="usuario") {
                    echo "<li><a href=''><img src='../Imagenes/inicio.png' class='inicio' alt=''>usuario</a></li>";;               
                }
              ?>                  
          </ul>
      </div>
    </div>
    <div id="page-content-wrapper">
      <?php echo $navSuperior; ?>
      <?php         
        if ($rol=="admin") {
            echo $contenidoAdmin;
        }elseif ($rol=="usuario") {
            echo $contenidoUsuario;
        }
      ?>
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
  <script src="../js/abrir.js"></script>
  <script type="text/javascript">
    $(document).ready(inicio)
  </script>
</body>

</html>