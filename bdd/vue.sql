CREATE OR REPLACE VIEW info_vehicule AS
SELECt v.*, a.nom nom_assurance, f.date_fin, t.nom nom_type from vehicule v JOIN assureur a on v.id_assureur = a.id
left join facture f on f.id_assureur = a.id left join type_vehicule t on t.id = v.id_type;

CREATE OR REPLACE VIEW detail AS
select i.*, o.nom nom_option, u.nom nom_usage, c.nom nom_carburant 
from info_vehicule i left join options o on i.id_options = o.id 
left join usage u on i.id_utilisation = u.id
left join carburant c on i.id_carburant = c.id;