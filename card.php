<!DOCTYPE html>
<head>
    <title>My Dream Wallet</title>
    <link rel="stylesheet" href="css/style_card.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="mydreamwallet" />

</head>
<body>
    <?php include("menu.php"); 
     include("db_host.php"); 
    
     if (isset($_POST['card_name'])) {
        $namecard = $_POST['card_name'];
        $is_owned = $_POST['owned'];
        $numCards = intval($_POST['num_owned']);
        $iduser = $_SESSION['id'];
      
      } else {
        // Required data is missing, redirect to home.php
        header('Location: home.php');
        exit();
      }
  
    
    echo "<div class='title'>Recherche : ".$namecard."</div>";
    
    if ($is_owned=='false'){
        echo "<div class='subtitle'>Vous ne possédez pas la carte ".$namecard."</div>";
    } else {
        echo "<div class='subtitle'>Vous possédez cette carte en $numCards exemplaires !</div>";
    }
    
    $db_username =;
    $db_password =;
    $db_name =;

    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

    $query = "SELECT * FROM collection_card WHERE collection_card.name = '$namecard'";
    $result = mysqli_query($db, $query);


    $class = 'card';
    $class_back= 'card-back';
    $class_front= 'card-front';
    $color = '';
    echo "<div class='card-container'>";
    while ($row = mysqli_fetch_array($result)) {

        $id_card = $row['id_card'];
        $imglink = $row['img_link'];

        if ($is_owned == 'true'){
            $rarety = $row['rarety'];

            if (($row['rarety']=='Common')&&($is_owned=='true')){
                $class = 'card_common';
                $class_front = 'card_common-front';
                $class_back = 'card_common-back';
            } else if (($row['rarety']=='Rare')&&($is_owned=='true')){
                $class = 'card_rare';
                $class_front = 'card_rare-front';
                $class_back = 'card_rare-back';
            } else if (($row['rarety']=='Epic')&&($is_owned=='true')){
                $class = 'card_epic';
                $class_front = 'card_epic-front';
                $class_back = 'card_epic-back';
            } else if (($row['rarety']=='Legendary')&&($is_owned=='true')){
                $class = 'card_legendary';
                $class_front = 'card_legendary-front';
                $class_back = 'card_legendary-back';
            }
            
        } else {
            $rarety = 'Inconnue';
            $class = 'card';
        }

        echo "<div class='".$class."'>
            <img src='".$row['img_link']."' alt='Image de la carte'>
            </div>
            <div class='text'>
            <h2 class='name' style='color:#08d'>Nom : ".$row['name']."</h2>
            <p class='description'>Groupe : ".$row['group_name']."</p>
            <p class='description'>Rareté : ".$rarety."</p>
            <p class='description'>Description : ".$row['description']."</p>
            </div>";
    }

    if (($numCards>1) AND ($is_owned==true)){
        echo "</div><div class='title'>Mes Cartes :</div><div class='subtitle'>Click sur tes cartes pour pouvoir les vendres !</div>";
        echo "<div class='subtitle' style='color:white;'>Vous ne pouvez pas vendre l'intégralité de vos cartes, il doit vous en rester une !</div>";

        $query3 = "SELECT nb, id FROM exchange_card WHERE id_card = $id_card AND id_owner = $iduser AND statue='buy'";
        $result3 = mysqli_query($db, $query3);

        if (mysqli_num_rows($result3) == 0){
            echo "<div class='subtitle' style='color:red; margin-top:5%;'>Impossible de vendre des cartes, désolé !</div>";
        }

        if ($numCards>6){
            echo "<div class='card-container' style='margin-bottom:10%; max-height: 900px; overflow-y: hidden; row-gap: 10px; grid-gap:5%; padding-top:1%;'>";
        } else {
            echo "<div class='card-container' style='margin-bottom:10%;'>";
        }
        
        while ($row3 = mysqli_fetch_array($result3)) {
            $nb = $row3['nb'];
            while ($nb > 1){

                echo "<div class='".$class."' onclick='this.classList.toggle(\"flipped\");'>
                    <div class='".$class_front."'>
                    <img src='".$imglink."' alt='Image de la carte'>
                    </div>
                    <div class='".$class_back."'>
                    <p class='description'>Owner : You</p>
                    <p class='description' style='color:#08d;'>Prix de vente :</p>
                    <form action='sellcard.php' method='POST'>
                        <input type='hidden' name='card_id' value='".$id_card."'>
                        <input type='hidden' name='user_id' value='".$iduser."'>
                        <input type='hidden' name='transaction_id' value='".$row3['id']."' style='appearance:none; -moz-appearance:textfield;'>
                        <input class='input' type='number' name='price' id='price_".$id_card."_".$row3['id']."' min='100' max='1000000' step='50' onclick='event.stopPropagation();'>
                        <button class='button-buy' style='background-color:#26C778;' type='submit'>Vendre</button>
                    </form>";
                echo"</div>
                </div>";

                $nb-=1;
            }
        }

        echo "</div>";


    }

    
    echo "</div><div class='title'>Boutique :</div><div class='subtitle'>Click sur les cartes pour obtenir plus d'informations</div>";

    $query2 = "SELECT user.nickname, exchange_card.price, exchange_card.id_owner, exchange_card.id_card, exchange_card.id FROM exchange_card INNER JOIN user ON user.id = exchange_card.id_owner WHERE exchange_card.id_card = $id_card AND exchange_card.statue = 'sell' ORDER BY price";
    $result2 = mysqli_query($db, $query2);

    if (mysqli_num_rows($result2) == 0){
        echo "<div class='subtitle' style='color:red; margin-top:5%;'>Aucune carte en vente, désolé !</div>";
    }

    echo "<div class='card-container'>";
    while ($row2 = mysqli_fetch_array($result2)) {

        echo "<div class='".$class."' onclick='this.classList.toggle(\"flipped\");'>
            <div class='".$class_front."'>
            <img src='".$imglink."' alt='Image de la carte'>
            </div>
            <div class='".$class_back."'>
            <p class='description'>Owner : ".$row2['nickname']."</p>
            <p class='description'>Price : ".$row2['price']."$</p>";

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



    mysqli_close($db);
    include("footer.php"); ?>
    </script>
</body>
</html>