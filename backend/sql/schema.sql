--création dn utilisateur

/CREATE TABLE Utilisateur (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    dat_naissance DATE,
    statut VARCHAR(50),
    domaine_competence VARCHAR(150),
    domaine_interet VARCHAR(150),
    lien_git VARCHAR(150),
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(150)NOT NULL
   
    );
    
 --Création table classe
 
CREATE TABLE Classe(
    id_classe INT AUTO_INCREMENT PRIMARY KEY,
    nom_classe VARCHAR(100)NOT NULL,
    domaine VARCHAR(100)NOT NULL,
    id_administrateur INT NOT NULL,
    code_classe INT UNIQUE NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut_classe VARCHAR(20)NOT NULL DEFAULT 'ouverte' CHECK (statut_classe IN ('ouverte', 'fermé'))
    );

--creation table administrateur
CREATE TABLE administrator(
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    lettre_nomination VARCHAR(255),
    date_nomination DATE NOT NULL,
    statut_verification VARCHAR(50),
    FOREIGN KEY(id_user) REFERENCES utilisateur(id_user)
    );

 --creation table membre   

CREATE TABLE membre(
   id_membre INT AUTO_INCREMENT PRIMARY KEY,
   id_user INT NOT NULL, 
   id_classe INT NOT NULL,
   date_adhesion DATE NOT NULL,
   FOREIGN KEY(id_user) REFERENCES utilisateur(id_user),
   FOREIGN KEY(id_classe) REFERENCES Classe(id_classe)
    );

 --creation table localisation
 

    


    
    
    