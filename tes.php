<?php
/* Example print-outs using the older bit image print command */
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\RawbtPrintConnector;

$connector = new RawbtPrintConnector("php://stdout");
$printer = new Printer($connector);

try {
    $tux = EscposImage::load("/Users/winnerawan/Desktop/logo.png", false);

    // $printer -> text("These example images are printed with the older\nbit image print command. You should only use\n\$p -> bitImage() if \$p -> graphics() does not\nwork on your printer.\n\n");
    
    $printer -> bitImageColumnFormat($tux, Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT);
    // $printer -> text("Regular Tux (bit image).\n");
    $printer -> feed();

    print_r($tux->toColumnFormat());
    
} catch (Exception $e) {
    /* Images not supported on your PHP, or image file not found */
    $printer -> text($e -> getMessage() . "\n");
}

$printer -> cut();
$printer -> close();
