<?php if (isset($_GET['idprofesseur']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du professeur</label>
            <input type="text" name="nomprofesseur" id="nom" class="form-control" value="<?php if ($leProf != null) {echo $leProf['nomprofesseur'];} ?>">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom du professeur</label>
            <input type="text" name="prenomprofesseur" id="prenom" class="form-control" value="<?php if ($leProf != null) {echo $leProf['prenomprofesseur'];} ?>">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse du professeur</label>
            <input type="text" name="adresseprofesseur" id="adresse" class="form-control" value="<?php if ($leProf != null) {echo $leProf['adresseprofesseur'];} ?>">
        </div>
        <div class="mb-3">
            <label for="diplome" class="form-label">Diplôme du professeur</label>
            <input type="text" name="diplomeprofesseur" id="diplome" class="form-control" value="<?php if ($leProf != null) {echo $leProf['diplomeprofesseur'];} ?>">
        </div>
        <div class="d-flex justify-content-center mb-5">
            <a href="1" class="btn btn-danger me-2">Annuler</a>
            <button type="submit" name="subeditprofesseur" class="btn btn-primary">Modifier</button>
        </div>
    </form>
<?php } ?>

<table class="table table-dark table-striped text-center mt-2" id="datatables-column-search-text-inputs">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Diplôme</th>
        <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
        <th scope="col">Opérations</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($lesProfs as $unProf) { ?>
        <tr>
            <td><?= $unProf['idprofesseur']; ?></td>
            <td><?= $unProf['nomprofesseur']; ?></td>
            <td><?= $unProf['prenomprofesseur']; ?></td>
            <td><?= $unProf['adresseprofesseur']; ?></td>
            <td><?= $unProf['diplomeprofesseur']; ?></td>
            <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
            <td>
                <a href="1&action=edit&idprofesseur=<?= $unProf['idprofesseur']; ?>" class="btn btn-primary me-2">Modifier</a>
                <a href="1&action=sup&idprofesseur=<?= $unProf['idprofesseur']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer ce professeur ?'));" class="btn btn-danger">Supprimer</a>
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
                    '<option value="1">1</option>'+ // Affichage de 1 professeur
                    '<option value="5">5</option>'+ // Affichage de 5 professeurs, etc...
                    '<option value="10">10</option>'+
                    '<option value="25">25</option>'+
                    '<option value="50">50</option>'+
                    '<option value="-1">100</option>'+ // Affichage de tous les professeurs
                    '</select>',
                emptyTable: "Aucune donnée disponible dans le tableau",
                info: "Affichage de _START_ à _END_ professeurs sur _TOTAL_ professeurs",
                infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
                infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
                infoThousands: ",",
                loadingRecords: "Chargement...",
                processing: "Traitement...",
                search: "",
                searchPlaceholder: "Rechercher...",
                zeroRecords: "Aucun professeur trouvé",
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                }
            }
        });
    });
</script>

