<!DOCTYPE html>
<head>
    <title>mydreamwallet</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="images/logotest.png">

    <script language="Javascript" >
        var msg1 = "    mydreamwallet - Version BETA !    ";
        var speed=120;
        function ScrollTitle() {
        document.title=msg1;
        msg1=msg1.substring(1,msg1.length)+msg1.charAt(0);
        setTimeout("ScrollTitle()",speed);
        }
        ScrollTitle();
    </script>
</head>
<body>
    <script src='https://cdn.jsdelivr.net/npm/@widgetbot/crate@3' async defer>
        new Crate({
            server: '1067934483451482212', // mydreamwallet.fr
            channel: '1074807638812004444' // #╏discussion
        })
    </script>

<?php
    session_start();
    $pseudo = "Se connecter";
    $account_redirection = 'signup.php';
    $faction_redirection = 'signup.php';
    if (isset ($_SESSION['pseudo'])){
        $pseudo = "mon compte";
        $account_redirection = 'account.php';
        $faction_redirection = 'faction.php';
    }

    ?>
    <div class="topnav">
        <a class="partielogo" href="home.php" href="home.php">MyDreamWallet</a>
        <a href="crypto.php">Cryptos</a>
        <a href="collection.php">Collection</a>
        <a href="<?php echo $faction_redirection; ?>">Faction</a>
        <a href="ranking.php">Ranking</a>
        <a href="shop.php">Shop</a>
        <div class="topnav-right">
        <a href="events.php">Récompenses</a>
        <a class="active" href="<?php echo $account_redirection; ?>"><?php echo $pseudo; ?></a>
        </div>
    </div>
</body>
</html>
