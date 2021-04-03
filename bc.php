<?php
require 'vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

$connector = new FilePrintConnector("php://stdout");
$printer = new Printer($connector);

/* Height and width */
$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
$printer->text("Height and bar width\n");
$printer->selectPrintMode();
$heights = array(1, 2, 4, 8, 16, 32);
$widths = array(1, 2, 3, 4, 5, 6, 7, 8);
$printer -> text("Default look\n");
$printer->barcode("123456789", Printer::BARCODE_TEXT_NONE);

print_r($printer->barcode("123456789", Printer::BARCODE_TEXT_NONE));
$printer->cut();
$printer->close();
