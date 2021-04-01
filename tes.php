<?php
/* Example print-outs using the older bit image print command */
require 'vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

$connector = new FilePrintConnector("php://stdout");
$printer = new Printer($connector);

try {
    $tux = EscposImage::load("image.png", false);
// print_r($tux);
    $printer->barcode('02-201010', Printer::BARCODE_CODE128);
    
    print_r($tux);
    // $printer -> text("Regular Tux (bit image).\n");
    // $printer -> feed();
    
    // $printer -> bitImage($tux, Printer::IMG_DOUBLE_WIDTH);
    // $printer -> text("Wide Tux (bit image).\n");
    // $printer -> feed();
    
    // $printer -> bitImage($tux, Printer::IMG_DOUBLE_HEIGHT);
    // $printer -> text("Tall Tux (bit image).\n");
    // $printer -> feed();
    
    // $printer -> bitImage($tux, Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT);
    // $printer -> text("Large Tux in correct proportion (bit image).\n");

   print_r($printer->bitImage($tux, Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT));
} catch (Exception $e) {
    /* Images not supported on your PHP, or image file not found */
    $printer -> text($e -> getMessage() . "\n");
}

