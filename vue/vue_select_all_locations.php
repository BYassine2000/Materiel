<?php if (isset($_GET['idlocation']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <form method="post" action="">
        <div class="mb-3">
            <label for="date" class="form-label">Date de la location</label>
            <input type="date" name="datelocation" id="date" class="form-control" value="<?php if ($laLocation != null) {echo $laLocation['datelocation'];} ?>">
        </div>
        <div class="mb-3">
            <label for="heure" class="form-label">Heure de la location</label>
            <input type="time" name="heurelocation" id="heure" class="form-control" value="<?php if ($laLocation != null) {echo $laLocation['heurelocation'];} ?>">
        </div>
        <div class="mb-3">
            <label for="duree" class="form-label">Durée de la location (en minutes)</label>
            <input type="number" name="dureelocation" id="duree" class="form-control" value="<?php if ($laLocation != null) {echo $laLocation['dureelocation'];} ?>">
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
        <div class="d-flex justify-content-center mb-5">
            <a href="4" class="btn btn-danger me-2">Annuler</a>
            <button type="submit" name="subeditlocation" class="btn btn-primary">Modifier</button>
        </div>
    </form>
<?php } ?>

<table class="table table-dark table-striped text-center mt-2" id="datatables-column-search-text-inputs">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Date location</th>
        <th scope="col">Heure location</th>
        <th scope="col">Durée location</th>
        <th scope="col">Professeur</th>
        <th scope="col">Matériel</th>
        <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
        <th scole="col">Opérations</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($lesLocations as $uneLocation) { ?>
        <tr>
            <td><?= $uneLocation['idlocation']; ?></td>
            <td><?= $uneLocation['date_format(datelocation, "%d/%m/%Y")']; ?></td>
            <td><?= $uneLocation['date_format(heurelocation, "%H:%i")']; ?></td>
            <td><?= $uneLocation['dureelocation']; ?> minutes</td>
            <td><?= $uneLocation['nomprofesseur']; ?></td>
            <td><?= $uneLocation['designationmateriel']; ?></td>
            <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
            <td>
                <a href="4&action=edit&idlocation=<?= $uneLocation['idlocation']; ?>" class="btn btn-primary me-2">Modifier</a>
                <a href="4&action=sup&idlocation=<?= $uneLocation['idlocation']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette location ?'));" class="btn btn-danger">Supprimer</a>
            </td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $("#datatables-column-search-text-inputs").DataTable({
            responsive: true, // Tableau responsive
            ordering: false, // Classement par ordre alphabétique
            iDisplayLength: 5, // Nombre d'affichage par défaut (au chargement de la page)
            language: {
                lengthMenu: '<select class="form-select">'+
                    '<option value="1">1</option>'+ // Affichage de 1 location
                    '<option value="5">5</option>'+ // Affichage de 5 locations, etc...
                    '<option value="10">10</option>'+
                    '<option value="25">25</option>'+
                    '<option value="50">50</option>'+
                    '<option value="-1">100</option>'+ // Affichage de toutes les locations
                    '</select>',
                emptyTable: "Aucune donnée disponible dans le tableau",
                info: "Affichage de _START_ à _END_ locations sur _TOTAL_ locations",
                infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
                infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
                infoThousands: ",",
                loadingRecords: "Chargement...",
                processing: "Traitement...",
                search: "",
                searchPlaceholder: "Rechercher...",
                zeroRecords: "Aucune location trouvée",
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                }
            }
        });
    });
</script>
