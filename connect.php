<?php
include("db_host.php");
session_start();
if(isset($_POST['mailA']) && isset($_POST['passw']))
{
    // connexion à la base de données
    $db_username =;
    $db_password =;
    $db_name =;
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['mailA'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars(hash('sha256',$_POST['passw'])));
    
    if($email !== ""&& $password !== "")
    {
        $requete = "SELECT * FROM user INNER JOIN crypto_wallet ON user.id = crypto_wallet.id WHERE email = '".$email."' and pass = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = mysqli_num_rows($exec_requete);
        for ($j = 0; $j < $count; $j++) {
         $pseudo = $reponse["nickname"];
         $nat = $reponse["nationality"];
         $id = $reponse["id"];
         $money = $reponse["money"];
         $qbtc = $reponse["q_btc"];
         $qeth = $reponse["q_eth"];
         $qbnb = $reponse["q_bnb"];
         $qsol = $reponse["q_sol"];
         $qlink = $reponse["q_link"];
         $qdot = $reponse["q_dot"];
         $qwbt = $reponse["q_wbt"];
         $qxrp = $reponse["q_xrp"];
         $qava = $reponse["q_ava"];
         $qdol = $reponse["q_dol"];
         $lastclaim = $reponse["last_retrieval"];
         $nbcard = $reponse["nb_cartes"];

        }
        if($count==1) // nom d'utilisateur et mot de passe correctes
        {
         $_SESSION['mailA'] = $email;
         $_SESSION['pseudo'] = $pseudo;
         $_SESSION['natio'] = $nat;
         $_SESSION['id'] = $id;
         $_SESSION['money'] = $money;
         $_SESSION['q_btc'] = $qbtc;
         $_SESSION['q_eth'] = $qeth;
         $_SESSION['q_bnb'] = $qbnb;
         $_SESSION['q_sol'] = $qsol;
         $_SESSION['q_link'] = $qlink;
         $_SESSION['q_dot'] = $qdot;
         $_SESSION['q_wbt'] = $qwbt;
         $_SESSION['q_xrp'] = $qxrp;
         $_SESSION['q_ava'] = $qava;
         $_SESSION['q_dol'] = $qdol;
         $_SESSION['lastclaim'] = $lastclaim;
         $_SESSION['nbcard'] = $nbcard;
           
          header("Location:home.php");
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>