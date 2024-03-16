<?php

if (isset($_POST['card_id'])){
    $card_id = $_POST['card_id'];
    $user_id = $_POST['user_id'];
    $transaction_id = $_POST['transaction_id'];
    $price = $_POST['price'];
} else {
    header('Location: signup.php');
}

echo $price;

session_start();
if ($_SESSION['id']!=$user_id){
    header('Location: home.php');
}

// Get the current date in the UTC+2 timezone
date_default_timezone_set('Europe/Paris');
$date = new DateTime('now', new DateTimeZone('Europe/Paris'));
// Format the date to match the MySQL date format
$date = $date->format('Y-m-d');

include("db_host.php"); 

$db_username = 'u815982209_Pate';
$db_password = 'Rekkles2502*';
$db_name = 'u815982209_mydreamwallet';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql ="UPDATE exchange_card SET nb = nb -1  WHERE id_owner = ".$user_id." AND id_card = ".$card_id." AND statue = 'buy'";
$result = mysqli_query($conn, $sql);
$sql2 = "INSERT INTO exchange_card (id_owner, id_card, nb, statue, price) VALUES ($user_id, $card_id, 1, 'sell', $price)";
$result = mysqli_query($conn, $sql2);
$sql3 = "INSERT INTO card_history (id_card, action_transaction, auteur, cost, date_action) VALUES ($card_id, 'sell', $user_id, $price, '".$date."')";
$result = mysqli_query($conn, $sql3);

mysqli_close($conn);

header('Location: collection.php');

?>