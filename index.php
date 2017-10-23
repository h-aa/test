<?php
require_once('config.php');
require_once('models/Main.php');
require_once('controllers/Main.php');
$controllers = new MainController();
$models = new MainModel();
$url_data = explode('/', $_SERVER['REQUEST_URI']);
$action =  $url_data[1] ? $url_data[1] : 'view';
$action_data = isset($url_data[2]) ? $url_data[2] : '';
if(method_exists($controllers, $action))
{
	$controllers->$action($action_data);
} else {
	$controllers->error();
}
?>
