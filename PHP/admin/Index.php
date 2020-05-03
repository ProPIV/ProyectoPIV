<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administrador</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <h2><img src="/img/logo.jpg"></h2>
      <div class="sidebar-heading"></div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><img src="\img\usu.png"> Usuarios</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><img src="\img\usu.png">Colaboradores</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><img src="\img\empresa.png">Proveedores</a>
      <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><img src="\img\empresa.png">Empresas</a>
    </div>
      
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
        <h2 class=text-white>Administrador </h2><button><img src="/img/sobre.jpg" name="notificaciones"></button>
        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link text-white" href="#">Mi contrato<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuario
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Cambiar</a>
                <a class="dropdown-item" href="#">Salir</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">? Ayuda</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <br>
<div class="container-fluid">
  <button type="button" class="btn btn-outline-dark">Nuevo</button>
  <button type="button" class="btn btn-outline-dark">Editar</button>
  <button type="button" class="btn btn-outline-dark">Eliminar</button>
</div>
<br>

      <div class="container-fluid">
        <div class="row">
          <div class="col"><h5>ID</h5></div>
          <div class="col"><h5>Nombre</h5></div>
          <div class="col"><h5>Apellido</h5></div>
          <div class="col"><h5>Telefono</h5></div>
          <div class="col"><h5>Ciudad</h5></div>
          <div class="col"><h5>Sucursal</h5></div>
          <div class="col"><h5>Cargo</h5></div>
          <div class="w-100"></div>
          <div class="col">0001</div>
          <div class="col">Primer</div>
          <div class="col">Ejemplo</div>
          <div class="col">COnsulta</div>
          <div class="col">Cali</div>
          <div class="col">Candelaria</div>
          <div class="col">Coord TI</div>
          <div class="w-100"></div>
          <div class="col">0002</div>
          <div class="col">Ejemplo</div>
          <div class="col">Segundo</div>
          <div class="col">Muestra</div>
          <div class="col">Buga</div>
          <div class="col">Norte de Santander</div>
          <div class="col">Coord Compras</div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>