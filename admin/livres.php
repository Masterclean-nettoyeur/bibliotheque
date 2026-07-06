<?php
// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=bibliotheque", "root", "");

$sql ="SELECT id , titre,quantite,etat,auteur,categorie FROM livre" ;
$stmt=$pdo->query($sql);
// Récupérer les résultats sous forme de tableau
$livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
 <?php

session_start();
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "bibliotheque";

    // Create connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $titre = $_POST['titre'];
    $quantite = $_POST['quantite'];
    $etat = $_POST['etat'];
    $auteur = $_POST['auteur'];
    $categorie = $_POST['categorie'];
   

    try{
         $stmt = $conn->prepare("INSERT INTO `livre`(`titre`, `quantite`, `etat`, `auteur`, `categorie`) VALUES (:titre,:quantite,:etat,:auteur,:categorie)");   
         $stmt->bindParam(':titre', $titre); 
         $stmt->bindParam(':quantite', $quantite);
         $stmt->bindParam(':etat', $etat);
         $stmt->bindParam(':auteur', $auteur);
         $stmt->bindParam(':categorie', $categorie);
         $stmt->execute();
}catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
}
}
if(isset($_POST['delete'])){
    $titre = $_POST['titre'];
    $stmt = $conn->prepare("DELETE FROM livre WHERE titre = :titre");
    $stmt->bindParam(':titre', $titre);
    $stmt->execute();
}
?>   

<?php
include 'header.php';
?>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">bibliotheque</li><!-- /.menu-title -->
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="index.php">les membres</a></li>
                            <li><i class="fa fa-table"></i><a href="emprunts.php">Emprunts</a></li>
                             <li><i class="fa fa-table"></i><a href="ajouterLivre.php">Ajouter un livre</a></li>
                        </ul>
                    </li>
              

                    <li class="menu-title">Extras</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="login.php">Login</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><h1>Bibliotheque</h1></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" >
                                
                                    <thead>
                                        <tr>
                                            <th>titre</th>
                                            <th>Quantité</th>
                                            <th>État</th>
                                            <th>Auteur</th>
                                            <th>Catégorie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php foreach ($livres as $livre): ?> 
                                        <tr> 
                                            <td><?= htmlspecialchars($livre['titre']) ?> </td>
                                            <td><?= htmlspecialchars($livre['quantite']) ?></td> 
                                            <td><?= htmlspecialchars($livre['etat']) ?></td>
                                            <td><?= htmlspecialchars($livre['auteur']) ?></td>
                                            <td><?= htmlspecialchars($livre['categorie']) ?><button style="margin-left: 20px;color:white;background-color:red;" name="delete" type="submit">Delete</button></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>



    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>pages des d'ajout de livres </title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>


    <!-- ##### Contact Area Start ##### -->
<section class="contact-area section-padding-100"> <div class="container"> 
    <div class="row justify-content-center"> <!-- Formulaire d'ajout de livre --> 
        <div class="col-12 col-md-8 col-lg-6"> <div class="contact-form"> 
            <h5>Ajouter un livre</h5> <!-- Formulaire -->
             <form action="livres.php" method="post"> 
                <div class="row"> <!-- Titre --> 
                    <div class="col-12"> 
                                    <div class="group">
                                    <input type="text" name="titre" id="titre" required>
                                <span class="highlight"></span> <span class="bar"></span> 
                                <label>Titre du livre</label> </div> </div> <!-- Auteur --> 
                                <div class="col-12"> <div class="group">
                                <input type="number" name="quantite" id="quantite" required> 
                                <span class="highlight"></span> <span class="bar"></span> 
                                <label>Quantité</label>
                                <div class="col-12"> <div class="group">
                                <input type="number" name="etat" id="etat" required> 
                                <span class="highlight"></span> <span class="bar"></span> 
                                <label>etat</label> 
                                </div> </div> 
                                </div> </div>
                                <div class="col-12"> <div class="group">
                                <input type="text" name="auteur" id="auteur" required>
                                <span class="highlight"></span> <span class="bar"></span>
                                <label>Auteur</label> </div> </div>
                                <div class="col-12"> 
                                <div class="group">
                                <input type="text" name="categorie" id="categorie" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Catégorie</label>
                                </div> 
                                </div>
                             
                                <div class="col-12"> <button type="submit" class="btn original-btn"> Ajouter </button>
                        </div> 
                        </div> 
                    </form>
                 </div> 
            </div>
        </div> 
    </div>
 </section>
<!-- ##### Contact Area End ##### -->

    <!-- ##### Instagram Feed Area Start ##### -->
    <div class="instagram-feed-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="insta-title">
                        <h2>les livres </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instagram Slides -->
        <h5>livres Scientifiques</h5>
        <div class="instagram-slides owl-carousel">
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/2838.jpg" alt="">
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/25864.jpg" alt="">

            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/26808.jpg" alt="">
                <!-- Hover Effects -->
              
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/2838.jpg" alt="">
                <!-- Hover Effects -->
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/25864.jpg" alt="">
                <!-- Hover Effects -->
            </div>
            <div class="single-insta-feed">
                <img src="img/bg-img/25864.jpg" alt="">
            </div>
              <div class="single-insta-feed">
                <img src="img/bg-img/26808.jpg" alt="">
                <!-- Hover Effects -->
              
            </div>
        </div>
        <hr>
        <h5>livres litteraires</h5>
            <div class="instagram-slides owl-carousel">

            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/2838.jpg" alt="">
                <!-- Hover Effects -->
              
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/25864.jpg" alt="">
                <!-- Hover Effects -->
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/26808.jpg" alt="">
                <!-- Hover Effects -->
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/2838.jpg" alt="">
                <!-- Hover Effects -->
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/bg-img/25864.jpg" alt="">
            </div>
            <div class="single-insta-feed">
                <img src="img/bg-img/25864.jpg" alt="">
            </div>
                  <div class="single-insta-feed">
                <img src="img/bg-img/26808.jpg" alt="">
                <!-- Hover Effects -->
              
            </div>
        </div>
    </div>
    <!-- ##### Instagram Feed Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Footer Nav Area -->
                    <div class="classy-nav-container breakpoint-off">
                        <!-- Classy Menu -->
                        <nav class="classy-navbar justify-content-center">

                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>

                            <!-- Menu -->
                            <div class="classy-menu">

                                <!-- close btn -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <!-- Footer Social Area -->
                    <div class="footer-social-area mt-30">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

   <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

    </footer>


    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/map-active.js"></script>

</body>

</html>