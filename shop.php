<!DOCTYPE html>
<head>
    <title>My Dream Wallet</title>
    <link rel="stylesheet" href="css/style_shop.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="mydreamwallet" />

</head>
<body>
    <?php include("menu.php"); 
     include("db_host.php"); 
    
     if (isset($_SESSION['id'])) {
        $iduser = $_SESSION['id'];
      } else {
        // Required data is missing, redirect to home.php
        header('Location: home.php');
        exit();
      }
    
    $db_username =;
    $db_password =;
    $db_name =;

    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

    
    echo "</div><div class='title'>Boutique :</div><div class='subtitle'>Click sur les cartes pour obtenir plus d'informations</div>";

    $query2 = "SELECT user.nickname, exchange_card.price, exchange_card.id_owner, exchange_card.id_card, exchange_card.id, collection_card.img_link FROM exchange_card INNER JOIN user ON user.id = exchange_card.id_owner INNER JOIN collection_card ON collection_card.id_card = exchange_card.id_card WHERE exchange_card.statue = 'sell';";
    $result2 = mysqli_query($db, $query2);


    if (mysqli_num_rows($result2) == 0){
        echo "<div class='subtitle' style='color:red; margin-top:5%;'>Aucune carte en vente, désolé !</div>";
    }

    $class = 'card';
    $class_back= 'card-back';
    $class_front= 'card-front';

    echo "<div class='card-container'>";
    while ($row2 = mysqli_fetch_array($result2)) {

        echo "<div class='".$class."' onclick='this.classList.toggle(\"flipped\");'>
            <div class='".$class_front."'>
            <img src='".$row2['img_link']."' alt='Image de la carte'>
            </div>
            <div class='".$class_back."'>
            <p class='description'>Owner : ".$row2['nickname']."</p>
            <p class='description'>Price : ".$row2['price']."$</p>";

            $nbcard=0;
            $query3 = "SELECT exchange_card.nb FROM exchange_card WHERE exchange_card.id_card = ".$row2['id_card']." AND exchange_card.statue = 'buy' AND exchange_card.id_owner = $iduser";
            $result3 = mysqli_query($db, $query3);
            if (mysqli_num_rows($result3) > 0){ 
                while ($row3 = mysqli_fetch_array($result3)) {
                    echo "<p class='description'>Possédé : ".$row3['nb']." fois</p>";
                }
            } else {
                echo "<p class='description'>Possédé : Non</p>";
            }
            
            

            if ($row2['id_owner']==$_SESSION['id']){
                echo"
                <form action='canceldeal.php' method='POST'>
                    <input type='hidden' name='card_id' value='".$row2['id_card']."'>
                    <input type='hidden' name='user_id' value='".$iduser."'>
                    <input type='hidden' name='transaction_id' value='".$row2['id']."'>
                    <button class='button-buy' style='background-color:red;' type='submit'>Annuler</button>
                </form>";
            } else {

                echo"
                <form action='buycard.php' method='POST'>
                    <input type='hidden' name='card_id' value='".$row2['id_card']."'>
                    <input type='hidden' name='user_id' value='".$iduser."'>
                    <input type='hidden' name='owner_id' value='".$row2['id_owner']."'>
                    <input type='hidden' name='transaction_id' value='".$row2['id']."'>
                    <input type='hidden' name='price' type='number' value='".$row2['price']."'>
                    <button class='button-buy' style='background-color:#50C878; type='submit'>Acheter</button>
                </form>";
            }
            echo "</div>
        </div>";
    }

    echo "</div>";

    echo "</div><div class='title'>Transactions :</div><div class='subtitle'>Historique des dernières transactions !</div>";

    $query3 = "SELECT user.nickname, action_transaction, auteur, cost, date_action, collection_card.name FROM card_history INNER JOIN user ON user.id = card_history.auteur INNER JOIN collection_card ON collection_card.id_card = card_history.id_card ORDER BY card_history.id DESC LIMIT 100;";
    $result3 = mysqli_query($db, $query3);




    ?>

    <section>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
        <thead>
            <tr>
            <th>Action</th>
            <th>Carte</th>
            <th>Auteur</th>
            <th>Prix</th>
            <th>Date</th>
            </tr>
        </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <?php
                while ($row3 = mysqli_fetch_array($result3)) {
                    if ($row3['action_transaction']=='sell'){
                        echo "<tr'><td style='color:red;'>Vente</td><td>".$row3['name']."</td><td>".$row3['nickname']."</td><td>".$row3['cost']." $</td><td>".$row3['date_action']."</td></tr>";
                    } else if ($row3['action_transaction']=='cancel'){
                        echo "<tr><td>Annulation</td><td>".$row3['name']."</td><td>".$row3['nickname']."</td><td>//</td><td>".$row3['date_action']."</td></tr>";
                    } else if ($row3['action_transaction']=='buy'){
                        echo "<tr><td style='color:#26C778;'>Achat</td><td>".$row3['name']."</td><td>".$row3['nickname']."</td><td>".$row3['cost']." $</td><td>".$row3['date_action']."</td></tr>";
                    }
                }
            ?>
        </tbody>
        </table>
    </div>
    </section>



<?php 

    mysqli_close($db);
    include("footer.php"); ?>
    <script>
    // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
    $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
    </script>
</body>
</html>