<?php if ($clinique): ?>
    <b>Modifier une clinique : </b>
    <br><br>
    <form method="POST" action="cliniqueController.php?action=modifierClinique">
        <table>
            <tr>
                <td><label>Nom</label></td>
                <td><input name="nom" value="<?php echo $clinique->getNom(); ?>" readonly /></td>
            </tr>
            <tr>
                <td><label>Adresse</label></td>
                <td><input name="adresse" value="<?php echo $clinique->getAdresse(); ?>" required /></td>
            </tr>
            <tr>
                <td><label>Ville</label></td>
                <td><input name="ville" value="<?php echo $clinique->getVille(); ?>" required /></td>
            </tr>
            <tr>
                <td><label>Province</label></td>
                <td><input name="province" value="<?php echo $clinique->getProvince(); ?>" required /></td>
            </tr>
            <tr>
                <td><label>Code Postal</label></td>
                <td><input name="codePostal" value="<?php echo $clinique->getCodePostal(); ?>" required /></td>
            </tr>
            <tr>
                <td><label>Téléphone</label></td>
                <td><input name="telephone" value="<?php echo $clinique->getTelephone(); ?>" required /></td>
            </tr>
            <tr>
                <td><label>Courriel</label></td>
                <td><input name="courriel" value="<?php echo $clinique->getCourriel(); ?>" required /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Modifier" style="width:100px" /></td>
            </tr>
        </table>
    </form>
<?php else: ?>
    <p>Clinique non trouvée.</p>
    <a href="cliniqueController.php">Retour à la liste</a>
<?php endif; ?>