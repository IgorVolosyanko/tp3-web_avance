DROP DATABASE bibliotheque_montreal;
CREATE DATABASE bibliotheque_montreal;

CREATE TABLE auteur (
id INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(45) NOT NULL,
CONSTRAINT pk_auteur PRIMARY KEY (id)
);

CREATE TABLE categorie (
id INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(45) NOT NULL,
CONSTRAINT pk_categorie PRIMARY KEY (id)
);

CREATE TABLE editeur (
id INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(45) NOT NULL,
CONSTRAINT pk_editeur PRIMARY KEY (id)
);

CREATE TABLE privilege (
id INT AUTO_INCREMENT PRIMARY KEY,
privilege VARCHAR(50) NOT NULL
);

CREATE TABLE utilisateur (
id INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(45) NOT NULL,
nom_utilisateur VARCHAR(45) NOT NULL,
password VARCHAR(255) NOT NULL,
adresse VARCHAR(45) NOT NULL,
telephone VARCHAR(45) NOT NULL,
courriel VARCHAR(45) NOT NULL,
CONSTRAINT pk_user PRIMARY KEY (id),
privilege_id INT NOT NULL,
CONSTRAINT fk_privilege_id FOREIGN KEY (privilege_id) REFERENCES privilege(id),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE livre (
id INT NOT NULL AUTO_INCREMENT,
titre VARCHAR(225) NOT NULL,
description TEXT,
pages VARCHAR(10),
image VARCHAR(225),
auteur_id INT NOT NULL,
editeur_id INT NOT NULL,
categorie_id INT NOT NULL,
CONSTRAINT pk_livre PRIMARY KEY (id),
CONSTRAINT fk_auteur_id FOREIGN KEY (auteur_id)
REFERENCES auteur(id),
CONSTRAINT fk_editeur_id FOREIGN KEY (editeur_id)
REFERENCES editeur(id),
CONSTRAINT fk_categorie_id FOREIGN KEY (categorie_id)
REFERENCES categorie(id)
);

CREATE TABLE pret (
id INT NOT NULL AUTO_INCREMENT,
date_debut DATE NOT NULL,
date_fin DATE NOT NULL,
utilisateur_id INT NOT NULL,
CONSTRAINT pk_pret PRIMARY KEY (id),
CONSTRAINT fk_utilisateur_id FOREIGN KEY (utilisateur_id)
REFERENCES utilisateur(id)
);

ALTER TABLE pret AUTO_INCREMENT = 100;

CREATE TABLE pret_has_livre(
livre_id INT NOT NULL,
pret_id INT NOT NULL,
CONSTRAINT pk_livre_facture PRIMARY KEY (livre_id, pret_id),
CONSTRAINT fk_livre_id FOREIGN KEY (livre_id)
REFERENCES livre(id),
CONSTRAINT fk_pret_id FOREIGN KEY (pret_id)
REFERENCES pret(id)
);

INSERT INTO privilege (privilege) VALUES('Admin');
INSERT INTO privilege (privilege) VALUES ('Client');

CREATE TABLE log (
id INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(45) NOT NULL,
ip VARCHAR(45) NOT NULL,
url VARCHAR(75) NOT NULL,
date TIMESTAMP NOT NULL, 
CONSTRAINT pk_log PRIMARY KEY (id)
);

