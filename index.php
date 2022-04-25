<?php

session_start();

require_once("controleur/controleur.class.php");
require_once("controleur/config_db.php");

$unControleur = new Controleur($server, $bdd, $user, $mdp);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion des matériels - IRIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style type="text/css">
        div.dataTables_length select {
            width: 70px;
        }
    </style>
</head>
<body>

<?php if (isset($_SESSION['iduser'])) { ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/Materiels/">IRIS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="0">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="1">Professeurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="2">Matériels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="3">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="4">Locations</a>
                </li>
                <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="5">Utilisateurs</a>
                </li>
                <?php } ?>
            </ul>
            <form method="get" action="" class="d-flex">
                <input type="search" name="search" id="search" placeholder="Rechercher..." class="form-control ms-2 me-2">
                <button type="submit" name="subsearch" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </form>
            <?php if ($_SESSION['lvl'] == 1) { ?>
            <span class="ms-3 badge bg-info text-dark me-4"><?= $_SESSION['pseudouser']; ?></span>
            <?php } elseif ($_SESSION['lvl'] == 2) { ?>
            <span class="ms-3 badge bg-danger me-4"><?= $_SESSION['pseudouser']; ?></span>
            <?php } ?>
            <a href="6" class="btn btn-danger">Déconnexion</a>
        </div>
    </div>
</nav>

<div class="container mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-auto">
            <div class="card bg-primary mt-4 mb-5">
                <div class="card-header bg-primary">
                    <h1 class="text-center text-light">
                        Gestion des matériels au sein de l'école IRIS
                    </h1>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <img src="images/iris.png" height="167" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['subsearch'])) {
        $search = htmlentities($_POST['search']);
        //
    }
?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <?php
            if (isset($_GET['page']))
                $page = $_GET['page'];
            else
                $page = 0;

            switch ($page) {
                case 1 :
                    require_once("gestion_profs.php");
                    break;
                case 2 :
                    require_once("gestion_materiels.php");
                    break;
                case 3 :
                    require_once("gestion_categories.php");
                    break;
                case 4 :
                    require_once("gestion_locations.php");
                    break;
                case 5 :
                    if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) {
                        require_once("gestion_utilisateurs.php");
                    } else {
                        header('Location: /Materiels/0');
                    }
                    break;
                case 6 :
                    session_destroy();
                    header('Location: /Materiels/');
                    break;
                case 0 :
                    require_once("home.php");
                    break;
                default :
                    require_once("erreur.php");
                    break;
            }
        ?>
    </div>
</div>

<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title">Gestion des matériels au sein de l'école IRIS</h5>
    </div>
    <div class="card-footer text-muted">&copy; Copyright 2021 - Tom BRUAIRE</div>
</div>

<?php } else { ?>
    <div class="container mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <div class="card bg-primary mt-5">
                    <div class="card-header bg-primary">
                        <h1 class="text-center text-light">
                            Gestion des matériels au sein de l'école IRIS
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['Connexion'])) {
        $pseudouser = $_POST['pseudouser'];
        $unUser = $unControleur->verifPseudo($pseudouser);
        if (isset($unUser['pseudouser'])) {
            if ($unUser['lvl'] == 0) { ?>
                <div class="container mt-4">
                    <div class="row d-flex justify-content-center">
                        <div class="col-auto">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-message">
                                    <strong>Votre compte est bannis</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {
                $mdpuser = $_POST['mdpuser'];
                $nbSel = $unControleur->selectNBSel();
                $mdpuser5 = md5($mdpuser.$nbSel['nb']);
                $unUser = $unControleur->verifConnexion($pseudouser, $mdpuser5);
                if (isset($unUser['pseudouser']) && isset($unUser['mdpuser'])) {
                    $_SESSION['iduser'] = $unUser['iduser'];
                    $_SESSION['nomuser'] = $unUser['nomuser'];
                    $_SESSION['prenomuser'] = $unUser['prenomuser'];
                    $_SESSION['pseudouser'] = $unUser['pseudouser'];
                    $_SESSION['emailuser'] = $unUser['emailuser'];
                    $_SESSION['lvl'] = $unUser['lvl'];
                    header('Location: 0');
                } else { ?>
                    <div class="container mt-4">
                        <div class="row d-flex justify-content-center">
                            <div class="col-auto">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="alert-message">
                                        Identifiants incorrects
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    /*
                    $unControleur->setTable("tentatives");
                    $tab = array('nbtentative'=>'1');
                    $unControleur->insertTentative($tab);
                    $chaine = "idtentative";
                    $tentatives = $unControleur->selectAll($chaine);
                    if ($tentatives >= 3) {
                        $unControleur->setTable("users");
                        $where = array('iduser'=>$_GET['iduser']);
                        $tab = array('lvl'=>'0');
                        $unControleur->edit($tab, $where);
                    }*/
                }
            }
        } else { ?>
            <div class="container mt-4">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-message">
                                Pseudo incorrect
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }
    ?>

    <div class="container mt-4">
        <div class="d-flex justify-content-center">
            <div class="col-xxl-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Identifiez-vous</h3>
                    </div>
                    <form method="post" action="">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="pseudo" class="form-label">Pseudo</label>
                                <input type="text" name="pseudouser" id="pseudo" autocomplete="off" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="mdp" class="form-label">Mot de passe</label>
                                <input type="password" name="mdpuser" id="mdp" autocomplete="off" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <button type="reset" class="btn btn-danger me-2">Annuler</button>
                                <button type="submit" name="Connexion" class="btn btn-primary">Connexion</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>

</body>
</html>
