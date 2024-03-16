<?php
include("db_host.php");
session_start();

if ($_SESSION['pseudo']!=null){

    // Get the stock price value from the POST request
    $stockPrice = (float)$_POST['stock_price'];
    $crypto_name = $_POST['crypto_name'];

    if (isset($stockPrice) && !empty($stockPrice)) {

        $qcrypto = '';
        switch ($crypto_name) {
            case 'stock-price-btc':
                $qcrypto = 'q_btc';
                $name = 'btc';
                break;
            case 'stock-price-eth':
                $qcrypto = 'q_eth';
                $name = 'eth';
                break;
            case 'stock-price-bnbbtc':
                $qcrypto = 'q_bnb';
                $name = 'bnb';
                break;
            case 'stock-price-sol':
                $qcrypto = 'q_sol';
                $name = 'sol';
                break;
            case 'stock-price-link':
                $qcrypto = 'q_link';
                $name = 'link';
                break;
            case 'stock-price-dot':
                $qcrypto = 'q_dot';
                $name = 'dot';
                break;
            case 'stock-price-wbt':
                $qcrypto = 'q_wbt';
                $name = 'wbt';
                break;
            case 'stock-price-xrp':
                $qcrypto = 'q_xrp';
                $name = 'xrp';
                break;
            case 'stock-price-ava':
                $qcrypto = 'q_ava';
                $name = 'ava';
                break;
            default:
                header("Location:crypto.php?erreur=3");
                exit();
        }

        $valeur_crypto = $_SESSION[$qcrypto];

        if ($valeur_crypto >= 1){

            // Insert the stock price into your example database
            $username =;
            $password =;
            $dbname =;

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $money = $_SESSION['money'];
            $new_money_value = $money + $stockPrice;
            $user_id = $_SESSION['id'];

            $sql = "UPDATE crypto_wallet SET $qcrypto = $qcrypto - 1, money = $new_money_value WHERE id = $user_id";

            $date = date('d-m-y h:i:s');
            $sql_insert = "INSERT Into exchange (exchange.id_user,exchange.crypto,exchange.type,exchange.quantity,exchange.cost,exchange.date) VALUES ('".$user_id."','".$name."','sell',1,'".$stockPrice."','".$date."')";

            $_SESSION['money'] = $new_money_value;
            $_SESSION[$qcrypto] -= 1;

            if (($conn->query($sql) === TRUE) && ($conn->query($sql_insert) === TRUE)) {
                header("Location:crypto.php");
            } else {
                header("Location:crypto.php?erreur=2");
            }
                
            $conn->close();

        } else {
            header("Location:crypto.php?erreur=3");
        }

    } else {
        header("Location:crypto.php");
    }
    
} else { 
    header("Location:signup.php?erreur=1");
}
?>