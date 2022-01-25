<?php

$sFileSource = file_get_contents("index.html");

$sPrintCss = "https://glloq8.github.io/cv-leanne/assets/css/pdf.css";
require_once __DIR__ . '/vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

// instantiate and use the dompdf class
$dompdf = new Dompdf($options);
$dompdf->setBasePath($sPrintCss);
$dompdf->loadHtml( $sFileSource );

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("cv-leanne-ratel.pdf");
?>