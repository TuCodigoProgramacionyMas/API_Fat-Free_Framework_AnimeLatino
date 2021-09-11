<?php
header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS,PUT,DELETE");
header("Aloow: GET, POST, OPTIONS,PUT,DELETE");
$method= $_SERVER['REQUEST_METHOD'];



// Kickstart the framework
$f3=require('lib/base.php');

$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<8.0)
	trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('config.ini');
$f3->config('routes.ini');

$f3->set('DB', new DB\SQL('mysql:host='.$f3->get('database.host').';port=3306;dbname='.$f3->get('database.dbname'),$f3->get('database.user'), $f3->get('database.pass')),$options = array(
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // generic attribute
    \PDO::ATTR_PERSISTENT => TRUE,  // we want to use persistent connections
    \PDO::MYSQL_ATTR_COMPRESS => TRUE, // MySQL-specific attribute
));
/*
$users = $f3->get('DB')->exec('SELECT * FROM anime');

 $f3->route('GET /prueba-1', function($f3){
	

	echo "<pre>";
	print_r("Hola");
	echo "</pre>";
});

$f3->route('POST /crear-anime', 'Anime_Ctrl->crear');
$f3->route('POST /listado-anime', 'Anime_Ctrl->listado');
$f3->route('GET /consultar-anime/@parametro', 'Anime_Ctrl->consultar');
$f3->route('GET /consultarlimitada-anime', 'Anime_Ctrl->consultarLimitada');
$f3->route('GET /Busqueda-anime/@parametro', 'Anime_Ctrl->busqueda');
*/

$f3->route('GET /',
	function($f3) {
		$classes=array(
			'Base'=>
				array(
					'hash',
					'json',
					'session',
					'mbstring'
				),
			'Cache'=>
				array(
					'apc',
					'apcu',
					'memcache',
					'memcached',
					'redis',
					'wincache',
					'xcache'
				),
			'DB\SQL'=>
				array(
					'pdo',
					'pdo_dblib',
					'pdo_mssql',
					'pdo_mysql',
					'pdo_odbc',
					'pdo_pgsql',
					'pdo_sqlite',
					'pdo_sqlsrv'
				),
			'DB\Jig'=>
				array('json'),
			'DB\Mongo'=>
				array(
					'json',
					'mongo'
				),
			'Auth'=>
				array('ldap','pdo'),
			'Bcrypt'=>
				array(
					'openssl'
				),
			'Image'=>
				array('gd'),
			'Lexicon'=>
				array('iconv'),
			'SMTP'=>
				array('openssl'),
			'Web'=>
				array('curl','openssl','simplexml'),
			'Web\Geo'=>
				array('geoip','json'),
			'Web\OpenID'=>
				array('json','simplexml'),
			'Web\OAuth2'=>
				array('json'),
			'Web\Pingback'=>
				array('dom','xmlrpc'),
			'CLI\WS'=>
				array('pcntl')
		);
		$f3->set('classes',$classes);
		$f3->set('content','welcome.htm');
		echo View::instance()->render('layout.htm');
	}
);

$f3->route('GET /userref',
	function($f3) {
		$f3->set('content','userref.htm');
		echo View::instance()->render('layout.htm');
	}
);

$f3->run();
