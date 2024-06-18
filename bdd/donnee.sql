INSERT INTO operateur (nom) VALUES
('Airtel'),
('Orange'),
('Telma');

INSERT INTO assureur (nom, commission, num_telma, num_orange, num_airtel) VALUES
('Aro', 5.50, '0341234567', '0321234567', '0331234567'),
('Ny Havana', 6.75, '0342345678', '0322345678', '0332345678'),
('MAMA', 4.80, '0343456789', '0323456789', '0333456789');

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

-- Insérer des options pour l'assureur 'MAMA'
INSERT INTO options (nom, descri, valeur, id_assureur) VALUES
('Assistance voyage', 'Couverture des incidents lors de voyages à l étranger.', 100.00, 3),
('Vandalisme', 'Couverture des dommages causés par des actes de vandalisme.', 80.00, 3),
('Protection du conducteur', 'Couverture des blessures du conducteur en cas d accident.', 70.00, 3);


