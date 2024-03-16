function insertData(type, crypto) {
    // Get the value of the stock price
    var stockPrice = document.getElementById(crypto).textContent;

    // Send the stock price to the PHP script using AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };

    if (type=='buy'){
      xhttp.open("POST", "insert_data_buy.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("stock_price=" + stockPrice + "&crypto_name=" + crypto);
      window.location = "insert_data_buy.php";
    } else {
      xhttp.open("POST", "insert_data_sell.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("stock_price=" + stockPrice + "&crypto_name=" + crypto);
      window.location = "insert_data_sell.php";
    }
}