<?php
session_start();

    include("db_host.php");
    // connexion à la base de données
    $db_username =;
    $db_password =;
    $db_name =;
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    if ( isset( $_POST['submit'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
     $nom = $_POST['firstname']; 
     $_SESSION['pseudo'] = $nom;
     $pass = hash('sha256', $_POST['passw']); 
     
     $adresse = $_POST['email'];
     $natio = $_POST['nationality'];
     if ($natio == ""){
        $natio = "pm";
     }
     $verif=1;

    $requete = "INSERT Into user (user.nickname,user.nationality,user.email,user.pass,user.verif,user.nb_cartes,user.last_retrieval) VALUES ('".$nom."','".$natio."','".$adresse."','".$pass."',".$verif.",0,'')";
    $exec_requete = mysqli_query($db,$requete);


    $requete2 = "SELECT * FROM user where 
        email = '".$adresse."' and pass = '".$pass."' ";
    $exec_requete2 = mysqli_query($db,$requete2);
    $reponse      = mysqli_fetch_array($exec_requete2);
    $count = mysqli_num_rows($exec_requete2);
    for ($j = 0; $j < $count; $j++) {
        $pseudo = $reponse["nickname"];
        $nat = $reponse["nationality"];
        $id = $reponse["id"];
    }
    if($count==1) // nom d'utilisateur et mot de passe correctes
    {
        $_SESSION['mailA'] = $adresse;
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['natio'] = $nat;
        $_SESSION['id'] = $id;
        $_SESSION['money'] = 5000;
        $_SESSION['q_btc'] = 0;
        $_SESSION['q_eth'] = 0;
        $_SESSION['q_bnb'] = 0;
        $_SESSION['q_sol'] = 0;
        $_SESSION['q_link'] = 0;
        $_SESSION['q_dot'] = 0;
        $_SESSION['q_wbt'] = 0;
        $_SESSION['q_xrp'] = 0;
        $_SESSION['q_ava'] = 0;
        $_SESSION['q_dol'] = 0;
        $_SESSION['lastclaim'] = '';
        $_SESSION['nbcard']=0;

        $requete3 = "INSERT Into crypto_wallet (crypto_wallet.id,crypto_wallet.money,crypto_wallet.q_btc,crypto_wallet.q_eth,crypto_wallet.q_bnb,crypto_wallet.q_sol,crypto_wallet.q_link,crypto_wallet.q_dot,crypto_wallet.q_wbt,crypto_wallet.q_xrp,crypto_wallet.q_ava,crypto_wallet.q_dol) VALUES ($id,5000,0,0,0,0,0,0,0,0,0,0)";
        $exec_requete3 = mysqli_query($db,$requete3);

        header('Location: home.php');

    } else {
        echo "error404";
    }



mysqli_close($db); // fermer la connexion
    }
?>