<?php

if (isset($_POST['card_id'])){
    $card_id = $_POST['card_id'];
    $user_id = $_POST['user_id'];
    $transaction_id = $_POST['transaction_id'];
    $price = $_POST['price'];
    $owner_id = $_POST['owner_id'];
} else {
    header('Location: signup.php');
}

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

$db_username =;
$db_password =;
$db_name =;

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SESSION['money']>= $price){
    $sql = "SELECT COUNT(*) as count FROM exchange_card WHERE id_owner = ".$user_id." AND id_card = ".$card_id." AND statue = 'buy'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count > 0){
        $sql ="UPDATE exchange_card SET nb = nb +1  WHERE id_owner = ".$user_id." AND id_card = ".$card_id." AND statue = 'buy'";
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE crypto_wallet SET crypto_wallet.money = crypto_wallet.money - $price WHERE id = ".$user_id."";
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE crypto_wallet SET crypto_wallet.money = crypto_wallet.money + $price WHERE id = ".$owner_id."";
        $result = mysqli_query($conn, $sql);
        $sql = "DELETE FROM exchange_card WHERE id = ".$transaction_id."";
        $result = mysqli_query($conn, $sql);
        $_SESSION['money'] -= $price;
    } else {
        $sql = "INSERT INTO exchange_card (id_owner, id_card, nb, statue, price) 
            VALUES ($user_id, $card_id, 1, 'buy', 0)";
        mysqli_query($conn, $sql);
        $sql = "UPDATE crypto_wallet SET crypto_wallet.money = crypto_wallet.money - $price WHERE id = ".$user_id."";
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE crypto_wallet SET crypto_wallet.money = crypto_wallet.money + $price WHERE id = ".$owner_id."";
        $result = mysqli_query($conn, $sql);
        $sql = "DELETE FROM exchange_card WHERE id = ".$transaction_id."";
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE user SET nb_cartes=nb_cartes+1 WHERE id = ".$user_id."";
        $result = mysqli_query($conn, $sql);
        $_SESSION['nbcard'] +=1;
        $_SESSION['money'] -= $price;
    }
} else {
    header('Location: collection.php?erreur=77');
}

$sql = "INSERT INTO card_history (id_card, action_transaction, auteur, cost, date_action) VALUES ($card_id, 'buy', $user_id, $price, '".$date."')";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

header('Location: collection.php');



?>