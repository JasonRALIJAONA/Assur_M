<?php
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Initialiser Dompdf
$dompdf = new Dompdf();

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
            width: 1000px;
            margin: 20px auto;
            border: 2px solid #000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .facture {
            padding: 20px;
        }
        .header, .content, .footer, .car-info {
            margin-bottom: 20px;
        }
        .header, .content {
            display: flex;
            justify-content: space-between;
        }
        .header .left, .header .right, .content .left-content, .content .right-content {
            width: 48%;
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
            background: url(\'ARO.png\') no-repeat left center;
            padding-left: 100px;
            margin-left: 100px;
        }
        .date {
            text-align: right;
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
                    <p><strong>Assurances Reassurances</strong></p>
                    <p><strong>Omnibranches</strong></p>
                </div>
            </div>
            <div class="date">
                <p>03/02/2024</p>
            </div>
            <div class="content">
                <div class="left-content">
                    <p><strong>MPIKAMBANA</strong></p>
                    <p class="italic">FALIHERISON KANTO MIHAJA</p>
                    <p class="italic">Adiresy: LOT TIC 37 ANKADIVORIBE ANTANANARIVO</p>
                </div>
                <div class="right-content">
                    <p class="italic">Fanekem-piantohana: 01840/PSP/24</p>
                    <p>Police d\'Assurance</p>
                    <p class="italic">Nomena tamin\'ny: 03 Fevrier 2024</p>
                    <p>Deliver le:</p>
                    <p>Police d\'assurance:.......................</p>
                    <p>Voiture: ...................................</p>
                    <p>Valide le: ................................... jusqu\'à ...................................</p>
                    <p>Cotisation: .................................</p>
                </div>
            </div>
            <div class="footer">
                <p class="italic">Manankery ny: 03 Fevrier 2024 - 11:09:00</p>
                <p class="italic">Valable du: 03 Fevrier 2024</p>
                <p class="italic">Ka hatramin\'ny: 03 Fevrier 2025 - misakalina</p>
            </div>
            <div class="car-info">
                <table>
                    <tr>
                        <th>Karazany / Marque</th>
                        <th>Nomerao fiara / Immatriculation</th>
                        <th>Heriny / Puissance</th>
                        <th>Toerana / Place</th>
                    </tr>
                    <tr>
                        <td>BMW E30</td>
                        <td>2418 TAA</td>
                        <td>120 CV</td>
                        <td class="italic">SIX</td>
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
$dompdf->setPaper('A3', 'portrait');

// Render le HTML en PDF
$dompdf->render();

// Télécharger le PDF
$dompdf->stream("facture.pdf", array("Attachment" => 1));
?>
