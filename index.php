<?php
use App\Models\Journal;
session_start();
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'routes/web.php';

if($_SESSION){
   $data['nom'] = $_SESSION['name']; 
}else{
    $data['nom'] = 'visiteur'; 
}
$data['ip'] = $_SERVER['REMOTE_ADDR'];
$data['url'] = $_SERVER['REQUEST_URI'];
$timestamp = $_SERVER['REQUEST_TIME'];
$data['date'] = date("Y-m-d H:i:s", $timestamp);
$journal = new Journal;
$journal->insert($data);

?>