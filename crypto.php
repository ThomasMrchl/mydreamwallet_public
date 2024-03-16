<!DOCTYPE html>
<head>
    <title>My Dream Wallet</title>
    <link rel="stylesheet" href="css/style_crypto.css">
    <link rel="icon" type="image/png" href="images/logotest.png">
    <meta name="Description" content="mydreamwallet" />
    <?php include("menu.php"); ?>
</head>
<body>

<?php
$message_argent = "Vous n'êtes pas connecté";
$qbtc = "Pas de compte";
$qeth = "Pas de compte";
$qbnbbtc = "Pas de compte";
$qsol = "Pas de compte";
$qlink = "Pas de compte";
$qdot = "Pas de compte";
$qwbt = "Pas de compte";
$qxrp = "Pas de compte";
$qava = "Pas de compte";
if (isset ($_SESSION['pseudo'])){
  $messageargent = "Vous disposez de ".$_SESSION['money']."€";
  $q_btc = $_SESSION['q_btc'];
  $q_eth = $_SESSION['q_eth'];
  $q_bnbbtc = $_SESSION['q_bnb'];
  $q_sol = $_SESSION['q_sol'];
  $q_link = $_SESSION['q_link'];;
  $q_dot = $_SESSION['q_dot'];
  $q_wbt = $_SESSION['q_wbt'];
  $q_xrp = $_SESSION['q_xrp'];
  $q_ava = $_SESSION['q_ava'];
} else {
  $messageargent = $message_argent;
  $q_btc = $qbtc;
  $q_eth = $qeth;
  $q_bnbbtc = $qbnbbtc;
  $q_sol = $qsol;
  $q_link = $qlink;
  $q_dot = $qdot;
  $q_wbt = $qwbt;
  $q_xrp = $qxrp;
  $q_ava = $qava;
}
          
?>

<div class="title">Investir en Cryptomonnaies</div>
<div class="subtitle">Dans la prochaine mise à jour, vous pourrez acheter plusieurs cryptos d'un seul coup ! promis !</div>
<div class="subtitle" style='color:white;'><?php echo $messageargent; ?></div>
<?php 

if(isset($_GET['erreur'])){
  $err = $_GET['erreur'];
  if($err==1){
    echo "<p style='color:red; text-align:center; font-size: 2em;'>Veuillez attendre l'affichage du prix</p>";
  } else if ($err==2){
    echo "<p style='color:red; text-align:center; font-size: 2em;'>Vous n'avez pas assez d'argent !</p>";
  } else if ($err==3){
    echo "<p style='color:red; text-align:center; font-size: 2em;'>Autre problème 2</p>";
  }
}
?>

<div class="container">
  <table class="responsive-table">
    <thead>
      <tr>
        <th scope="col">Crypto - MDW</th>
        <th scope="col">NOM</th></th>
        <th scope="col">%UP/DOWN 24h</th>
        <th scope="col">Quantité</th>
        <th scope="col">Prix</th>
        <th scope="col">Acheter</th>
        <th scope="col">Vendre</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"><img src='https://s2.coinmarketcap.com/static/img/coins/64x64/1.png' alt='btc' style="display:block; margin-left: auto; margin-right: auto;"></th>
        <td data-title="Released">BITCOIN</td>
        <td data-title="Studio" id="market-cap-btc">//</td>
        <td data-title="Worldwide Gross" style="color:purple;" data-type="currency"><?php echo $q_btc; ?></td>
        <td data-title="Domestic Gross" data-type="currency" id="stock-price-btc">BTC</td>
        <td data-title="International Gross" data-type="currency"><button class="button-green" onclick="insertData('buy', 'stock-price-btc')">Buy</button></td>
        <td data-title="Budget" data-type="currency"><button class="button-red" onclick="insertData('sell', 'stock-price-btc')">Sell</button></td>
      </tr>
      <tr>
        <th scope="row"><img src='https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png' alt='btc' style="display:block; margin-left: auto; margin-right: auto;"></th>
        <td data-title="Released">ETHEREUM</td>
        <td data-title="Studio" id="market-cap-eth">//</td>
        <td data-title="Worldwide Gross" style="color:purple;" data-type="currency"><?php echo $q_eth; ?></td>
        <td data-title="Domestic Gross" data-type="currency" id="stock-price-eth">ETH</td>
        <td data-title="International Gross" data-type="currency"><button class="button-green" onclick="insertData('buy', 'stock-price-eth')">Buy</button></td>
        <td data-title="Budget" data-type="currency"><button class="button-red" onclick="insertData('sell', 'stock-price-eth')">Sell</button></td>
      </tr>
      <tr>
        <th scope="row"><img src='https://s2.coinmarketcap.com/static/img/coins/64x64/1839.png' alt='btc' style="display:block; margin-left: auto; margin-right: auto;"></th>
        <td data-title="Released">BINANCE USD</td>
        <td data-title="Studio" id="market-cap-bnbbtc">//</td>
        <td data-title="Worldwide Gross" style="color:purple;" data-type="currency"><?php echo $q_bnbbtc; ?></td>
        <td data-title="Domestic Gross" data-type="currency" id="stock-price-bnbbtc">BNBC</td>
        <td data-title="International Gross" data-type="currency"><button class="button-green" onclick="insertData('buy', 'stock-price-bnbbtc')">Buy</button></td>
        <td data-title="Budget" data-type="currency"><button class="button-red" onclick="insertData('sell', 'stock-price-bnbbtc')">Sell</button></td>
      </tr>
       <tr>
        <th scope="row"><img src='https://s2.coinmarketcap.com/static/img/coins/64x64/5426.png' alt='btc' style="display:block; margin-left: auto; margin-right: auto;"></th>
        <td data-title="Released">SOLANA</td>
        <td data-title="Studio" id="market-cap-sol">//</td>
        <td data-title="Worldwide Gross" style="color:purple;" data-type="currency"><?php echo $q_sol; ?></td>
        <td data-title="Domestic Gross" data-type="currency" id="stock-price-sol">SOL</td>
        <td data-title="International Gross" data-type="currency"><button class="button-green" onclick="insertData('buy', 'stock-price-sol')">Buy</button></td>
        <td data-title="Budget" data-type="currency"><button class="button-red" onclick="insertData('sell', 'stock-price-sol')">Sell</button></td>
      </tr>
      <tr>
        <th scope="row"><img src='https://s2.coinmarketcap.com/static/img/coins/64x64/1975.png' alt='btc' style="display:block; margin-left: auto; margin-right: auto;"></th>
        <td data-title="Released">CHAIN LINK</td>
        <td data-title="Studio" id="market-cap-link">//</td>
        <td data-title="Worldwide Gross" style="color:purple;" data-type="currency"><?php echo $q_link; ?></td>
        <td data-title="Domestic Gross" data-type="currency" id="stock-price-link">LINK</td>
        <td data-title="International Gross" data-type="currency"><button class="button-green" onclick="insertData('buy', 'stock-price-link')">Buy</button></td>
        <td data-title="Budget" data-type="currency"><button class="button-red" onclick="insertData('sell', 'stock-price-link')">Sell</button></td>
      </tr>
      <tr>
        <th scope="row"><img src='https://s2.coinmarketcap.com/static/img/coins/64x64/6636.png' alt='btc' style="display:block; margin-left: auto; margin-right: auto;"></th>
        <td data-title="Released">POLKA DOT</td>
        <td data-title="Studio" id="market-cap-dot">//</td>
        <td data-title="Worldwide Gross" style="color:purple;" data-type="currency"><?php echo $q_dot; ?></td>
        <td data-title="Domestic Gross" data-type="currency" id="stock-price-dot">DOT</td></td>
        <td data-title="International Gross" data-type="currency"><button class="button-green" onclick="insertData('buy', 'stock-price-dot')">Buy</button></td>
        <td data-title="Budget" data-type="currency"><button class="button-red" onclick="insertData('sell', 'stock-price-dot')">Sell</button></td>
      </tr>
      <tr>
        <th scope="row"><img src='https://s2.coinmarketcap.com/static/img/coins/64x64/2010.png' alt='btc' style="display:block; margin-left: auto; margin-right: auto;"></th>
        <td data-title="Released">CARDANO</td>
        <td data-title="Studio" id="market-cap-wbt">//</td>
        <td data-title="Worldwide Gross" style="color:purple;" data-type="currency"><?php echo $q_wbt; ?></td>
        <td data-title="Domestic Gross" data-type="currency" id="stock-price-wbt">ADA</td>
        <td data-title="International Gross" data-type="currency"><button class="button-green" onclick="insertData('buy', 'stock-price-wbt')">Buy</button></td>
        <td data-title="Budget" data-type="currency"><button class="button-red" onclick="insertData('sell', 'stock-price-wbt')">Sell</button></td>
      </tr>
      <tr>
        <th scope="row"><img src='https://s2.coinmarketcap.com/static/img/coins/64x64/52.png' alt='btc' style="display:block; margin-left: auto; margin-right: auto;"></th>
        <td data-title="Released">XRP</td>
        <td data-title="Studio" id="market-cap-xrp">//</td>
        <td data-title="Worldwide Gross" style="color:purple;" data-type="currency"><?php echo $q_xrp; ?></td>
        <td data-title="Domestic Gross" data-type="currency" id="stock-price-xrp">XRP</td>
        <td data-title="International Gross" data-type="currency"><button class="button-green" onclick="insertData('buy', 'stock-price-xrp')">Buy</button></td>
        <td data-title="Budget" data-type="currency"><button class="button-red" onclick="insertData('sell', 'stock-price-xrp')">Sell</button></td>
      </tr>
      <tr>
        <th scope="row"><img src='https://s2.coinmarketcap.com/static/img/coins/64x64/5805.png' alt='btc' style="display:block; margin-left: auto; margin-right: auto;"></th>
        <td data-title="Released">AVALANCHE</td>
        <td data-title="Studio" id="market-cap-ava">//</td>
        <td data-title="Worldwide Gross" style="color:purple;" data-type="currency"><?php echo $q_ava; ?></td>
        <td data-title="Domestic Gross" data-type="currency" id="stock-price-ava">AVAX</td>
        <td data-title="International Gross" data-type="currency"><button class="button-green" onclick="insertData('buy', 'stock-price-ava')">Buy</button></td>
        <td data-title="Budget" data-type="currency"><button class="button-red" onclick="insertData('sell', 'stock-price-ava')">Sell</button></td>
      </tr>
    </tbody>
  </table>
</div>
<script src='js/insert.js'></script>
<script src='js/crypto.js'></script>
<?php include("footer.php"); ?>
</body>
</html>