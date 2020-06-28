<?php
session_start();
define('URL', 'http://localhost/assistCisWeb/adm/');

define('CONTROLER', 'controle-login');
define('METODO', 'login');

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'assistcis');


function __autoload($Class) {
    $dirName = array(
        'controllers',
        'models',
        'models/helper',
        'assets/fpdf',
        'views',
        'config'
    );
    foreach ($dirName as $diretorios) {
        if (file_exists("{$diretorios}/{$Class}.php")):
            require("{$diretorios}/{$Class}.php");
        endif;
    }

}
