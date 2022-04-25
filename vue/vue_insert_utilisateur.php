<?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2) { if (isset($_GET['iduser']) && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUtilisateur" disabled>
                    + Ajouter un utilisateur
                </button>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUtilisateur">
                    + Ajouter un utilisateur
                </button>
            </div>
        </div>
    </div>
<?php } } ?>


<div class="modal fade" id="addUtilisateur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insertion d'un utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de l'utilisateur</label>
                        <input type="text" name="nomuser" id="nom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom de l'utilisateur</label>
                        <input type="text" name="prenomuser" id="prenom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo de l'utilisateur</label>
                        <input type="text" name="pseudouser" id="pseudo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email de l'utilisateur</label>
                        <input type="email" name="emailuser" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="mdp" class="form-label">Mot de passe de l'utilisateur</label>
                        <input type="password" name="mdpuser" id="mdp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type d'utilisateur</label>
                        <select class="form-select" name="lvl" id="type">
                            <option value="1">Utilisateur</option>
                            <option value="2">Administrateur</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Annuler</button>
                    <button type="submit" name="subaddutilisateur" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
