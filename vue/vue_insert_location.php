<?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { if (isset($_GET['idlocation']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addLocation" disabled>
                    + Ajouter une location
                </button>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addLocation">
                    + Ajouter une location
                </button>
            </div>
        </div>
    </div>
<?php } } ?>

<div class="modal fade" id="addLocation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insertion d'une location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="datel" class="form-label">Date de la location</label>
                        <input type="date" name="datelocation" id="datel" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="heure" class="form-label">Heure de la location</label>
                        <input type="time" name="heurelocation" id="heure" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="duree" class="form-label">Durée de la location (en minutes)</label>
                        <input type="number" name="dureelocation" id="duree" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="prof" class="form-label">Professeur</label>
                        <select name="idprofesseur" id="prof" class="form-select">
                            <?php
                            $unControleur->setTable("professeurs");
                            $lesProfs = $unControleur->selectAll();
                            foreach ($lesProfs as $unProf) { ?>
                                <option value="<?= $unProf['idprofesseur']; ?>"><?= $unProf['prenomprofesseur']; ?> <?= $unProf['nomprofesseur']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="materiel" class="form-label">Matériel</label>
                        <select name="idmateriel" id="materiel" class="form-select">
                            <?php
                            $unControleur->setTable("materiels");
                            $lesMateriels = $unControleur->selectAll();
                            foreach ($lesMateriels as $unMateriel) { ?>
                                <option value="<?= $unMateriel['idmateriel']; ?>"><?= $unMateriel['designationmateriel']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Annuler</button>
                    <button type="submit" name="subaddlocation" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
