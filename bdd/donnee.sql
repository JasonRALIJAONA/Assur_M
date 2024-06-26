INSERT INTO operateur (nom) VALUES
('Airtel'),
('Orange'),
('Telma');

INSERT INTO assureur (nom, commission, num_telma, num_orange, num_airtel) VALUES
('MAMA', 4.80, '0343456789', '0323456789', '0333456789'),
('Aro', 5.50, '0341234567', '0321234567', '0331234567'),
('Ny Havana', 6.75, '0342345678', '0322345678', '0332345678');

INSERT INTO type_vehicule (nom) VALUES
('Voiture'),
('Moto'),
('Camion'),
('Autre');


-- Insérer des options pour l'assureur 'Aro'
INSERT INTO options (nom, descri, valeur, id_assureur) VALUES
('Assistance 24/7', 'Assistance routière 24 heures sur 24 et 7 jours sur 7 en cas de panne.', 50.00, 1),
('Protection juridique', 'Couverture des frais juridiques en cas de litige suite à un accident.', 75.00, 1),
('Bris de glace', 'Couverture des dommages causés aux vitres et pare-brise du véhicule.', 30.00, 1);

-- Insérer des options pour l'assureur 'Ny Havana'
INSERT INTO options (nom, descri, valeur, id_assureur) VALUES
('Vol et incendie', 'Couverture contre le vol et les dommages causés par un incendie.', 120.00, 2),
('Dommages collision', 'Couverture des dommages au véhicule en cas de collision.', 180.00, 2),
('Assistance médicale', 'Couverture des frais médicaux pour les passagers en cas d accident.', 90.00, 2);

-- Insérer des options pour l'assureur 'MAMA'
INSERT INTO options (nom, descri, valeur, id_assureur) VALUES
('Assistance voyage', 'Couverture des incidents lors de voyages à l étranger.', 100.00, 3),
('Vandalisme', 'Couverture des dommages causés par des actes de vandalisme.', 80.00, 3),
('Protection du conducteur', 'Couverture des blessures du conducteur en cas d accident.', 70.00, 3);

INSERT INTO annee_fabrication (debut, fin, prix, id_assureur) VALUES
    (1900, 1910, 100.00, 1),
    (1911, 1920, 110.00, 1),
    (1921, 1930, 120.00, 1),
    (1931, 1940, 130.00, 1),
    (1941, 1950, 140.00, 1),
    (1951, 1960, 150.00, 1),
    (1961, 1970, 160.00, 1),
    (1971, 1980, 170.00, 1),
    (1981, 1990, 180.00, 1),
    (1991, 2000, 190.00, 1),
    (2001, 2010, 200.00, 1),
    (2011, 2020, 210.00, 1),
    (2021, 2024, 220.00, 1),

    (1900, 1910, 100.00, 2),
    (1911, 1920, 110.00, 2),
    (1921, 1930, 120.00, 2),
    (1931, 1940, 130.00, 2),
    (1941, 1950, 140.00, 2),
    (1951, 1960, 150.00, 2),
    (1961, 1970, 160.00, 2),
    (1971, 1980, 170.00, 2),
    (1981, 1990, 180.00, 2),
    (1991, 2000, 190.00, 2),
    (2001, 2010, 200.00, 2),
    (2011, 2020, 210.00, 2),
    (2021, 2024, 220.00, 2),

    (1900, 1910, 100.00, 3),
    (1911, 1920, 110.00, 3),
    (1921, 1930, 120.00, 3),
    (1931, 1940, 130.00, 3),
    (1941, 1950, 140.00, 3),
    (1951, 1960, 150.00, 3),
    (1961, 1970, 160.00, 3),
    (1971, 1980, 170.00, 3),
    (1981, 1990, 180.00, 3),
    (1991, 2000, 190.00, 3),
    (2001, 2010, 200.00, 3),
    (2011, 2020, 210.00, 3),
    (2021, 2024, 220.00, 3);

INSERT INTO carburant (nom, prix, id_assureur) VALUES 
('Essence', 4200.50, 1),
('Diesel', 3800.75, 1),
('GPL', 3000.00, 1),
('Essence', 4000.50, 2),
('Diesel', 4000.75, 2),
('GPL', 29000.00, 2),
('Essence', 4100.50, 3),
('Diesel', 3600.75, 3),
('GPL', 4000.00, 3);


-- Insérer des données dans la table usage pour l'assureur Aro
INSERT INTO usage (nom, valeur, id_assureur) VALUES 
('Transport de personnes', 100.00, 1),
('Transport de marchandises', 150.00, 1),
('Usage agricole', 200.00, 1);

-- Insérer des données dans la table usage pour l'assureur Ny Havana
INSERT INTO usage (nom, valeur, id_assureur) VALUES 
('Transport scolaire', 110.00, 2),
('Transport de matériaux', 160.00, 2),
('Véhicule utilitaire', 210.00, 2);

-- Insérer des données dans la table usage pour l'assureur MAMA
INSERT INTO usage (nom, valeur, id_assureur) VALUES 
('Transport public', 120.00, 3),
('Transport de produits frais', 170.00, 3),
('Usage personnel', 220.00, 3);


INSERT INTO puissance (prix_chevaux, id_assureur) VALUES
(94, 1),
(87, 2),
(99, 3);

INSERT INTO liste_vehicule (immatriculation, puissance, place, marque, carburant, email_utilisateur) VALUES
('2021ABC', 100, 5, 'Toyota', 'Essence', 1),      
('2022DEF', 150, 5, 'Honda', 'Diesel', 2),
('2023GHI', 120, 4, 'Ford', 'Essence', 3),
('2024JKL', 130, 4, 'BMW', 'GPL', 4),
('2025MNO', 110, 5, 'Audi', 'Essence', 5),
('2026PQR', 140, 4, 'Chevrolet', 'Diesel', 6),
('2027STU', 125, 5, 'Kia', 'Essence', 7),
('2028VWX', 135, 5, 'Hyundai', 'GPL', 8),
('2029YZA', 115, 4, 'Nissan', 'Diesel', 9),
('2030BCD', 150, 5, 'Mazda', 'Essence', 10),
('2031EFG', 110, 4, 'Subaru', 'GPL', 11),
('2032HIJ', 130, 5, 'Volkswagen', 'Diesel', 12),
('2033KLM', 145, 4, 'Mercedes', 'Essence', 13),
('2034NOP', 125, 5, 'Porsche', 'GPL', 14),
('2035QRS', 135, 4, 'Lexus', 'Diesel', 15),
('2036TUV', 140, 5, 'Jaguar', 'Essence', 16),
('2037WXY', 120, 4, 'Ferrari', 'Diesel', 17),
('2038ZAB', 150, 5, 'Lamborghini', 'Essence', 18),
('2039CDE', 115, 4, 'Bugatti', 'GPL', 19),
('2040FGH', 145, 5, 'Aston Martin', 'Diesel', 20);






