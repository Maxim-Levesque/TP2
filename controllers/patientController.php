<?php
	//Importation de l'en-tête...
	require_once(__DIR__ . "/../partials/header.php");
	//Importation des dépendances...
	require_once(__DIR__ . "/../class/PatientRepository.class.php");
	require_once(__DIR__ . "/../class/CliniqueRepository.class.php");
?>
<?php
	//Si la variable action ne contient pas de valeur...
	if(!isset($_GET["action"]))
		//On l'initialise à l'action pat défault...
		$_GET["action"] = "afficherListePatient";

	//Selon l'action...
	switch ($_GET["action"]) 
	{
		//On affiche la liste des patients...
		case "afficherListePatient":
			//Récupération de toutes les cliniques pour la combobox...
			$toutesLesCliniques = CliniqueRepository::getInstance()->obtenirListeClinique();
			
			//Si une clinique est sélectionnée, on récupère ses patients...
			$listePatient = array();
			if(isset($_GET["nomClinique"]) && $_GET["nomClinique"] != "")
			{
				$listePatient = PatientRepository::getInstance()->obtenirListePatient($_GET["nomClinique"]);
			}
			
			//Importation de la vue...
			require_once(__DIR__ . "/../views/afficherListePatient.php");
			break;
		//On ajoute le patient...
		case "ajouterPatient":
			//Appel de l'ajout au repository...
			PatientRepository::getInstance()->ajouterPatient($_GET["nomClinique"], new PatientDTO($_POST["noDossier"], $_POST["noAssuranceMaladie"], $_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["ville"], $_POST["province"], $_POST["codePostal"], $_POST["telephone"], $_POST["courriel"]));
			//Redirection vers la page patientController.php pour l'affichage.
			header('Location: patientController.php?action=afficherListePatient&nomClinique=' . $_GET["nomClinique"]);	
			break;
		//On supprime le patient...
		case "supprimerPatient":
			//Appel de la suppression au repository...
			PatientRepository::getInstance()->supprimerPatient($_GET["nomClinique"], $_POST["noDossier"]);
			//Redirection vers la page patientController.php pour l'affichage.
			header('Location: patientController.php?action=afficherListePatient&nomClinique=' . $_GET["nomClinique"]);	
			break;
		//On ouvre le formulaire de modification de patient...
		case "formulaireModifierPatient":
			//Préparation du patient pour la vue.
			$patient = PatientRepository::getInstance()->obtenirPatient($_GET["nomClinique"], $_GET["noDossier"]);
			//Importation de la vue...
			require_once(__DIR__ . "/../views/formulaireModifierPatient.php");
			break;
		//On modifie le patient...
		case "modifierPatient":
			//Appel de la modification au repository...
			PatientRepository::getInstance()->modifierPatient($_GET["nomClinique"], new PatientDTO($_POST["noDossier"], $_POST["noAssuranceMaladie"], $_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["ville"], $_POST["province"], $_POST["codePostal"], $_POST["telephone"], $_POST["courriel"]));
			//Redirection vers la page patientController.php pour l'affichage.
			header('Location: patientController.php?action=afficherListePatient&nomClinique=' . $_GET["nomClinique"]);	
			break;
    }
?>
<?php
	//Importation du pied de page...
	include(__DIR__ . "/../partials/footer.php");
?>
