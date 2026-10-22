<?php
/**
 * TODOS ESTOS AJUSTES DEBEN HACERSE DENTRO DE ESTA CARPETA FRONT, ASI SEAN DE:
 * CSS
 * JS : header("Content-Type: application/javascript; charset=UTF-8");
 * PNG : header("Content-Type: image/jpeg");
 * SVG : header("Content-Type: image/svg+xml");
 * O cualquier archivo estático.
 * 
 * 
 * Con este codigo lo que estoy logrando es que php busque y confirme que existe el archivo .css para
 * aplicar los estilos al plugin. Ya que si en setup dirijo directamente el archivo css,js,etc.
 * No podrá leerlo de manera correcta y no se aplicarán los cambios.
 */
header("Content-Type: text/css; charset=UTF-8");

$archivo_css = dirname(__DIR__) . '/css/styles-logocamy.css';
if(file_exists($archivo_css)){
   readfile($archivo_css);
}

/**
* __DIR__: Es el lugar exacto donde estás parado ahora mismo (la carpeta front).

dirname(__DIR__): Es como dar un paso hacia atrás para salir a la carpeta principal de tu plugin (logocamy).

'/css/styles-logocamy.css': Ya estando en la carpeta principal, 
le dices "entra a la carpeta css y busca el archivo styles-logocamy.css".
 */

