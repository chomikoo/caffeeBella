<?php
$functions_path = get_template_directory() . '/functions/';



require_once ( $functions_path . 'functions-security.php' );
require_once ( $functions_path . 'functions-admin.php' );
require_once ( $functions_path . 'functions-customizer.php' );
require_once ( $functions_path . 'functions-base.php' );
require_once ( $functions_path . 'functions-menus.php' );
require_once ( $functions_path . 'functions-widgets.php' );
require_once ( $functions_path . 'functions-cpt.php' );
require_once ( $functions_path . 'functions-shortcodes.php' );
require_once ( $functions_path . 'functions-assets.php' );
require_once ( $functions_path . 'functions-mylib.php' );


if (isset($_GET['frm'])) {
    setcookie('frm',$_GET['frm'], time() + 86400, '/');
}

?>