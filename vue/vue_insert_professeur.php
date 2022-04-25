<?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { if (isset($_GET['idprofesseur']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-auto">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProfesseur" disabled>
                + Ajouter un professeur
            </button>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-auto">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProfesseur">
                + Ajouter un professeur
            </button>
        </div>
    </div>
</div>
<?php } } ?>


<div class="modal fade" id="addProfesseur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insertion d'un professeur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du professeur</label>
                        <input type="text" name="nomprofesseur" id="nom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom du professeur</label>
                        <input type="text" name="prenomprofesseur" id="prenom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse du professeur</label>
                        <input type="text" name="adresseprofesseur" id="adresse" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="diplome" class="form-label">Diplôme du professeur</label>
                        <input type="text" name="diplomeprofesseur" id="diplome" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Annuler</button>
                    <button type="submit" name="subaddprofesseur" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
