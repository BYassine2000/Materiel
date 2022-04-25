<h3 class="text-center mb-3">Gestion des utilisateurs</h3>

<?php

$leUser = null;

$unControleur->setTable("users");

require_once("vue/vue_insert_utilisateur.php");

if (isset($_POST['subaddutilisateur'])) {
    $tab = array(
        'nomuser'=>$_POST['nomuser'],
        'prenomuser'=>$_POST['prenomuser'],
        'pseudouser'=>$_POST['pseudouser'],
        'emailuser'=>$_POST['emailuser'],
        'mdpuser'=>$_POST['mdpuser'],
        'lvl'=>$_POST['lvl']
    );
    $unControleur->insert($tab);
    echo '<script language="Javascript">document.location.replace("5");</script>';
}

if (isset($_POST['subeditutilisateur'])) {
    $where = array('iduser' => $_GET['iduser']);
    $tab = array(
        'nomuser'=>$_POST['nomuser'],
        'prenomuser'=>$_POST['prenomuser'],
        'pseudouser'=>$_POST['pseudouser'],
        'emailuser'=>$_POST['emailuser'],
        'mdpuser'=>$_POST['mdpuser'],
        'lvl'=>$_POST['lvl']
    );
    $unControleur->edit($tab, $where);
    echo '<script language="Javascript">document.location.replace("5");</script>';
}

if (isset($_GET['iduser']) && isset($_GET['action'])) {
    $action = $_GET['action'];
    $iduser = $_GET['iduser'];
    $where = array('iduser'=>$iduser);
    switch ($action) {
        case 'sup':
            $unControleur->delete($where);
            echo '<script language="Javascript">document.location.replace("5");</script>';
            break;
        case 'edit':
            $leUser = $unControleur->selectWhere("*", $where);
            break;
    }
}

$chaine = "iduser, nomuser, prenomuser, pseudouser, emailuser, lvl";
$lesUtilisateurs = $unControleur->selectAll($chaine);

require_once("vue/vue_select_all_utilisateurs.php");

?>
