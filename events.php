<!DOCTYPE html>
<head>
    <title>My Dream Wallet</title>
    <link rel="stylesheet" href="css/style_events.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="mydreamwallet" />

</head>
<body>
    <?php include("menu.php"); 
    include("db_host.php");

    // On vérifie si le pseudo est présent dans l'URL
    if (isset($_SESSION['id'])) {
        $userid = $_SESSION['id'];
        $lastclaim = $_SESSION['lastclaim'];
    } else {
        header('Location: signup.php');
    }
    // Connexion à la base de données
    $db_username = 'u815982209_Pate';
    $db_password = 'Rekkles2502*';
    $db_name = 'u815982209_mydreamwallet';

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    // Vérification de la connexion
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the current date in the UTC+2 timezone
    date_default_timezone_set('Europe/Paris');
    $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
    // Format the date to match the MySQL date format
    $date = $date->format('Y-m-d');

    
    if ($lastclaim == $date) {
        // L'utilisateur a déjà récupéré ses cartes aujourd'hui
        echo "<div class='title'>Claim quotidien : Déjà récupéré</div>";
        echo "<div class='subtitle'>Revenez dans :</div>";
        echo "<div class='subtitle' style='color:red;' id='countdown'>XX heures, XX minutes, XX secondes</div>";

    } else {
    

        // L'utilisateur peut récupérer ses cartes aujourd'hui
        $sql = "SELECT *
        FROM collection_card
        WHERE rarety = 'Common'
           OR (rarety = 'Rare' AND RAND() <= 0.28)
           OR (rarety = 'Epic' AND RAND() <= 0.08)
           OR (rarety = 'Legendary' AND RAND() <= 0.01)
        ORDER BY RAND()
        LIMIT 2";
        $result = mysqli_query($conn, $sql);
        $cards = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $cards[] = $row;
        }

        $_SESSION['lastclaim'] = $date;

        // Mettre à jour la date de la dernière récupération
        $sql = "UPDATE user
                SET last_retrieval = '$date'
                WHERE id = $userid;";
        mysqli_query($conn, $sql);

        // Mettre à jour l'argent de l'utilisateur
        $sql = "UPDATE crypto_wallet
                SET crypto_wallet.money = crypto_wallet.money + 1000
                WHERE id = $userid;";
        mysqli_query($conn, $sql);
        $_SESSION['money'] += 1000;
        
        
        echo "<div class='title'>Claim quotidien : Disponible</div>";
        echo "<div class='subtitle'>Découvrez vos nouvelles cartes et recevez 1000$ !</div>";


        echo "<div class='card-container'>";

        // Afficher les cartes récupérées
        foreach ($cards as $card) {
            $sql = "SELECT COUNT(*) as count FROM exchange_card WHERE id_owner = $userid AND id_card = ".$card['id_card']." AND statue = 'buy'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];

            if ($count > 0){
                $sql ="UPDATE exchange_card SET nb = nb +1  WHERE id_owner = $userid AND id_card = ".$card['id_card']." AND statue = 'buy'";
                $result = mysqli_query($conn, $sql);
            } else {
                $sql = "INSERT INTO exchange_card (id_owner, id_card, nb, statue, price) 
                    VALUES ($userid, {$card['id_card']}, 1, 'buy', 0)";
                mysqli_query($conn, $sql);
                $sql = "UPDATE user SET nb_cartes=nb_cartes+1 WHERE id = ".$userid."";
                $result = mysqli_query($conn, $sql);
                $_SESSION['nbcard'] +=1;
            }

            echo "<div class='card' onclick='this.classList.toggle(\"flipped\");'>
                <div class='card-front'>
                <img src='images/back_card.png' alt='Image de la carte'>
                </div>
                <div class='card-back'>
                <img src='".$card['img_link']."' alt='Image de la carte'>
                </div>
            </div>";
        }
        echo "</div>";

    
    }
    

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);

    ?>


    <?php include("footer.php"); ?>
    <script src='js/totomorrow.js'></script>
</body>
</html>