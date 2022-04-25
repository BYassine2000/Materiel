<?php

class Modele {

    private $pdo;
    private $uneTable;

    public function __construct($server, $bdd, $user, $mdp) {
        $this->pdo = null;
        try {
            $this->pdo = new PDO("mysql:host=".$server.";dbname=".$bdd.";charset=utf8", $user, $mdp);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function setTable($uneTable) {
        $this->uneTable = $uneTable;
    }

    public function selectAll($chaine) {
        if ($this->pdo != null) {
            $requete = "SELECT ".$chaine." FROM " . $this->uneTable;
            $select = $this->pdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function selectWhere($chaine, $where) {
        if ($this->pdo != null) {
            $champs = array();
            $donnees = array();
            foreach ($where as $key=>$value) {
                $champs[] = $key." = :".$key;
                $donnees[":".$key] = $value;
            }
            $chaineWhere = implode(" AND ", $champs);
            $requete = "SELECT ".$chaine." FROM ".$this->uneTable." WHERE ".$chaineWhere;
            $select = $this->pdo->prepare($requete);
            $select->execute($donnees);
            return $select->fetch();
        } else {
            return null;
        }
    }

    public function insert($tab) {
        if ($this->pdo != null) {
            $champs = array();
            $donnees = array();
            foreach ($tab as $key=>$value) {
                $champs[] = ":".$key;
                $donnees[":".$key] = $value;
            }
            $chaine = implode(",", $champs);
            $requete = "INSERT INTO ".$this->uneTable." VALUES (null, ".$chaine.")";
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        } else {
            return null;
        }
    }

    public function delete($where) {
        if ($this->pdo != null) {
            $champs = array();
            $donnees = array();
            foreach ($where as $key=>$value) {
                $champs[] = $key." = :".$key;
                $donnees[":".$key] = $value;
            }
            $chaine = implode(" AND ", $champs);
            $requete = "DELETE FROM ".$this->uneTable." WHERE ".$chaine;
            $delete = $this->pdo->prepare($requete);
            $delete->execute($donnees);
        } else {
            return null;
        }
    }

    public function edit($tab, $where) {
        if ($this->pdo != null) {
            $champs = array();
            $donnees = array();
            foreach ($tab as $key=>$value) {
                $champs[] = $key . " = :".$key;
                $donnees[":".$key] = $value;
            }
            $chaine = implode(",", $champs);
            $champsWhere = array();
            foreach ($where as $key=>$value) {
                $champsWhere[] = $key." = :".$key;
                $donnees[":".$key] = $value;
            }
            $chaineWhere = implode(" AND ", $champsWhere);
            $requete ="UPDATE ".$this->uneTable." SET ".$chaine." WHERE ".$chaineWhere;
            $update = $this->pdo->prepare($requete);
            $update->execute($donnees);
        } else {
            return null;
        }
    }

    public function verifConnexion($pseudouser, $mdpuser) {
        if ($this->pdo != null) {
            $requete = "SELECT * FROM users WHERE pseudouser = :pseudouser AND mdpuser = :mdpuser";
            $select = $this->pdo->prepare($requete);
            $select->bindValue(":pseudouser", $pseudouser, PDO::PARAM_STR);
            $select->bindValue(":mdpuser", $mdpuser, PDO::PARAM_STR);
            $select->execute();
            $resultat = $select->fetch();
            return $resultat;
        } else {
            return null;
        }
    }

    public function selectNBSel() {
        if ($this->pdo != null) {
            $requete = "SELECT nb FROM grainSel ;";
            $select = $this->pdo->prepare($requete);
            $select->execute();
            $resultat = $select->fetch();
            return $resultat;
        } else {
            return null;
        }
    }

    public function verifPseudo($pseudouser) {
        if ($this->pdo != null) {
            $requete = "SELECT * FROM users WHERE pseudouser = :pseudouser";
            $select = $this->pdo->prepare($requete);
            $select->bindValue(":pseudouser", $pseudouser, PDO::PARAM_STR);
            $select->execute();
            $resultat = $select->fetch();
            return $resultat;
        } else {
            return null;
        }
    }

    public function insertTentative($tab) {
        if ($this->pdo != null) {
            $champs = array();
            $donnees = array();
            foreach ($tab as $key=>$value) {
                $champs[] = ":".$key;
                $donnees[":".$key] = $value;
            }
            $chaine = implode(",", $champs);
            $requete = "INSERT INTO ".$this->uneTable." VALUES (null, ".$chaine.")";
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        } else {
            return null;
        }
    }

}

?>
