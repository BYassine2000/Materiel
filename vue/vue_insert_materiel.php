<?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { if (isset($_GET['idmateriel']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMateriel" disabled>
                    + Ajouter un matériel
                </button>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMateriel">
                    + Ajouter un matériel
                </button>
            </div>
        </div>
    </div>
<?php } } ?>

<div class="modal fade" id="addMateriel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insertion d'un matériel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="designation" class="form-label">Désignation du matériel</label>
                        <input type="text" name="designationmateriel" id="designation" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="dateachat" class="form-label">Date d'achat du matériel</label>
                        <input type="date" name="dateachatmateriel" id="dateachat" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="etat" class="form-label">État du matériel</label>
                        <select class="form-select" name="etatmateriel" id="etat">
                            <option value="Bon état">Bon état</option>
                            <option value="Mauvais état">Mauvais état</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Annuler</button>
                    <button type="submit" name="subaddmateriel" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
