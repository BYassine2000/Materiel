<h3 class="text-center mb-3">Gestion des profs</h3>

<?php

$leProf = null;

$unControleur->setTable("professeurs");

require_once("vue/vue_insert_professeur.php");

if (isset($_POST['subaddprofesseur'])) {
    $tab = array(
        'nomprofesseur'=>$_POST['nomprofesseur'],
        'prenomprofesseur'=>$_POST['prenomprofesseur'],
        'adresseprofesseur'=>$_POST['adresseprofesseur'],
        'diplomeprofesseur'=>$_POST['diplomeprofesseur']
    );
    $unControleur->insert($tab);
    echo '<script language="Javascript">document.location.replace("1");</script>';
}

if (isset($_POST['subeditprofesseur'])) {
    $where = array('idprofesseur' => $_GET['idprofesseur']);
    $tab = array(
        'nomprofesseur' => $_POST['nomprofesseur'],
        'prenomprofesseur' => $_POST['prenomprofesseur'],
        'adresseprofesseur' => $_POST['adresseprofesseur'],
        'diplomeprofesseur' => $_POST['diplomeprofesseur']
    );
    $unControleur->edit($tab, $where);
    echo '<script language="Javascript">document.location.replace("1");</script>';
}

if (isset($_GET['idprofesseur']) && isset($_GET['action'])) {
    $action = $_GET['action'];
    $idprofesseur = $_GET['idprofesseur'];
    $where = array('idprofesseur'=>$idprofesseur);
    switch ($action) {
        case 'sup':
            $unControleur->delete($where);
            echo '<script language="Javascript">document.location.replace("1");</script>';
            break;
        case 'edit':
            $leProf = $unControleur->selectWhere("*", $where);
            break;
    }
}

$chaine = "idprofesseur, nomprofesseur, prenomprofesseur, adresseprofesseur, diplomeprofesseur";
$lesProfs = $unControleur->selectAll($chaine);

require_once("vue/vue_select_all_professeurs.php");

?>
