<?php
    //Importation des dépendances...
    require_once("Repository.class.php");
    require_once("PatientDTO.class.php");
    require_once("CliniqueRepository.class.php");
    
    //Classe pour le repository des patients...
    class PatientRepository extends Repository
    {
        //Instance unique de la classe.
        private static $_instance;
        
        //Constructeur privée de la classe.
        private function __construct () {}
        
        //Méthode permettant d'obtenir l'instance unique de la classe.
        public static function getInstance () 
        {
            if (!(self::$_instance instanceof self))
                self::$_instance = new self();

            return self::$_instance;
        }
        
        //Méthode permettant d'obtenir la liste des patients d'une clinique...
        public function obtenirListePatient($nomClinique)
        {
            $listePatient = array();
            try
            {
                $cliniqueId = CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
                $ins = $pdo->prepare("SELECT * FROM patients WHERE id_clinique = ?");
                $ins->setFetchMode(PDO::FETCH_ASSOC);
                $ins->execute(array($cliniqueId));
                $tab = $ins->fetchAll();
                
                for($i=0;$i<count($tab);$i++)
                {
                  array_push($listePatient, new PatientDTO($tab[$i]["noDossier"], $tab[$i]["noAssuranceMaladie"], $tab[$i]["nom"], $tab[$i]["prenom"], $tab[$i]["adresse"], $tab[$i]["ville"], $tab[$i]["province"], $tab[$i]["codePostal"], $tab[$i]["telephone"], $tab[$i]["courriel"]));
                }
            }	
            catch(Exception $e){}

            return $listePatient;
        }

        //Méthode permettant d'obtenir un patient par son dossier...
        public function obtenirPatient($nomClinique, $noDossier)
        {
            $patient = null;
            try
            {
                $cliniqueId = CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
                $ins = $pdo->prepare("SELECT * FROM patients WHERE id_clinique = ? AND noDossier = ?");
                $ins->setFetchMode(PDO::FETCH_ASSOC);
                $ins->execute(array($cliniqueId, $noDossier));
                $resultat = $ins->fetch();
                if ($resultat) {
                    $patient = new PatientDTO($resultat["noDossier"], $resultat["noAssuranceMaladie"], $resultat["nom"], $resultat["prenom"], $resultat["adresse"], $resultat["ville"], $resultat["province"], $resultat["codePostal"], $resultat["telephone"], $resultat["courriel"]);
                }
            }	
            catch(Exception $e){}

            return $patient;
        }

        //Méthode permettant d'ajouter un patient...
        public function ajouterPatient($nomClinique, $patientDTO)
        {
            try
            {
                $cliniqueId = CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
                $ins = $pdo->prepare("INSERT INTO patients (noDossier, noAssuranceMaladie, nom, prenom, adresse, ville, province, codePostal, telephone, courriel, id_clinique) " . 
                                     "VALUES(?,?,?,?,?,?,?,?,?,?,?)");
                $ins->execute(array($patientDTO->getNoDossier(), $patientDTO->getNoAssuranceMaladie(), $patientDTO->getNom(), $patientDTO->getPrenom(), $patientDTO->getAdresse(), $patientDTO->getVille(), $patientDTO->getProvince(), $patientDTO->getCodePostal(), $patientDTO->getTelephone(), $patientDTO->getCourriel(), $cliniqueId));
            }	
            catch(Exception $e){}
        }
        
        //Méthode permettant de modifier un patient...
        public function modifierPatient($nomClinique, $patientDTO)
        {
            try
            {
                $cliniqueId = CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
                $ins = $pdo->prepare("UPDATE patients " . 
                                        "SET noAssuranceMaladie=?, nom=?, prenom=?, adresse=?, ville=?, province=?, codePostal=?, telephone=?, courriel=? " . 
                                      "WHERE noDossier=? AND id_clinique=?");
                $ins->execute(array($patientDTO->getNoAssuranceMaladie(), $patientDTO->getNom(), $patientDTO->getPrenom(), $patientDTO->getAdresse(), $patientDTO->getVille(), $patientDTO->getProvince(), $patientDTO->getCodePostal(), $patientDTO->getTelephone(), $patientDTO->getCourriel(), $patientDTO->getNoDossier(), $cliniqueId));
            }	
            catch(Exception $e){}
        }
        
        //Méthode permettant de supprimer un patient...
        public function supprimerPatient($nomClinique, $noDossier)
        {
            try
            {
                $cliniqueId = CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
                $ins = $pdo->prepare("DELETE FROM patients WHERE noDossier=? AND id_clinique=?");
                $ins->execute(array($noDossier, $cliniqueId));
            }	
            catch(Exception $e){}
        }

        //Méthode permettant d'obtenir le id d'un patient...
        public function obtenirIdPatient($nomClinique, $noDossier)
        {
            try {
                $cliniqueId = CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
                $ins = $pdo->prepare("SELECT id FROM patients WHERE noDossier=? AND id_clinique=?");
                $ins->setFetchMode(PDO::FETCH_ASSOC);
                $ins->execute(array($noDossier, $cliniqueId));
                $resultat = $ins->fetch();
                return $resultat ? $resultat["id"] : null;
            } catch(Exception $e) {
                return null;
            }
        }
    }
?>
