CREATE OR REPLACE VIEW info_vehicule AS
SELECt v.*, a.nom nom_assurance, f.date_fin, t.nom nom_type from vehicule v JOIN assureur a on v.id_assureur = a.id
left join facture f on f.id_assureur = a.id left join type_vehicule t on t.id = v.id_type;