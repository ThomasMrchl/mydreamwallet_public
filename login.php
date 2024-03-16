<!DOCTYPE html>
<head>
    <title>My Dream Wallet</title>
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="Data films et series" />

</head>
<body>
    <?php include("menu.php"); ?>
    <div class="descendre">
        <form action="connect.php" method="post">
      <div class="form">
        <div class="titre"><img src="images/banniere.png" alt="logo"></div>
      <a href="signup.php"><div class="soutitre">Pas encore inscrit ?</div></a>
      <div class="input-container ic2">
        <input name="mailA" class="input" type="text" placeholder=" " required/>
        <div class="cut"></div>
        <label for="email" class="placeholder">Email</label>
      </div>
      <div class="input-container ic2">
        <input name="passw" class="input" type="password" placeholder=" " required/>
        <div class="cut cut-short"></div>
        <label for="passw" class="placeholder">Password</label>
      </div>
      <button type="submit" class="submit">submit</button>
      <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red; text-align:center;'>Utilisateur ou mot de passe incorrect</p>";
                    } else if ($err==2){
                      echo "<p style='color:red; text-align:center;'>Utilisateur ou mot de passe vide</p>";
                    }
                }
                ?>
    </div>
    </form>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>