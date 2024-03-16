<!DOCTYPE html>
<head>
    <title>mydreamwallet</title>
    <link rel="stylesheet" media="screen" type="text/css" title="pagehome" href="css/style_home.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="mydreamwallet" />
</head>
<body>
    <?php include("menu.php"); ?>
    <div class="home_container">
        <div class="title">Welcome on mydreamwallet</div>
        <div class="subtitle" id="title">Ton portefeuille favori est de retour !</div>
        <button class="button-9" role="button" href="signup.php" onclick="self.location.href='signup.php'">Rejoindre l'aventure</button>
    </div>
    
    <div class="container">
        <div class="title" style="color:black;">Présentation</div>
        <div class="title_questions">Quel est le but du site internet mydreamwallet ?</div>
        <div class ="response">Pour faire simple, chaque saison les différentes factions du serveur représentées par des pays se battent pour devenir la plus riche du serveur.</div>
        <div class="title_questions">Ok je comprends, mais comment gagne t-on de l'argent ?</div>
        <div class ="response">Il y a de nombreuses manières de gagner de l'argent : Acheter/Revendre des cryptomonnaies, participer aux évènements & ALL IN sur la couleur rouge.</div>
    </div>

    <div class="container_bis">
        <div class="title">Important</div>
        <div class="title_questions">Comment je m'inscris ?</div>
        <div class="response">Pour cela créer ton compte mydreamwallet en cliquant <a href="signup.php">ici</a>, si tu veux plus de réflexion pour choisir ta faction viens les rencontrer directement sur notre serveur discord.</div>
        <div class="title_questions">Comment puis-je être au courant des actualitées ?</div>
        <div class ="response">Tout se passe sur notre discord, clique sur le bouton ci-dessous, de même si tu as besoin d'aide n'hésite pas à contacter un membre du staff.</div>
        <button class="button-9" role="button" href="https://discord.gg/Dmu4DrsHZf" onclick="self.location.href='https://discord.gg/Dmu4DrsHZf'">Rejoindre notre discord</button>
    </div>
    <script src='js/typing.js'></script>
</body>
<?php include("footer.php"); ?>
</html>
