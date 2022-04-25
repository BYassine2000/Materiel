<?php if (isset($_GET['idcategorie']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <form method="post" action="">
        <div class="mb-3">
            <label for="libelle" class="form-label">Nom de la catégorie</label>
            <input type="text" name="libellecategorie" id="libelle" class="form-control" value="<?php if ($laCategorie != null) {echo $laCategorie['libellecategorie'];} ?>">
        </div>
        <div class="mb-3">
            <label for="fournisseur" class="form-label">Fournisseur de la catégorie</label>
            <input type="text" name="fournisseurcategorie" id="fournisseur" class="form-control" value="<?php if ($laCategorie != null) {echo $laCategorie['fournisseurcategorie'];} ?>">
        </div>
        <div class="d-flex justify-content-center mb-5">
            <a href="3" class="btn btn-danger me-2">Annuler</a>
            <button type="submit" name="subeditcategorie" class="btn btn-primary">Modifier</button>
        </div>
    </form>
<?php } ?>

<table class="table table-dark table-striped text-center mt-2" id="datatables-column-search-text-inputs">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Fournisseur</th>
        <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
        <th scole="col">Opérations</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($lesCategories as $uneCategorie) { ?>
        <tr>
            <td><?= $uneCategorie['idcategorie']; ?></td>
            <td><?= $uneCategorie['libellecategorie']; ?></td>
            <td><?= $uneCategorie['fournisseurcategorie']; ?></td>
            <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
            <td>
                <a href="3&action=edit&idcategorie=<?= $uneCategorie['idcategorie']; ?>" class="btn btn-primary me-2">Modifier</a>
                <a href="3&action=sup&idcategorie=<?= $uneCategorie['idcategorie']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette catégorie ?'));" class="btn btn-danger">Supprimer</a>
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
                    '<option value="1">1</option>'+ // Affichage de 1 catégorie
                    '<option value="5">5</option>'+ // Affichage de 5 catégories, etc...
                    '<option value="10">10</option>'+
                    '<option value="25">25</option>'+
                    '<option value="50">50</option>'+
                    '<option value="-1">100</option>'+ // Affichage de toutes les catégories
                    '</select>',
                emptyTable: "Aucune donnée disponible dans le tableau",
                info: "Affichage de _START_ à _END_ catégories sur _TOTAL_ catégories",
                infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
                infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
                infoThousands: ",",
                loadingRecords: "Chargement...",
                processing: "Traitement...",
                search: "",
                searchPlaceholder: "Rechercher...",
                zeroRecords: "Aucune catégorie trouvé",
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                }
            }
        });
    });
</script>
