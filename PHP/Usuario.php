<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/StyleUsuario.css">
  <title>SedeSoft</title>
</head>

<body>
  <div class="d-flex toggled" id="wrapper">
    <!-- Inicio Sidebar -->
    <div class="nav_tog border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <div class="input-group input-group-sm mb-3 ">
          <div class="input-group-prepend ">
            <span class="input-group-text lupa1" id="inputGroup-sizing-sm"><img src="../Imagenes/Lupa.png" class="lupa"
                alt=""></span>
          </div>
          <input type="text" class="form-control" aria-label="Sizing example input"
            aria-describedby="inputGroup-sizing-sm" placeholder="Buscar">
        </div>
      </div>
      <div class="list-group list-group-flush">
        <ul>
          <li><a href=""><img src="../Imagenes/inicio.png" class="inicio" alt="">Inicio</a></li>
          <li><a href=""><img src="../Imagenes/inicio.png" class="inicio" alt="">Dos</a></li>
          <li><a href=""><img src="../Imagenes/inicio.png" class="inicio" alt="">Tres</a></li>
          <li><a href=""><img src="../Imagenes/inicio.png" class="inicio" alt="">Cuatro</a></li>
        </ul>
      </div>
    </div>
    <!--Fin Sidebar-->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg Alineacion navbar-color">
        <button class="btn btn-primary boton_menu" id="menu-toggle"><img src="../Imagenes/Menu.png" alt=""
            class="boton_img"></button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="logonav col-8">
          <a class="navbar-brand" href="#"><img src="../Imagenes/Logo.png" alt="Logo" class="Logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse Alin-user col-2 Alin-usert" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto " style="padding-left:revert">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Carlos Aux
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"><img src="../Imagenes/inicio.png" class="inicio" alt="">Mi
                  informacion</a>
                <a class="dropdown-item" href="#"><img src="../Imagenes/inicio.png" class="inicio" alt="">Another
                  action</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="Alin-img col-2 Alin-imgt">
          <a class="navbar-brand Alineacion" href="#"><img src="../Imagenes/Usuario.png" alt="Mensaje"
              class="Usuario"></a>
        </div>
      </nav>
      <!--Acá empieza el contenido.-->
      <div class="container-fluid">
        <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on
          larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional,
          and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the
          menu when clicked.</p>
      </div>
      <!--Acá termina el contenido.-->
    </div>
    <!-- /#page-content-wrapper -->
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