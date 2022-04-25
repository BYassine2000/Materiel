<h3 class="text-center mb-3">Gestion des matériels</h3>

<?php

$leMateriel = null;

$unControleur->setTable("materiels");

require_once("vue/vue_insert_materiel.php");

if (isset($_POST['subaddmateriel'])) {
    $tab = array(
        'designationmateriel'=>$_POST['designationmateriel'],
        'dateachatmateriel'=>$_POST['dateachatmateriel'],
        'etatmateriel'=>$_POST['etatmateriel']
    );
    $unControleur->insert($tab);
    echo '<script language="Javascript">document.location.replace("2");</script>';
}

if (isset($_POST['subeditmateriel'])) {
    $where = array('idmateriel' => $_GET['idmateriel']);
    $tab = array(
        'designationmateriel'=>$_POST['designationmateriel'],
        'dateachatmateriel'=>$_POST['dateachatmateriel'],
        'etatmateriel'=>$_POST['etatmateriel']
    );
    $unControleur->edit($tab, $where);
    echo '<script language="Javascript">document.location.replace("2");</script>';
}

if (isset($_GET['idmateriel']) && isset($_GET['action'])) {
    $action = $_GET['action'];
    $idmateriel = $_GET['idmateriel'];
    $where = array('idmateriel'=>$idmateriel);
    switch ($action) {
        case 'sup':
            $unControleur->delete($where);
            echo '<script language="Javascript">document.location.replace("2");</script>';
            break;
        case 'edit':
            $leMateriel = $unControleur->selectWhere("*", $where);
            break;
    }
}

$chaine = 'idmateriel, designationmateriel, date_format(dateachatmateriel, "%d/%m/%Y"), etatmateriel';
$lesMateriels = $unControleur->selectAll($chaine);

require_once("vue/vue_select_all_materiels.php");

?>
