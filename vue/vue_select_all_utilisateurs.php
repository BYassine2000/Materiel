<?php if (isset($_GET['iduser']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'utilisateur</label>
            <input type="text" name="nomuser" id="nom" class="form-control" value="<?php if ($leUser != null) {echo $leUser['nomuser'];} ?>">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom de l'utilisateur</label>
            <input type="text" name="prenomuser" id="prenom" class="form-control" value="<?php if ($leUser != null) {echo $leUser['prenomuser'];} ?>">
        </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo de l'utilisateur</label>
            <input type="text" name="pseudouser" id="pseudo" class="form-control" value="<?php if ($leUser != null) {echo $leUser['pseudouser'];} ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email de l'utilisateur</label>
            <input type="email" name="emailuser" id="email" class="form-control" value="<?php if ($leUser != null) {echo $leUser['emailuser'];} ?>">
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe de l'utilisateur</label>
            <input type="password" name="mdpuser" id="mdp" class="form-control" value="<?php if ($leUser != null) {echo $leUser['mdpuser'];} ?>">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type d'utilisateur</label>
            <select class="form-select" name="lvl" id="type">
                <option value="1">Utilisateur</option>
                <option value="2">Administrateur</option>
            </select>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <a href="5" class="btn btn-danger me-2">Annuler</a>
            <button type="submit" name="subeditutilisateur" class="btn btn-primary">Modifier</button>
        </div>
    </form>
<?php } ?>


<table class="table table-dark table-striped text-center mt-2" id="datatables-column-search-text-inputs">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Adresse email</th>
        <th scope="col">Type</th>
        <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
            <th scole="col">Opérations</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($lesUtilisateurs as $unUtilisateur) { ?>
        <tr>
            <td><?= $unUtilisateur['iduser']; ?></td>
            <td><?= $unUtilisateur['nomuser']; ?></td>
            <td><?= $unUtilisateur['prenomuser']; ?></td>
            <td><?= $unUtilisateur['pseudouser']; ?></td>
            <td><?= $unUtilisateur['emailuser']; ?></td>
            <td>
                <?php if ($unUtilisateur['lvl'] == 1) { ?>
                    <span class="ms-3 badge bg-info text-dark me-4">Utilisateur</span>
                <?php } elseif ($unUtilisateur['lvl'] == 2) { ?>
                    <span class="ms-3 badge bg-danger me-4">Administrateur</span>
                <?php } ?>
            </td>
            <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { ?>
                <td>
                    <a href="5&action=edit&iduser=<?= $unUtilisateur['iduser']; ?>" class="btn btn-primary me-2">Modifier</a>
                    <a href="5&action=sup&iduser=<?= $unUtilisateur['iduser']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet utilisateur ?'));" class="btn btn-danger">Supprimer</a>
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
                    '<option value="1">1</option>'+ // Affichage de 1 utilisateur
                    '<option value="5">5</option>'+ // Affichage de 5 utilisateurs, etc...
                    '<option value="10">10</option>'+
                    '<option value="25">25</option>'+
                    '<option value="50">50</option>'+
                    '<option value="-1">100</option>'+ // Affichage de tous les utilisateurs
                    '</select>',
                emptyTable: "Aucune donnée disponible dans le tableau",
                info: "Affichage de _START_ à _END_ utilisateurs sur _TOTAL_ utilisateurs",
                infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
                infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
                infoThousands: ",",
                loadingRecords: "Chargement...",
                processing: "Traitement...",
                search: "",
                searchPlaceholder: "Rechercher...",
                zeroRecords: "Aucun utilisateur trouvé",
                paginate: {
                    previous: "Précédent",
                    next: "Suivant"
                }
            }
        });
    });
</script>
