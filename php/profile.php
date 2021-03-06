<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../img/logo.png">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Quiniela Mundial
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../css/material-kit.css?v=2.0.3" rel="stylesheet" />
</head>

<body class="profile-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
          TEC & RED </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Components
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="../index.html" class="dropdown-item">
                <i class="material-icons">layers</i> All Components
              </a>
              <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                <i class="material-icons">content_paste</i> Documentation
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="material-icons">cloud_download</i> Download
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/estadio.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="../img/faces/christian.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">Christian Louboutin</h3>
                <h6>Puntos: </h6>
                <br>
                <form class="" action="index.html" method="post">
                  <div class="form-group" style="overflow-x:auto;">
                    <table class='table center .table-bordered' id='tablaReporte'>
                      <tr>
                        <td>Partido</td>
                        <td>Local</td>
                        <td></td>
                        <td>Empate</td>
                        <td></td>
                        <td>Visitante</td>
                      </tr>
                      <?php
                        $sql = "SELECT partidousuario.cve_partido, usuario.Nombre, usuario.Apellidos, LCL.Nombre, VST.Nombre, partidousuario.Resultado FROM usuario, partidousuario, (SELECT pais.Nombre, pais.cve_pais FROM pais, partidousuario WHERE pais.cve_pais = partidousuario.Local) LCL, (SELECT pais.Nombre, pais.cve_pais FROM pais, partidousuario WHERE pais.cve_pais = partidousuario.Visitante) VST WHERE usuario.cve_usuario = partidousuario.cve_usuario AND LCL.cve_pais = partidousuario.Local AND VST.cve_pais = partidousuario.Visitante GROUP BY partidousuario.cve_partido";
                        $result = $conn->query($sql);
                        while($row = mysqli_fetch_row($result)){
                          $datos=$row[0]."||".
              						   $row[1]."||".
                             $row[2]."||".
              						   $row[3]."||".
                             $row[4]."||".
              						   $row[5];
                      ?>
                      <tr>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td>
                          <input class="form-check-input" type="checkbox" value="Si" name="si" id="eventos">
                        </td>
                        <td>
                          <?php
                            if($row[5] == "Empate"){
                              echo "<input class='form-check-input' type='checkbox' value='Si' checked name='si' id='eventos'>";
                            }else{
                              echo "<input class='form-check-input' type='checkbox' value='Si' name='si' id='eventos'>";
                            }
                          ?>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" value="Si" name="si" id="eventos">
                        </td>
                        <td><?php echo $row[4] ?></td>
                      </tr>
                      <?php
                    }
                       ?>
                    </table>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-round">Enviar</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://presentation.creative-tim.com">
              About Us
            </a>
          </li>
          <li>
            <a href="https://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="../js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../js/core/popper.min.js" type="text/javascript"></script>
  <script src="../js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="../js/material-kit.js?v=2.0.3" type="text/javascript"></script>
</body>

</html>
