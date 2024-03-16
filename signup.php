<!DOCTYPE html>
<head>
    <title>My Dream Wallet</title>
    <link rel="stylesheet" href="css/style_signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="images/logotest.png"> 
    <meta name="Description" content="Simulation Investissements" />

</head>
<body>
    <?php include("menu.php"); ?>
    <div class="descendre"> 
      <form action="insert.php" method="post">
        <div class="form">
          <div class="titre"><img src="images/banniere.png" alt="logo"></div>
        <a href="login.php"><div class="soutitre">Déjà inscrit ?</div></a>
        <div class="input-container ic1">
          <input name="firstname" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="firstname" class="placeholder">Pseudo</label>
        </div>
        <div class="input-container ic2">
          <input name="email" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="email" class="placeholder">Email</label>
        </div>
        <div class="input-container ic2">
          <input name="passw" class="input" type="password" placeholder=" " />
          <div class="cut cut-short"></div>
          <label for="passw" class="placeholder">Mot de passe</label>
        </div>
        <div class="input-container ic2">
        <div class="box">
          <select name="nationality" id="nationality-id" type="nationality">
            <option value="">Sélectionnez votre Faction</option>
            <option value="af">Afghanistan</option>
            <option value="za">Afrique du Sud</option>
            <option value="dz">Algérie</option>
            <option value="de">Allemagne</option>
            <option value="ad">Andorre</option>
            <option value="sa">Arabie Saoudite</option>
            <option value="ar">Argentine</option>
            <option value="au">Australie</option>
            <option value="at">Autriche</option>
            <option value="bs">Bahamas</option>
            <option value="bb">Barbade</option>
            <option value="be">Belgique</option>
            <option value="br">Brésil</option>
            <option value="bg">Bulgarie</option>
            <option value="cm">Cameroune</option>
            <option value="ca">Canada</option>
            <option value="cn">Chine</option>
            <option value="cy">Chypre</option>
            <option value="co">Colombie</option>
            <option value="cg">République du Congo</option>
            <option value="cd">République démocratique du Congo</option>
            <option value="kr">Corée du Sud</option>
            <option value="kp">Corée du Nord</option>
            <option value="ci">Côte d'Ivoire</option>
            <option value="hr">Croatie</option>
            <option value="cu">Cuba</option>
            <option value="dk">Danemark</option>
            <option value="eg">Egypte</option>
            <option value="sv">Salvador</option>
            <option value="ae">Emirats arables unis</option>
            <option value="ec">Equateur</option>
            <option value="es">Espagne</option>
            <option value="ee">Estonie</option>
            <option value="us">Etats-Unis</option>
            <option value="fi">Finlande</option>
            <option value="fr">France</option>
            <option value="ga">Gabon</option>
            <option value="gh">Ghana</option>
            <option value="gr">Grèce</option>
            <option value="gl">Groenland</option>
            <option value="gt">Guatemala</option>
            <option value="gn">Guinée</option>
            <option value="ht">Haïti</option>
            <option value="hn">Honduras</option>
            <option value="hk">Hong Kong</option>
            <option value="hu">Hongrie</option>
            <option value="in">Inde</option>
            <option value="af">Indonésie</option>
            <option value="ir">Iran</option>
            <option value="iq">Irak</option>
            <option value="ie">Irlande</option>
            <option value="is">Islande</option>
            <option value="il">Israël</option>
            <option value="it">Italie</option>
            <option value="jm">Jamaïque</option>
            <option value="jp">Japon</option>
            <option value="jo">Jordanie</option>
            <option value="kz">Kazakhstan</option>
            <option value="ke">Kenya</option>
            <option value="ke">Koweït</option>
            <option value="la">Laos</option>
            <option value="lb">Liban</option>
            <option value="ly">Libye</option>
            <option value="li">Liechtenstein</option>
            <option value="lt">Lituanie</option>
            <option value="lu">Luxembourg</option>
            <option value="mg">Madagascar</option>
            <option value="my">Malaisie</option>
            <option value="ml">Mali</option>
            <option value="mt">Malte</option>
            <option value="ma">Maroc</option>
            <option value="mx">Mexique</option>
            <option value="mc">Monaco</option>
            <option value="me">Monténégro</option>
            <option value="mz">Mozambique</option>
            <option value="ni">Nicaragua</option>
            <option value="ng">Nigeria</option>
            <option value="no">Norvège</option>
            <option value="nz">Nouvelle-Zélande</option>
            <option value="om">Oman</option>
            <option value="ug">Ouganda</option>
            <option value="ps">Pakistan</option>
            <option value="ps">Palestine</option>
            <option value="pa">Panama</option>
            <option value="nl">Pays-Bas</option>
            <option value="pe">Pérou</option>
            <option value="ph">Philippines</option>
            <option value="pl">Pologne</option>
            <option value="pt">Potugal</option>
            <option value="qa">Qatar</option>
            <option value="ro">Roumanie</option>
            <option value="gb">Royaume-Uni</option>
            <option value="ru">Russie</option>
            <option value="rw">Rwanda</option>
            <option value="sm">Saint-Marin</option>
            <option value="sn">Sénégal</option>
            <option value="rs">Serbie</option>
            <option value="sg">Singapour</option>
            <option value="sk">Slovaquie</option>
            <option value="si">Slovénie</option>
            <option value="lk">Sri Lanka</option>
            <option value="se">Suède</option>
            <option value="ch">Suisse</option>
            <option value="sy">Syrie</option>
            <option value="tw">Taïwan</option>
            <option value="td">Tchad</option>
            <option value="cz">Tchéquie</option>
            <option value="th">Thaïlande</option>
            <option value="tn">Tunisie</option>
            <option value="tr">Turquie</option>
            <option value="ua">Ukraine</option>
            <option value="uy">Uruguay</option>
            <option value="ve">Venezuela</option>
            <option value="vn">Viët Nam</option>
            <option value="zw">Zimbabwe</option>
          </select>
        </div>
        </div>
        <input type="submit" name="submit" value="Submit" class="submit"/>
        </div>
      </form>
      <?php 

      if(isset($_GET['erreur'])){
        $err = $_GET['erreur'];
        if($err==1){
          echo "<p style='color:red; text-align:center; font-size: 2em;'>Veuillez attendre l'affichage du prix</p>";
        } else if ($err==2){
          echo "<p style='color:red; text-align:center; font-size: 2em;'>Autre problème</p>";
        } else if ($err==3){
          echo "<p style='color:red; text-align:center; font-size: 2em;'>Autre problème 2</p>";
        }
      }
      ?>
    </div>
</body>
<?php include("footer.php"); ?>
</html>