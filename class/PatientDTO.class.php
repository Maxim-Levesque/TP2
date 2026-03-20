<?php

    class PatientDTO
    {
        private $noDossier;
        private $noAssuranceMaladie;
        private $nom;
        private $prenom;
        private $adresse;
        private $ville;
        private $province;
        private $codePostal;
        private $telephone;
        private $courriel;

        public function __construct($noDossier=0, $noAssuranceMaladie=0, $nom="", $prenom="", $adresse="", $ville="", $province="", $codePostal="", $telephone="", $courriel="")
        {
            $this->noDossier = $noDossier;
            $this->noAssuranceMaladie = $noAssuranceMaladie;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->ville = $ville;
            $this->province = $province;
            $this->codePostal = $codePostal;
            $this->telephone = $telephone;
            $this->courriel = $courriel;
        }

        public function __toString()
        {
            return $this->noDossier . " | " . $this->noAssuranceMaladie . " | " . $this->nom . " | " . $this->prenom . " | " . $this->adresse . " | " . $this->ville . " | " . $this->province . " | " . $this->codePostal . " | " . $this->telephone . " | " . $this->courriel;
        }

        public function getNoDossier()
        {
            return $this->noDossier;
        }

        public function getNoAssuranceMaladie()
        {
            return $this->noAssuranceMaladie;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function getPrenom()
        {
            return $this->prenom;
        }

        public function getAdresse()
        {
            return $this->adresse;
        }

        public function getVille()
        {
            return $this->ville;
        }

        public function getProvince()
        {
            return $this->province;
        }

        public function getCodePostal()
        {
            return $this->codePostal;
        }

        public function getTelephone()
        {
            return $this->telephone;
        }

        public function getCourriel()
        {
            return $this->courriel;
        }
    }

?>
