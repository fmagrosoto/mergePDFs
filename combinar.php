<?php

/**
 * COMBINAR VARIOS ARCHIVOS PDF Y FORZAR SU DECSARGA
 * @author Fernando Magrosoto
 * @copyright (c) 2019, Fernando Magrosoto
 * @see https://parzibyte.me/blog/2019/02/04/unir-combinar-archivos-pdf-php-libmergepdf/
 */

// Llamamos a la librería a través del método tradicional de COMPOSER
require_once "vendor/autoload.php";
use iio\libmergepdf\Merger;

// Pasamos la lista de todos los documentos a un arreglo.
$documentos = ["docs/documento01.pdf", "docs/documento02.pdf", "docs/documento03.pdf"];

// Iniciamos el objeto
$combinador = new Merger;

// Recorremos el arreglo y por cada iteración lo añadimos al objeto recién creado.
foreach ($documentos as $documento) {
    $combinador->addFile($documento);
}

// Creamos la salida, es decir, los documentos combinados.
$salida = $combinador->merge();

// Le agregamos un nombre al archivo de salida,
$nombreArchivo = "combinado.pdf";

// Preparar la descarga del archivo
header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename=$nombreArchivo");
echo $salida;

// Salimos de la ejecucición de la página
exit;