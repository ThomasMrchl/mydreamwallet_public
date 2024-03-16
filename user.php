<!DOCTYPE html>
<head>
    <title>My Dream Wallet</title>
    <link rel="stylesheet" href="css/style_user.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="mydreamwallet" />

</head>
<body>
    <?php include("menu.php"); 
     include("db_host.php"); 
    // On vérifie si le pseudo est présent dans l'URL
    if (isset($_GET['pseudo'])) {
        $pseudo_info = $_GET['pseudo'];
        echo "<div class='title'>Compte de $pseudo_info </div>";
    } else {
        header('Location: home.php');
    }

        $db_username =;
        $db_password =;
        $db_name =;

        $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

        $nb_differentes_cartes = 0;
        $liste_cartes = array();
        $lite_nb = array();
        $query0 = "SELECT DISTINCT id_card, nb FROM exchange_card INNER JOIN user ON exchange_card.id_owner = user.id WHERE user.nickname = '".$pseudo_info."'";
        $result0 = mysqli_query($db, $query0);

        while ($row0 = mysqli_fetch_array($result0)) {
            $nb_differentes_cartes++;
            $id_carte = $row0['id_card'];
            $nb_carte = $row0['nb'];
            array_push($liste_cartes, $id_carte);
            array_push($lite_nb, $nb_carte);
        }

        echo "<div class='subtitle' style='color:white;'>Il possède ".$nb_differentes_cartes."/50 de la collection!</div>";

        if ($nb_differentes_cartes < 50){
        echo "<div class='subtitle'>Il a encore du chemin à parcourir    ...</div>";
        } else {
        echo "<div class='subtitle'>Tu possèdes toute la collection, Chapeau ! Des nouvelles cartes arrivent bientôt.</div>";
        }

        $query = "SELECT id_card, collection_card.name, rarety, img_link FROM collection_card";
        $result = mysqli_query($db, $query);

        $cartes_collectionnes=array();
        $numCards=0;
        $color = '';
        echo "<div class='card-container'>";
        while ($row = mysqli_fetch_array($result)) {


            if (in_array($row['id_card'], $liste_cartes)){
                $indice = array_search($row['id_card'], $liste_cartes);
                $source_image = $row['img_link'];
                $isOwned = 'true';
                $numCards=$lite_nb[$indice];

                echo "<div class='card-container'>
                    <input type='hidden' name='card_name' value='".$row['name']."'>
                    <input type='hidden' name='owned' value='".$isOwned."'>
                    <input type='hidden' name='num_owned' value='".$numCards."'>
                    <div class='card'>
                        <img src='".$source_image."'>
                    </div>
                </div>";


            
            }
            $numCards++;
        }
        mysqli_close($db);

        echo "</div>";
        ?>





    <div class="subtitle">Il est temps de le surpasser ? Non ?</div>

    <div class="container">
    <table class="responsive-table">
        <thead>
        <tr>
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
            <th scope="col">Q LUNA</th>
        </tr>
        </thead>
        <tbody>

        <?php

        $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

        $query = "SELECT * FROM user INNER JOIN crypto_wallet ON user.id = crypto_wallet.id WHERE user.nickname = '".$pseudo_info."'";
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                <td data-title='Nationalité'><img src='https://flagcdn.com/h60/" . $row["nationality"] . ".png' alt='" . $row["nationality"] . "' width='48' height='36'></td>
                <td data-title='pseudo'>" . $row["nickname"] . "</td>
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
        }

        mysqli_close($db);
        ?>
        </tbody>
    </table>
    <div class="title">Historique</div>
    <div class='subtitle'>L'historique de ses transactions !</div>
    <table class="responsive-table">
        <thead>
        <tr>
            <th scope="col">Crypto</th>
            <th scope="col">Type</th>
            <th scope="col">Quantity</th>
            <th scope="col">Cost</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $db_username = 'u815982209_Pate';
        $db_password = 'Rekkles2502*';
        $db_name = 'u815982209_mydreamwallet';

        $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

        $query = "SELECT * FROM exchange INNER JOIN user ON user.id = exchange.id_user WHERE user.nickname = '".$pseudo_info."'";
        $result2 = mysqli_query($db, $query);

        while ($row2 = mysqli_fetch_array($result2)) {
            if ($row2['type']=='buy'){
                echo "<tr>
                <td data-title='crypto'>" . $row2["crypto"] ."</td>
                <td style='background-color:green;' data-title='type'>" . $row2["type"] . "</td>
                <td data-title='quantity'>" . $row2["quantity"] . "</td>
                <td data-title='cost'>" . $row2["cost"] . "</td>
                <td data-title='date'>" . $row2["date"] . "</td>
              </tr>";
              } else if ($row2['type']=='sell'){
                echo "<tr>
                  <td data-title='crypto'>" . $row2["crypto"] ."</td>
                  <td style='background-color:red;' data-title='type'>" . $row2["type"] . "</td>
                  <td data-title='quantity'>" . $row2["quantity"] . "</td>
                  <td data-title='cost'>" . $row2["cost"] . "</td>
                  <td data-title='date'>" . $row2["date"] . "</td>
                </tr>";
              }
        }

        mysqli_close($db);
        ?>
        </tbody>
    </table>
    </div>
    
    <?php include("footer.php"); ?>
</body>
</html>