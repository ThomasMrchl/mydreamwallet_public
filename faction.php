<!DOCTYPE html>
<head>
    <title>mydreamwallet</title>
    <link rel="stylesheet" href="css/style_faction.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="mydreamwallet" />
</head>
<body>
    <?php include("menu.php"); 
    include("db_host.php");
    $faction =  $_SESSION['natio'];
    ?>

    <div class="title"><?php echo "<img src='https://flagcdn.com/h60/" . $faction . ".png' alt='" . $faction . "' width='144' height='108'>"?> Faction <?php echo $faction;?></div>

<div class="container">
  <table class="responsive-table">
    <thead>
      <tr>
        <th scope="col">Rank</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Valeur Wallet</th>
        <th scope="col">Q BTC</th>
        <th scope="col">Q ETH</th>
        <th scope="col">Q BNB</th>
        <th scope="col">Q SOL</th>
        <th scope="col">Q LINK</th>
        <th scope="col">Q DOT</th>
        <th scope="col">Q ADA</th>
        <th scope="col">Q XRP</th>
        <th scope="col">Q AVAX</th>
        <th scope="col">Q LUNA</th>
      </tr>
    </thead>
    <tbody>

    <?php
    $db_username =;
    $db_password =;
    $db_name =;
    
    $indice = 1;

    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');
    $query = "SELECT * FROM user INNER JOIN crypto_wallet ON user.id = crypto_wallet.id WHERE user.nationality = '".$faction."' ORDER BY crypto_wallet.money DESC";
    $result = mysqli_query($db, $query);

    // Créer un tableau associatif vide
    $dict = array();

    // Ajouter des éléments au tableau
    $dict["totalmoney"] = 0;

    while ($row = mysqli_fetch_array($result) and $indice<25) {
      if ($row['id']==$_SESSION['id']){
        $_SESSION['money']=$row['money'];
      }
        echo "<tr>
            <td data-title='rang'>" . $indice . "</td>
            <td href='#' class='user-link' data-pseudo='" . $row["nickname"] . "' data-title='pseudo'>" . $row["nickname"] . "</td>
            <td data-title='Valeur'>" . $row["money"] ."$</td>
            <td data-title='QBTC'>" . $row["q_btc"] . "</td>
            <td data-title='QETH'>" . $row["q_eth"] . "</td>
            <td data-title='QBNB'>" . $row["q_bnb"] . "</td>
            <td data-title='QSOL'>" . $row["q_sol"] . "</td>
            <td data-title='QLINK'>" . $row["q_link"] . "</td>
            <td data-title='QDOT'>" . $row["q_dot"] . "</td>
            <td data-title='QADA'>" . $row["q_wbt"] . "</td>
            <td data-title='QXRP'>" . $row["q_xrp"] . "</td>
            <td data-title='QAVAX'>" . $row["q_ava"] . "</td>
            <td data-title='ALUNA'>" . $row["q_dol"] . "</td>
          </tr>";
        $dict["totalmoney"] = $dict["totalmoney"] + $row["money"];
        $indice++;
    }
    echo "<div class='subtitle' style='padding-top:5%;'>Capital de ta faction : ".$dict['totalmoney']."$</div>";
    echo "<div class='subtitle' style='color:white; padding-top:2%;'>Top 25 - Membres de ta Faction</div>";
    mysqli_close($db);
    ?>
    </tbody>
  </table>
</div>
<script src='js/get_pseudo.js'></script>
<?php include("footer.php"); ?>
</body>

</html>