<?php
require('fpdf185/fpdf.php');

class PDF extends FPDF
{
    // En-tête
    function Header()
    {
        // Logo
        $this->Image( base_url().'assets/img/MAMA.png', 10, 6, 30);
        $this->SetFont('Arial', 'B', 12);
        // Titre
        $this->Cell(80);
        $this->Cell(30, 10, 'FANAMARIHAM-PIANTOHANA', 0, 1, 'C');
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(190, 10, '(Lalana tamin\'ny 02 Aogositra 1999)', 0, 1, 'C');
        $this->Ln(20);
    }

    // Pied de page
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Instanciation de la classe PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Données de la facture
$leftContent = [
    'MPIKAMBANA',
    'FALIHERISON KANTO MIHAJA',
    'Adhesion: LOT TIC 37 ANKADIVORIBE ANTANANARIVO'
];

$rightContent = [
    'Fanekem-piantohana: 01840/PSP/24',
    'Police d\'Assurance',
    'Nomena tamin\'ny: 03 Fevrier 2024',
    'Deliver le:',
    'Police d\'assurance: .......................',
    'Voiture: ...................................',
    'Valide le: ................................... jusqu\'à ...................................',
    'Cotisation: .................................'
];

$footerContent = [
    'Manankery ny: 03 Fevrier 2024 - 11:09:00',
    '  Valable du: 03 Fevrier 2024',
    'Ka hatramin\'ny: 03 Fevrier 2025 - misakalina'
];

// Affichage des données
foreach ($leftContent as $line) {
    $pdf->Cell(0, 10, $line, 0, 1);
}

$pdf->Ln(10); // Espace entre les sections

foreach ($rightContent as $line) {
    $pdf->Cell(0, 10, $line, 0, 1);
}

$pdf->Ln(10); // Espace entre les sections

foreach ($footerContent as $line) {
    $pdf->Cell(0, 10, $line, 0, 1);
}

$pdf->Ln(10); // Espace entre les sections

// Informations sur la voiture
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Informations sur la voiture', 0, 1);
$pdf->SetFont('Arial', '', 12);

$carInfoHeader = ['Karazany / Marque', 'Nomerao fiara / Immatriculation', 'Heriny / Puissance', 'Toerana / Place'];
$carInfoData = ['BMW E30', '2418 TAA', '120 CV', 'SIX'];

// En-tête du tableau
foreach ($carInfoHeader as $header) {
    $pdf->Cell(48, 10, $header, 1);
}
$pdf->Ln();

// Données du tableau
foreach ($carInfoData as $data) {
    $pdf->Cell(48, 10, $data, 1);
}
$pdf->Ln();

$pdf->Output();
?>
