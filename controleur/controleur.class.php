<?php

require_once("modele/modele.class.php");

class Controleur {

    private $unModele;

    public function __construct($server, $bdd, $user, $mdp) {
        $this->unModele = new Modele($server, $bdd, $user, $mdp);
    }

    public function setTable($uneTable) {
        $this->unModele->setTable($uneTable);
    }

    public function selectAll($chaine = "*") {
        return $this->unModele->selectAll($chaine);
    }

    public function selectWhere($chaine = "*", $where) {
        return $this->unModele->selectWhere($chaine, $where);
    }

    public function insert($tab) {
        $this->unModele->insert($tab);
    }

    public function delete($where) {
        $this->unModele->delete($where);
    }

    public function edit($tab, $where) {
        $this->unModele->edit($tab, $where);
    }

    public function verifConnexion($pseudouser, $mdpuser) {
        $unUser = $this->unModele->verifConnexion($pseudouser, $mdpuser);
        return $unUser;
    }

    public function selectNBSel() {
        return $this->unModele->selectNBSel();
    }

    public function verifPseudo($pseudouser) {
        return $this->unModele->verifPseudo($pseudouser);
    }

    public function insertTentative($tab) {
        $this->unModele->insertTentative($tab);
    }

}

?>
