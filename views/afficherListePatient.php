<!-- Combobox pour sélectionner la clinique -->
<form method="GET" action="patientController.php">
    <input type="hidden" name="action" value="afficherListePatient">
    <label for="nomClinique">Choisir une clinique :</label>
    <select name="nomClinique" id="nomCliniqueSelect" onchange="this.form.submit()">
        <option value="">-- Sélectionner une clinique --</option>
        <?php foreach ($toutesLesCliniques as $c): ?>
            <option value="<?php echo $c->getNom(); ?>" <?php echo(isset($_GET["nomClinique"]) && $_GET["nomClinique"] == $c->getNom()) ? 'selected' : ''; ?>>
                <?php echo $c->getNom(); ?>
            </option>
        <?php
endforeach; ?>
    </select>
</form>

<?php if (isset($_GET["nomClinique"]) && $_GET["nomClinique"] != ""): ?>
    <h3>Liste des patient(s) (<?php echo count($listePatient); ?> Patient(s))</h3>
    <br />
    <table>
            <tr>
                <th>No Dossier</th>
                <th>No Assurance Maladie</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Province</th>
                <th>Code Postal</th>
                <th>Téléphone</th>
                <th>Courriel</th>
                <th>Actions</th>
            </tr>
            <!--Formulaire pour la modification et la suppression de patients... -->
            <form method="">
                <?php foreach ($listePatient as $patient): ?>
                    <tr>
                        <td><?= $patient->getNoDossier() ?></td>
                        <td><?= $patient->getNoAssuranceMaladie() ?></td>
                        <td><?= $patient->getNom() ?></td>
                        <td><?= $patient->getPrenom() ?></td>
                        <td><?= $patient->getAdresse() ?></td>
                        <td><?= $patient->getVille() ?></td>
                        <td><?= $patient->getProvince() ?></td>
                        <td><?= $patient->getCodePostal() ?></td>
                        <td><?= $patient->getTelephone() ?></td>
                        <td><?= $patient->getCourriel() ?></td>
                        <td>
                            <input value="Modifier" onclick="document.getElementById('noDossier').value ='<?= $patient->getNoDossier() ?>'; document.getElementById('nomCliniqueInput').value ='<?= $_GET["nomClinique"] ?>'; this.form.action='patientController.php'; this.form.method='GET'; document.getElementById('actionInput').value='formulaireModifierPatient'; submit();" type="button">
                            <input value="Supprimer" type="button" onclick="if (confirm('Voulez-vous vraiment supprimer le patient : <?= $patient->getNom() . ' ' . $patient->getPrenom() ?>')) { document.getElementById('noDossier').value = '<?= $patient->getNoDossier() ?>'; document.getElementById('nomCliniqueInput').value ='<?= $_GET["nomClinique"] ?>'; this.form.action ='patientController.php?action=supprimerPatient&nomClinique=<?= $_GET["nomClinique"] ?>'; this.form.method = 'POST'; submit();}">
                        </td>
                    </tr>
                <?php endforeach; ?>
                <input type="hidden" id="actionInput" name="action" value="formulaireModifierPatient">
                <input type="hidden" id="noDossier" name="noDossier">
                <input type="hidden" id="nomCliniqueInput" name="nomClinique">
            </form>
    </table>
    <br>
    <b>Ajouter un patient : </b>
    <br>
    <br />
    <!--Formulaire pour l'ajout de patients... -->
    <form method="POST" action="patientController.php?action=ajouterPatient&nomClinique=<?php echo $_GET["nomClinique"]; ?>">
        <table>
            <tr>
                <td><label>No Dossier</label></td>
                <td><input type="number" name="noDossier" required/></td>
            </tr>
            <tr>
                <td><label>No Assurance Maladie</label></td>
                <td><input type="number" name="noAssuranceMaladie" required/></td>
            </tr>
            <tr>
                <td><label>Nom</label></td>
                <td><input name="nom" required/></td>
            </tr>
            <tr>
                <td><label>Prénom</label></td>
                <td><input name="prenom" required/></td>
            </tr>
            <tr>
                <td><label>Adresse</label></td>
                <td><input name="adresse" required/></td>
            </tr>
            <tr>
                <td><label>Ville</label></td>
                <td><input name="ville" required/></td>
            </tr>
            <tr>
                <td><label>Province</label></td>
                <td><input name="province" required/></td>
            </tr>
            <tr>
                <td><label>Code Postal</label></td>
                <td><input name="codePostal" required/></td>
            </tr>
            <tr>
                <td><label>Téléphone</label></td>
                <td><input name="telephone" required/></td>
            </tr>
            <tr>
                <td><label>Courriel</label></td>
                <td><input name="courriel" required/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ajouter" style="width:100px"/></td>
            </tr>
        </table>
    </form>
<?php
else: ?>
    <p>Veuillez sélectionner une clinique pour voir les patients.</p>
<?php
endif; ?>
