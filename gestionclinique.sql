-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestionclinique;
USE gestionclinique;

-- Table des cliniques
CREATE TABLE IF NOT EXISTS cliniques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL UNIQUE,
    adresse VARCHAR(255),
    ville VARCHAR(255),
    province VARCHAR(255),
    codePostal VARCHAR(255),
    telephone VARCHAR(20),
    courriel VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des patients
CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    noDossier INT NOT NULL,
    noAssuranceMaladie INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    adresse VARCHAR(255),
    ville VARCHAR(255),
    province VARCHAR(255),
    codePostal VARCHAR(255),
    telephone VARCHAR(20),
    courriel VARCHAR(255),
    id_clinique INT NOT NULL,
    UNIQUE KEY (noDossier, id_clinique),
    FOREIGN KEY (id_clinique) REFERENCES cliniques(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertion de données de test
INSERT IGNORE INTO cliniques (nom, adresse, ville, province, codePostal, telephone, courriel) VALUES 
('Clinique Santé Magog', '123 Rue Principale', 'Magog', 'Québec', 'J1X 2A4', '819-555-0123', 'info@cliniquesantemagog.ca'),
('Hôpital Général', '456 Boul. Université', 'Sherbrooke', 'Québec', 'J1K 2R1', '819-555-0456', 'hopital.general@sherbrooke.ca');

INSERT IGNORE INTO patients (noDossier, noAssuranceMaladie, nom, prenom, adresse, ville, province, codePostal, telephone, courriel, id_clinique) VALUES
(101, 123456789, 'Tremblay', 'Jean', '10 Rue de la Paix', 'Magog', 'Québec', 'J1X 1A1', '819-555-1111', 'jean.tremblay@email.com', 1),
(102, 987654321, 'Lavoie', 'Marie', '20 Rue du Nord', 'Magog', 'Québec', 'J1X 2B2', '819-555-2222', 'marie.lavoie@email.com', 1);
