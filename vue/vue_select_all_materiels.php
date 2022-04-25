<?php if (isset($_GET['idmateriel']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <form method="post" action="">
        <div class="mb-3">
            <label for="designation" class="form-label">Désignation du matériel</label>
            <input type="text" name="designationmateriel" id="designation" class="form-control" value="<?php if ($leMateriel != null) {echo $leMateriel['designationmateriel'];} ?>">
        </div>
        <div class="mb-3">
            <label for="dateachat" class="form-label">Date d'achat du matériel</label>
            <input type="date" name="dateachatmateriel" id="dateachat" class="form-control" value="<?php if ($leMateriel != null) {echo $leMateriel['dateachatmateriel'];} ?>">
        </div>
        <div class="mb-3">
            <label for="etat" class="form-label">État du matériel</label>
            <select class="form-select" name="etatmateriel" id="etat">
                <option value="Bon état">Bon état</option>
                <option value="Mauvais état">Mauvais état</option>
            </select>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <a href="2" class="btn btn-danger me-2">Annuler</a>
            <button type="submit" name="subeditmateriel" class="btn btn-primary">Modifier</button>
        </div>
    </form>
<?php } ?>

<table class="table table-dark table-striped text-center mt-2" id="datatables-column-search-text-inputs">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Désignation</th>
        <th scope="col">Date d'achat</th>
        <th scope="col">État</th>
        <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
        <th scole="col">Opérations</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($lesMateriels as $unMateriel) { ?>
        <tr>
            <td><?= $unMateriel['idmateriel']; ?></td>
            <td><?= $unMateriel['designationmateriel']; ?></td>
            <td><?= $unMateriel['date_format(dateachatmateriel, "%d/%m/%Y")']; ?></td>
            <td><?= $unMateriel['etatmateriel']; ?></td>
            <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
            <td>
                <a href="2&action=edit&idmateriel=<?= $unMateriel['idmateriel']; ?>" class="btn btn-primary me-2">Modifier</a>
                <a href="2&action=sup&idmateriel=<?= $unMateriel['idmateriel']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer ce matériel ?'));" class="btn btn-danger">Supprimer</a>
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
                    '<option value="1">1</option>'+ // Affichage de 1 matériel
                    '<option value="5">5</option>'+ // Affichage de 5 matériels, etc...
                    '<option value="10">10</option>'+
                    '<option value="25">25</option>'+
                    '<option value="50">50</option>'+
                    '<option value="-1">100</option>'+ // Affichage de tous les matériels
                    '</select>',
                emptyTable: "Aucune donnée disponible dans le tableau",
                info: "Affichage de _START_ à _END_ matériels sur _TOTAL_ matériels",
                infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
                infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
                infoThousands: ",",
                loadingRecords: "Chargement...",
                processing: "Traitement...",
                search: "",
                searchPlaceholder: "Rechercher...",
                zeroRecords: "Aucun matériel trouvé",
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                }
            }
        });
    });
</script>

