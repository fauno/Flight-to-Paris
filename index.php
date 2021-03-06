<?php /*

          .___.    .   ,    ,      .__           
          [__ |* _ |_ -+-  -+- _   [__) _.._.* __
          |   ||(_][ ) |    | (_)  |   (_][  |_) 
                ._|                              

          Flight - Mike Cao // http://flightphp.com MIT
    Paris&Idiorm - Jamie Matthews // http://j4mie.github.com/idiormandparis BSD
	PHP Markdown - Michel Fortin // http://github.com/wolfie/php-markdown 
 Flight to Paris - Aza // http://esfriki.com GPLv3

*/
include 'config.php';

require APP_PATH.'/model/auth.php';
$auth = new auth;

Flight::route('GET /(search/?)?',array('controller_node','search'));

Flight::route('POST /?$',array('controller_node','create'));

Flight::route('GET /score/?',array('controller_score','get'));
Flight::route('POST /score/?',array('controller_score','post'));
Flight::route('POST /promote/?',array('controller_score','promote'));


Flight::route('GET /u/new/?$',array('controller_user','new_user'));
Flight::route('POST /u/new/?$',array('controller_user','create'));

//Flight::route('GET /u/follow/@url$',array('controller_user','follow'));
Flight::route('GET /u/@username/?$',array('controller_user','get'));
Flight::route('GET /u/@username/pubkey/?$',array('controller_user','pubkey'));

Flight::route('POST /auth/login/?$',array('controller_auth','login'));
Flight::route('GET /auth/logout/?$',array('controller_auth','logout'));
Flight::route('GET /auth/changepassword/?$',array('controller_auth','change'));
Flight::route('POST /auth/changepassword/?$',array('controller_auth','dochange'));
Flight::route('GET /auth/pubkey/?.*$',array('controller_auth','pubkey'));
Flight::route('POST /auth/addkey/?$',array('controller_auth','addkey'));

Flight::route('GET /@id:[a-z0-9_-]+'.
			'(\.('. implode('|',$allowed_formats) .'))?'.
			'/?$',array('controller_node','get'));

Flight::start();
