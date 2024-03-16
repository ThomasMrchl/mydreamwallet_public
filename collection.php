<!DOCTYPE html>
<head>
    <title>My Dream Wallet</title>
    <link rel="stylesheet" href="css/style_collection.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="mydreamwallet" />

</head>
<body>
    <?php include("menu.php"); 
    include("db_host.php"); ?>
    <div class="title">Votre Collection</div>
    <div class="subtitle">Les cartes sont maintenant collectionables !</div>

    <?php
    // On vérifie si le pseudo est présent dans l'URL
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    } else {
        header('Location: signup.php');
    }

    
    if(isset($_GET['erreur'])){
        $err = $_GET['erreur'];
        if($err==77){
            echo "<p style='color:red; text-align:center; font-size: 2em;'>Vous n'avez pas assez d'argent pour acheter cette carte !</p>";
        } 
    }
            

    $db_username =;
    $db_password =;
    $db_name =;

    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

    $nb_differentes_cartes = 0;
    $liste_cartes = array();
    $lite_nb = array();
    $query0 = "SELECT DISTINCT id_card, nb FROM exchange_card WHERE id_owner = $id AND statue = 'buy'";
    $result0 = mysqli_query($db, $query0);

    while ($row0 = mysqli_fetch_array($result0)) {
        $nb_differentes_cartes++;
        $id_carte = $row0['id_card'];
        $nb_carte = $row0['nb'];
        array_push($liste_cartes, $id_carte);
        array_push($lite_nb, $nb_carte);
    }

    echo "<div class='subtitle' style='color:white;'>Vous possédez ".$nb_differentes_cartes."/50 de la collection!</div>";

    $query = "SELECT id_card, collection_card.name, rarety, img_link FROM collection_card";
    $result = mysqli_query($db, $query);

    $cartes_collectionnes=array();

    $class = 'card';
    $color = '';
    echo "<div class='card-container'>";
    while ($row = mysqli_fetch_array($result)) {


        if (in_array($row['id_card'], $liste_cartes)){
            $indice = array_search($row['id_card'], $liste_cartes);
            $source_image = $row['img_link'];
            $isOwned = 'true';
            $numCards=$lite_nb[$indice];
        } else {
            $source_image = 'images/back_card.png';
            $isOwned = 'false';
            $numCards=0;
        } 

        if (($row['rarety']=='Common')&&($isOwned=='true')){
            $class = 'card_common';
        } else if (($row['rarety']=='Rare')&&($isOwned=='true')){
            $class = 'card_rare';
        } else if (($row['rarety']=='Epic')&&($isOwned=='true')){
            $class = 'card_epic';
        } else if (($row['rarety']=='Legendary')&&($isOwned=='true')){
            $class = 'card_legendary';
        }
            
        echo "<div class='card-container'>
        <form id='card-form-" . $row['id_card'] . "' action='card.php' method='POST'>
            <input type='hidden' name='card_name' value='".$row['name']."'>
            <input type='hidden' name='owned' value='".$isOwned."'>
            <input type='hidden' name='num_owned' value='".$numCards."'>
            <div class='".$class."'>
                <img src='".$source_image."' onclick='submitForm(".$row['id_card'].")'>
            </div>
        </form>
        </div>";
        
        $numCards++;
        $class = 'card';
    }
    mysqli_close($db);
    
    echo "</div>";
    ?>
    <script>
    function submitForm(id_card) {
    document.getElementById("card-form-" + id_card).submit();
    }
    </script>
    <?php include("footer.php"); ?>
</body>
</html>
