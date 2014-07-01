<?php

session_start();

require_once("config.php");

define("BASEURL",$config['BASEURL']);

// models 

$dbo = new PDO("mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}",$config['DB_USER'],$config['DB_PASS']);

function load_model($modelname){
	include("models/{$modelname}.php");

	return new $modelname();
}

// controllers

$path = explode("/", @$_GET['q']);

$path[0] = $path[0] != ''?$path[0]:"main";

if(!file_exists("controllers/{$path[0]}.php")) $path[0]="error";

include("controllers/{$path[0]}.php");

$controllers = new $path[0]();
$action = $path[1];

if(!@call_user_func(array($controllers, $action)))
	@call_user_func(array($controllers, "index"),$path);
