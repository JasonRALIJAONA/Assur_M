INSERT INTO operateur (nom) VALUES
('Airtel'),
('Orange'),
('Telma');

INSERT INTO assureur (nom, commission, num_telma, num_orange, num_airtel) VALUES
('Assureur A', 5.50, '0341234567', '0321234567', '0331234567'),
('Assureur B', 6.75, '0342345678', '0322345678', '0332345678'),
('Assureur C', 4.80, '0343456789', '0323456789', '0333456789');

INSERT INTO type_vehicule (nom) VALUES
('Voiture'),
('Moto'),
('Camion'),
('Bus'),
('Vélo'),
('Scooter'),
('Tracteur'),
('Fourgonnette'),
('Véhicule utilitaire'),
('Cabriolet');

INSERT INTO options (nom, descri, valeur, id_assureur) VALUES
('Couverture étendue', 'Couverture supplémentaire pour les dommages non pris en charge par l assurance de base.', 150.00, 1),
('Assurance contre le vol', 'Protection contre le vol de véhicule.', 200.00, 2),
('Assistance dépannage', 'Service de dépannage en cas de panne.', 50.00, 1);


INSERT INTO vehicule (immatriculation, puissance, marque, place, id_type, id_utilisateur, id_assureur, id_options) VALUES
('1234TAB', 150.00, 'Toyota', 5, 1, 1, 1, 1),
('4567TUF', 200.00, 'Honda', 2, 2, 1, 2, 2),
('8901TIO', 180.00, 'Ford', 4, 3, 1, 3, 3);

INSERT INTO facture (date_debut, date_fin, police_assurance, id_assureur, id_vehicule)
VALUES
('2024-06-01', '2025-05-31', 'AB1234CD', 1, 4),
('2024-06-15', '2025-06-14', 'EF5678GH', 2, 5),
('2024-07-01', '2025-06-30', 'IJ91011KL', 3, 6);
