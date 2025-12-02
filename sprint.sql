--CREER DATABASE:
CREATE DATABASE societe;

--CREER LES TABLEAUX COURS ET EQUIPEMENTS
CREATE TABLE cours(
	idCours INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    categorie VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    durée INT NOT NULL CHECK (durée > 0),
  	maxParticipants INT NOT NULL CHECK (maxParticipants > 0)
)

CREATE TABLE equipements (
  idEquipement INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  type VARCHAR(50) NOT NULL,
  quantiteDispo INT NOT NULL CHECK (quantiteDispo >= 0),
  etat VARCHAR(50) NOT NULL CHECK (etat IN ('Bon', 'Moyen', 'A Remplacer'))
)
-- Ajouter des VALUES dans cours 
INSERT INTO cours (nom, categorie, date, heure, durée, maxParticipants) VALUES
('Yoga Relaxing', 'Yoga', '2026-01-03', '09:00', 60, 15),
('Cardio Seance', 'Cardio', '2026-01-03', '11:00', 45, 20),
('Musculation Force', 'Musculation', '2026-01-04', '14:00', 90, 10);


INSERT INTO equipements (nom, type, quantiteDispo,etat) VALUES
('Tapis', 'Tapis de course', 7, 'Bon'),
('Haltères', 'Haltères Musculation', 10, 'Moyen'),
('Musculation Force', 'Ballon Sport',8, 'A Remplacer');



