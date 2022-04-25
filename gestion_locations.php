<h3 class="text-center mb-3">Gestion des locations</h3>

<?php

$laLocation = null;

require_once("vue/vue_insert_location.php");

if (isset($_POST['subaddlocation'])) {
    $unControleur->setTable("locations");
    $tab = array(
        'datelocation'=>$_POST['datelocation'],
        'heurelocation'=>$_POST['heurelocation'],
        'dureelocation'=>$_POST['dureelocation'],
        'idprofesseur'=>$_POST['idprofesseur'],
        'idmateriel'=>$_POST['idmateriel']
    );
    $unControleur->insert($tab);
    echo '<script language="Javascript">document.location.replace("4");</script>';
}

if (isset($_GET['idlocation']) && isset($_GET['action'])) {
    $unControleur->setTable("locations");
    $chaine = 'idlocation, date_format(datelocation, "%d/%m/%Y"), date_format(heurelocation, "%H:%i"), dureelocation, idprofesseur, idmateriel';
    $laLocation = $unControleur->selectAll($chaine);
}

if (isset($_POST['subeditlocation'])) {
    $where = array('idlocation' => $_GET['idlocation']);
    $tab = array(
        'datelocation'=>$_POST['datelocation'],
        'heurelocation'=>$_POST['heurelocation'],
        'dureelocation'=>$_POST['dureelocation'],
        'idprofesseur'=>$_POST['idprofesseur'],
        'idmateriel'=>$_POST['idmateriel']
    );
    $unControleur->edit($tab, $where);
    echo '<script language="Javascript">document.location.replace("4");</script>';
}

if (isset($_GET['idlocation']) && isset($_GET['action'])) {
    $action = $_GET['action'];
    $idlocation = $_GET['idlocation'];
    $where = array('idlocation'=>$idlocation);
    switch ($action) {
        case 'sup':
            $unControleur->delete($where);
            echo '<script language="Javascript">document.location.replace("4");</script>';
            break;
        case 'edit':
            $laLocation = $unControleur->selectWhere("*", $where);
            break;
    }
}

$unControleur->setTable("locationsProfsMats");

$chaine = 'idlocation, date_format(datelocation, "%d/%m/%Y"), date_format(heurelocation, "%H:%i"), dureelocation, nomprofesseur, prenomprofesseur, designationmateriel';
$lesLocations = $unControleur->selectAll($chaine);

require_once("vue/vue_select_all_locations.php");

?>
