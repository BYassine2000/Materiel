<?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { if (isset($_GET['idcategorie']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategorie" disabled>
                    + Ajouter une catégorie
                </button>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategorie">
                    + Ajouter une catégorie
                </button>
            </div>
        </div>
    </div>
<?php } } ?>

<div class="modal fade" id="addCategorie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insertion d'une catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="libelle" class="form-label">Nom de la catégorie</label>
                        <input type="text" name="libellecategorie" id="libelle" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fournisseur" class="form-label">Fournisseur de la catégorie</label>
                        <input type="text" name="fournisseurcategorie" id="fournisseur" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Annuler</button>
                    <button type="submit" name="subaddcategorie" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
