<?php if (!isset($_SESSION)) session_start();
/**
 |-------------------------------------------
 |	CONFIGURACION BASE DE DATOS
 |-------------------------------------------
 */
define('HOST','127.0.0.1');
define('USER','root');
define('PASSWORD','');
define('PORT','3306');
define('DB','proyecto_php');
/**
 |-------------------------------------------
 |	CONFIGURACION IDIOMA
 |-------------------------------------------
 */
define('LANGUAGE','es');
/**
 |-------------------------------------------
 |	Datos de la Aplicación
 |-------------------------------------------
 */
define('TITULO','Proyecto PHP');
 
/**
 |-------------------------------------------
 |	CONFIGURACION DIRECCIONES
 |-------------------------------------------
 */
define('URLBASE', '');
define('URLNOTIFICARVENTA', '#');
/**
 |-------------------------------------------
 |	Estado Mantenimiento
 |-------------------------------------------
 */
 define('MANTENIMIENTO', false);
/**
 |-------------------------------------------
 | ESTABLECER LA ZONA HORARIA PREDETERMINADA
 |-------------------------------------------
 */
define('HORARIO', 'America/Caracas');
define('GOOGLEANALYTICS','');
/**
 |--------------------------------------------
 | CARGA NUCLEO DE LA APLICACION
 |--------------------------------------------
 */
require_once ('Proyecto_PHP.php');