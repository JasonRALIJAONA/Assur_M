CREATE OR REPLACE VIEW info_vehicule AS
SELECT v.*, f.date_debut, f.date_fin, a.nom nom_assurance, t.nom nom_type FROM vehicule v LEFT JOIN facture f on v.id = f.id_vehicule 
LEFT JOIN assureur a ON a.id = f.id_assureur LEFT JOIN type_vehicule t on t.id = v.id_type;
