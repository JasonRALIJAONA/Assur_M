<?php
require 'dompdf/autoload.inc.php';
define("DOMPDF_ENABLE_REMOTE", false);

use Dompdf\Dompdf;
use Dompdf\Options;

$base = base_url();
//$base = __DIR__; // Utilisez __DIR__ pour obtenir le chemin absolu du répertoire courant
// Initialiser Dompdf
$options = new Options();
$options->set('isRemoteEnabled',true);      
$dompdf = new Dompdf( $options );
$dompdf->getOptions()->setChroot($base);


// Charger le contenu HTML
$html = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            /*width: 1000px;*/
            /*margin: 20px auto;*/
            border: 2px solid #000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .facture {
            /*padding: 20px;*/
        }
        .header, .content, .footer, .car-info {
            margin-bottom: 20px;
        }
        .header, .content {
            display: flex;
            justify-content: space-between;
        }
        .header .left, .header .right, .content .left-content, .content .right-content {
            width: 75%;
        }
        .right-content{
            margin-top:-80px;
            margin-left:600px;
        }
        .header .left p, .header .right p, .content .left-content p, .content .right-content p, .footer p {
            margin: 5px 0;
        }
        .italic {
            font-style: italic;
        }
        .car-info table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .car-info table, .car-info th, .car-info td {
            border: 1px solid #000;
            text-align: center;
            padding: 8px;
        }
        .car-info th {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 20px auto 0;
        }
        button:hover {
            background-color: #45a049;
        }
        .right {
            /*background: url(\''.$base.'/assets/img/'.$assureur.'_pdf.png\') no-repeat left;*/
            display:flex;
            padding-left: 100px;
            margin-left: 600px;
            margin-top:-90px;
            
        }
        
        .date{
            margin-top:20px;
            margin-bottom:10px;
        }
        .left{
            margin-bottom:50px;
            
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="facture">
            <div class="header">
                <div class="left">
                    <p class="italic"><strong>FANAMARIHAM-PIANTOHANA</strong></p>
                    <p><strong>ATTESTATION D\'ASSURANCE</strong></p>
                    <p class="italic">(Lalana tamin\'ny 02 Aogositra 1999)</p>
                </div>
                <div class="right">
                    <img src="'.$base.'/assets/img/'.$assureur.'_pdf.png">
                    <p style="display:inline"><strong>'.$assureur.'</strong></p>
                </div>
            </div>
           
            <div class="content">
                <div class="left-content">
                    <p><strong>MPIKAMBANA</strong></p>
                    <p class="italic">'.$nom_complet.'</p>
                    <p class="italic">Adresse: '.$adresse.'</p>
                </div>
                <div class="right-content">
                    <p>Police d\'Assurance</p>
                    <p>Delivrée le: '. $date_debut .' </p>
                    <p>Police d\'assurance: '. $police_assurance.'</p>
                    <p>Voiture: '. $immatriculation .'</p>
                    
                </div>
            </div>
            <div class="footer">
                <p class="italic" style="margin-top:10px;" >Valable du: '. $date_debut .'</p>
                <p class="italic" > Jusqu\' à: '. $date_fin .' </p>
            </div>
            <div class="car-info">
                <table>
                    <tr>
                        <th>Marque</th>
                        <th>Immatriculation</th>
                        <th>Puissance</th>
                        <th>Nombre de place</th>
                    </tr>
                    <tr>
                        <td>'.$marque.'</td>
                        <td>'.$immatriculation.'</td>
                        <td> '. $puissance.' CV</td>
                        <td class="italic">'.$place.'</td>
                    </tr>
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>';

// Charger le contenu HTML dans Dompdf
$dompdf->loadHtml($html);

// (Optionnel) Configurer la taille et l'orientation de la page
$dompdf->setPaper('A3', 'paysage');

$options = new Options();
$options->setIsRemoteEnabled(true); // Active le chargement d'images depuis Internet

// Render le HTML en PDF
$dompdf->render();

// Télécharger le PDF
$dompdf->stream("facture.pdf", array("Attachment" => false));

// Génération du fichier PDF temporaire
// $pdfFilePath = 'path/to/facture_'. $nomClient. '.pdf';
// file_put_contents($pdfFilePath, $dompdf->output());

// // Lien de téléchargement
// echo '<br><a href="'. $pdfFilePath. '">Télécharger la facture</a>';

?>
