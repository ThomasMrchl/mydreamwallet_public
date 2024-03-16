<!DOCTYPE html>
<head>
    <title>My Dream Wallet</title>
    <link rel="stylesheet" href="css/style_ranking.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="mydreamwallet" />
</head>
<body>
    <?php include("menu.php"); ?>
    <?php include("db_host.php"); ?>

    <div class="title">Ranking BETA - MDW</div>

    <div class='subtitle'>Vous n'avez pas encore de portefeuille ? Inscrivez-vous !</div>
    <button class='button-9' role='button' href='login.php' onclick="self.location.href='signup.php'">S'inscrire !</button>

    <?php
        // Connexion à la base de données
        $db_username =;
        $db_password =;
        $db_name =;
        $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

        // Requête pour calculer le capital de chaque faction
        $query = "SELECT nationality, SUM(money) as total_money, SUM(q_btc) as btc_total, SUM(q_eth) as eth_total, SUM(q_bnb) as bnb_total, SUM(q_sol) as sol_total, SUM(q_link) as link_total, SUM(q_dot) as dot_total, SUM(q_wbt) as wbt_total, SUM(q_xrp) as xrp_total, SUM(q_ava) as ava_total, SUM(q_dol) as dol_total FROM user INNER JOIN crypto_wallet ON user.id = crypto_wallet.id GROUP BY nationality ORDER BY total_money DESC";

        // Exécuter la requête et récupérer les résultats
        $result = mysqli_query($db, $query);

        // Afficher le classement des factions en fonction de leur capital
        echo "<div class='subtitle' style='color:white; padding-top:5%;'>TOP 10 Pays en Cash - MDW</div>";
        echo "<div class='container'>";
        echo "<table class='responsive-table'>";
        echo "<thead><tr><th>Rank</th><th>Flag</th><th>Pays</th><th>Capital</th><th>Q_BTC</th><th>Q_ETH</th><th>Q_BNB</th><th>Q_SOL</th><th>Q_LINK</th><th>Q_DOT</th><th>Q_ADA</th><th>Q_XRP</th><th>Q_AVA</th><th style='background-color:yellow; color:black;'>Q_DOL</th></tr></thead><tbody>";
        $indice = 1;
        while ($row = mysqli_fetch_array($result) and $indice < 11) {
            echo "<tr><td data-title='Rank'>" . $indice . "</td>
            <td data-title='Flag'><img src='https://flagcdn.com/h60/" . $row['nationality'] . ".png' alt='" . $row['nationality'] . "' width='48' height='36'></td>
            <td data-title='Pays'>" . $row['nationality'] . "</td>
            <td data-title='Capital'>" . round($row['total_money'],2) . "$</td>
            <td data-title='Total BTC'>" . $row['btc_total'] . "</td>
            <td data-title='Total ETH'>" . $row['eth_total'] . "</td>
            <td data-title='Total BNB'>" . $row['bnb_total'] . "</td>
            <td data-title='Total SOL'>" . $row['sol_total'] . "</td>
            <td data-title='Total LINK'>" . $row['link_total'] . "</td>
            <td data-title='Total DOT'>" . $row['dot_total'] . "</td>
            <td data-title='Total ADA'>" . $row['wbt_total'] . "</td>
            <td data-title='Total XRP'>" . $row['xrp_total'] . "</td>
            <td data-title='Total AVA'>" . $row['ava_total'] . "</td>
            <td data-title='Total DOL'>" . $row['dol_total'] . "</td>
            </tr>";
            $indice++;
        }
        echo "</tbody></table></div>";
        echo "<div class='subtitle' style='color:white; padding-top:5%;'>TOP 25 Joueurs en Cash - MDW</div>";
    ?>


  <div class="container">
  <table class="responsive-table">
    <thead>
      <tr>
        <th scope="col">Rank</th>
        <th scope="col">Faction</th></th>
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
        <th scope="col" style="background-color:yellow; color:black;">Q DOL</th>
      </tr>
    </thead>
    <tbody>

    <?php
    $indice = 1;

    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

    $query = "SELECT * FROM user INNER JOIN crypto_wallet ON user.id = crypto_wallet.id ORDER BY crypto_wallet.money DESC";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_array($result) and $indice<26) {
        if (strlen($row['nickname']) > 8) {
          $pseudo_abrege = substr($row['nickname'], 0, 8) . "..";
        } else {
          $pseudo_abrege = $row['nickname'];
        }

        if (isset($_SESSION['id'])){
          if ($row['id']==$_SESSION['id']){
            $_SESSION['money']=$row['money'];
          }
        }

        echo "<tr>
            <td data-title='rang'>" . $indice . "</td>
            <td data-title='Nationalité'><img src='https://flagcdn.com/h60/" . $row["nationality"] . ".png' alt='" . $row["nationality"] . "' width='48' height='36'></td>
            <td href='#' class='user-link' data-pseudo='" . $row["nickname"] . "' data-title='pseudo'>" . $pseudo_abrege . "</td>
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
        $indice++;
      }
    mysqli_close($db);
    ?>
    </tbody>
  </table>
</div>
<div class='subtitle' style='color:white; padding-top:5%;'>TOP 25 Joueurs en Nombre de Cartes - MDW</div>
<div class="container">
  <table class="responsive-table">
    <thead>
      <tr>
        <th scope="col">Rank</th>
        <th scope="col">Faction</th></th>
        <th scope="col">Pseudo</th>
        <th scope="col">Nb Card</th>
      </tr>
    </thead>
    <tbody>

    <?php
    $indice = 1;

    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

    $query = "SELECT * FROM user ORDER BY nb_cartes DESC";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_array($result) and $indice<101) {
        if (strlen($row['nickname']) > 8) {
          $pseudo_abrege = substr($row['nickname'], 0, 8) . "..";
        } else {
          $pseudo_abrege = $row['nickname'];
        }


        echo "<tr>
            <td data-title='rang'>" . $indice . "</td>
            <td data-title='Nationalité'><img src='https://flagcdn.com/h60/" . $row["nationality"] . ".png' alt='" . $row["nationality"] . "' width='48' height='36'></td>
            <td href='#' class='user-link' data-pseudo='" . $row["nickname"] . "' data-title='pseudo'>" . $pseudo_abrege . "</td>
            <td data-title='Valeur'>" . $row["nb_cartes"] ."/55</td>
          </tr>";
        $indice++;
      }
    mysqli_close($db);
    ?>
    </tbody>
  </table>
</div>
<script src='js/get_pseudo.js'></script>
<?php include("footer.php"); ?>
</body>

</html>