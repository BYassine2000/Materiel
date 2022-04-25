<h3 class="text-center mb-3">Gestion des catégories</h3>

<?php

$laCategorie = null;

$unControleur->setTable("categories");

require_once("vue/vue_insert_categorie.php");

if (isset($_POST['subaddcategorie'])) {
    $tab = array(
        'libellecategorie'=>$_POST['libellecategorie'],
        'fournisseurcategorie'=>$_POST['fournisseurcategorie']
    );
    $unControleur->insert($tab);
    echo '<script language="Javascript">document.location.replace("3");</script>';
}

if (isset($_POST['subeditcategorie'])) {
    $where = array('idcategorie' => $_GET['idcategorie']);
    $tab = array(
        'libellecategorie'=>$_POST['libellecategorie'],
        'fournisseurcategorie'=>$_POST['fournisseurcategorie']
    );
    $unControleur->edit($tab, $where);
    echo '<script language="Javascript">document.location.replace("3");</script>';
}

if (isset($_GET['idcategorie']) && isset($_GET['action'])) {
    $action = $_GET['action'];
    $idcategorie = $_GET['idcategorie'];
    $where = array('idcategorie'=>$idcategorie);
    switch ($action) {
        case 'sup':
            $unControleur->delete($where);
            echo '<script language="Javascript">document.location.replace("3");</script>';
            break;
        case 'edit':
            $laCategorie = $unControleur->selectWhere("*", $where);
            break;
    }
}

$chaine = "idcategorie, libellecategorie, fournisseurcategorie";
$lesCategories = $unControleur->selectAll($chaine);

require_once("vue/vue_select_all_categories.php");

?>
