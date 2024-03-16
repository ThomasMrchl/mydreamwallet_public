<?php

if (isset($_POST['card_id'])){
    $card_id = $_POST['card_id'];
    $user_id = $_POST['user_id'];
    $transaction_id = $_POST['transaction_id'];
} else {
    header('Location: signup.php');
}

// Get the current date in the UTC+2 timezone
date_default_timezone_set('Europe/Paris');
$date = new DateTime('now', new DateTimeZone('Europe/Paris'));
// Format the date to match the MySQL date format
$date = $date->format('Y-m-d');

session_start();
if ($_SESSION['id']!=$user_id){
    header('Location: home.php');
}

include("db_host.php"); 

$db_username =;
$db_password =;
$db_name =;

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');


$sql ="UPDATE exchange_card SET nb = nb +1  WHERE id_owner = ".$user_id." AND id_card = ".$card_id." AND statue = 'buy'";
$result = mysqli_query($conn, $sql);
$sql = "DELETE FROM exchange_card WHERE id = ".$transaction_id."";
$result = mysqli_query($conn, $sql);
$sql = "INSERT INTO card_history (id_card, action_transaction, auteur, cost, date_action) VALUES ($card_id, 'cancel', $user_id, 0, '".$date."')";
$result = mysqli_query($conn, $sql);

mysqli_close($db);

header('Location: collection.php');

?>