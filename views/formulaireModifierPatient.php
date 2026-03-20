<h3>Modification de : <?php echo $patient->getNom() . " " . $patient->getPrenom(); ?></h3>
<br />
<a href="patientController.php?action=afficherListePatient&nomClinique=<?php echo $_GET["nomClinique"]; ?>">Annuler</a>
<br />
<br />
<form method="POST" action="patientController.php?action=modifierPatient&nomClinique=<?php echo $_GET["nomClinique"]; ?>">
    <table>
        <tr>
            <td>
                <label>No Dossier</label>
            </td>
            <td>
                <?php echo $patient->getNoDossier(); ?>
                <input type="hidden" name="noDossier" value="<?php echo $patient->getNoDossier(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>No Assurance Maladie</label>
            </td>
            <td>
                <input name="noAssuranceMaladie" value="<?php echo $patient->getNoAssuranceMaladie(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Nom</label>
            </td>
            <td>
                <input name="nom" value="<?php echo $patient->getNom(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Prénom</label>
            </td>
            <td>
                <input name="prenom" value="<?php echo $patient->getPrenom(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Adresse</label>
            </td>
            <td>
                <input name="adresse" value="<?php echo $patient->getAdresse(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Ville</label>
            </td>
            <td>
                <input name="ville" value="<?php echo $patient->getVille(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Province</label>
            </td>
            <td>
                <input name="province" value="<?php echo $patient->getProvince(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Code Postal</label>
            </td>
            <td>
                <input name="codePostal" value="<?php echo $patient->getCodePostal(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Téléphone</label>
            </td>
            <td>
                <input name="telephone" value="<?php echo $patient->getTelephone(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Courriel</label>
            </td>
            <td>
                <input name="courriel" value="<?php echo $patient->getCourriel(); ?>" required/>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
            <input type="submit" value="Modifier" style="width:100px"/>
            </td>
        </tr>
    </table>
</form>
