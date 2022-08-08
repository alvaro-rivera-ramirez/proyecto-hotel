<?php

require_once __DIR__ . 'reporte_cliente.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello World!<\h1>');
$mpdf->Output();
?>