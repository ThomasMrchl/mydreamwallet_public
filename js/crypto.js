let ws = new WebSocket('wss://stream.binance.com:9443/ws/ethusdt@trade');
let stockPriceElement = document.getElementById('stock-price-eth');
let wscap = new WebSocket('wss://stream.binance.com:9443/ws/ethusdt@ticker');
let stockPriceElementcap = document.getElementById('market-cap-eth');
let ws2 = new WebSocket('wss://stream.binance.com:9443/ws/btcusdt@trade');
let stockPriceElement2 = document.getElementById('stock-price-btc');
let wscap2 = new WebSocket('wss://stream.binance.com:9443/ws/btcusdt@ticker');
let stockPriceElementcap2 = document.getElementById('market-cap-btc');
let ws3 = new WebSocket('wss://stream.binance.com:9443/ws/bnbusdt@trade');
let stockPriceElement3 = document.getElementById('stock-price-bnbbtc');
let wscap3 = new WebSocket('wss://stream.binance.com:9443/ws/bnbusdt@ticker');
let stockPriceElementcap3 = document.getElementById('market-cap-bnbbtc');
let ws4 = new WebSocket('wss://stream.binance.com:9443/ws/solusdt@trade');
let stockPriceElement4 = document.getElementById('stock-price-sol');
let wscap4 = new WebSocket('wss://stream.binance.com:9443/ws/solusdt@ticker');
let stockPriceElementcap4 = document.getElementById('market-cap-sol');
let ws5 = new WebSocket('wss://stream.binance.com:9443/ws/linkusdt@trade');
let stockPriceElement5 = document.getElementById('stock-price-link');
let wscap5 = new WebSocket('wss://stream.binance.com:9443/ws/linkusdt@ticker');
let stockPriceElementcap5 = document.getElementById('market-cap-link');
let ws6 = new WebSocket('wss://stream.binance.com:9443/ws/dotusdt@trade');
let stockPriceElement6 = document.getElementById('stock-price-dot');
let wscap6 = new WebSocket('wss://stream.binance.com:9443/ws/dotusdt@ticker');
let stockPriceElementcap6 = document.getElementById('market-cap-dot');
let ws7 = new WebSocket('wss://stream.binance.com:9443/ws/adausdt@trade');
let stockPriceElement7 = document.getElementById('stock-price-wbt');
let wscap7 = new WebSocket('wss://stream.binance.com:9443/ws/adausdt@ticker');
let stockPriceElementcap7 = document.getElementById('market-cap-wbt');
let ws8 = new WebSocket('wss://stream.binance.com:9443/ws/xrpusdt@trade');
let stockPriceElement8 = document.getElementById('stock-price-xrp');
let wscap8 = new WebSocket('wss://stream.binance.com:9443/ws/xrpusdt@ticker');
let stockPriceElementcap8 = document.getElementById('market-cap-xrp');
let ws9 = new WebSocket('wss://stream.binance.com:9443/ws/avaxusdt@trade');
let stockPriceElement9 = document.getElementById('stock-price-ava');
let wscap9 = new WebSocket('wss://stream.binance.com:9443/ws/avausdt@ticker');
let stockPriceElementcap9 = document.getElementById('market-cap-ava');
let lastPrice = null;
let lastcap = null;



stockPriceElement.innerText = 0;
stockPriceElement.style.color = 'purple';
stockPriceElementcap.innerText = '0%';
stockPriceElementcap.style.color = 'purple';
stockPriceElement2.innerText = 0;
stockPriceElement2.style.color = 'purple';
stockPriceElementcap2.innerText = '0%';
stockPriceElementcap2.style.color = 'purple';
stockPriceElement3.innerText = 0;
stockPriceElement3.style.color = 'purple';
stockPriceElementcap3.innerText = '0%';
stockPriceElementcap3.style.color = 'purple';
stockPriceElement4.innerText = 0;
stockPriceElement4.style.color = 'purple';
stockPriceElementcap4.innerText = '0%';
stockPriceElementcap4.style.color = 'purple';
stockPriceElement5.innerText = 0;
stockPriceElement5.style.color = 'purple';
stockPriceElementcap5.innerText = '0%';
stockPriceElementcap5.style.color = 'purple';
stockPriceElement6.innerText = 0;
stockPriceElement6.style.color = 'purple';
stockPriceElementcap6.innerText = '0%';
stockPriceElementcap6.style.color = 'purple';
stockPriceElement7.innerText = 0;
stockPriceElement7.style.color = 'purple';
stockPriceElementcap7.innerText = '0%';
stockPriceElementcap7.style.color = 'purple';
stockPriceElement8.innerText = 0;
stockPriceElement8.style.color = 'purple';
stockPriceElementcap8.innerText = '0%';
stockPriceElementcap8.style.color = 'purple';
stockPriceElement9.innerText = 0;
stockPriceElement9.style.color = 'purple';
stockPriceElementcap9.innerText = '0%';
stockPriceElementcap9.style.color = 'purple';

ws.onmessage = (event) => {
    let stockObject = JSON.parse(event.data);
    let price = parseFloat(stockObject.p).toFixed(2);
    stockPriceElement.innerText = price;
    stockPriceElement.style.color = !lastPrice || lastPrice === price ? 'green' : price >= lastPrice ? 'green' : 'red';
    lastPrice = price;
    wscap.onmessage = (event) => {
        let stockObject = JSON.parse(event.data);
        let pricecap = parseFloat(stockObject.p).toFixed(2);
        if ((pricecap * 100 / price)>0){
            stockPriceElementcap.innerText = '+' + (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap.style.color = 'green';
        } else {
            stockPriceElementcap.innerText = (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap.style.color = 'red';
        }
        lastcap = price;
    };
};


ws2.onmessage= (event) => {
    let stockObject = JSON.parse(event.data);
    let price = parseFloat(stockObject.p).toFixed(2);
    stockPriceElement2.innerText = price;
    stockPriceElement2.style.color = !lastPrice || lastPrice === price ? 'green' : price >= lastPrice ? 'green' : 'red';
    lastPrice = price;
    wscap2.onmessage = (event) => {
        let stockObject = JSON.parse(event.data);
        let pricecap = parseFloat(stockObject.p).toFixed(2);
        if ((pricecap * 100 / price)>0){
            stockPriceElementcap2.innerText = '+' + (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap2.style.color = 'green';
        } else {
            stockPriceElementcap2.innerText = (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap2.style.color = 'red';
        }
        lastcap = price;
    };
};

ws3.onmessage= (event) => {
    let stockObject = JSON.parse(event.data);
    let price = parseFloat(stockObject.p).toFixed(2);
    stockPriceElement3.innerText = price;
    stockPriceElement3.style.color = !lastPrice || lastPrice === price ? 'green' : price >= lastPrice ? 'green' : 'red';
    lastPrice = price;
    wscap3.onmessage = (event) => {
        let stockObject = JSON.parse(event.data);
        let pricecap = parseFloat(stockObject.p).toFixed(2);
        if ((pricecap * 100 / price)>0){
            stockPriceElementcap3.innerText = '+' + (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap3.style.color = 'green';
        } else {
            stockPriceElementcap3.innerText = (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap3.style.color = 'red';
        }
        lastcap = price;
    };
};

ws4.onmessage= (event) => {
    let stockObject = JSON.parse(event.data);
    let price = parseFloat(stockObject.p).toFixed(2);
    stockPriceElement4.innerText = price;
    stockPriceElement4.style.color = !lastPrice || lastPrice === price ? 'green' : price >= lastPrice ? 'green' : 'red';
    lastPrice = price;
    wscap4.onmessage = (event) => {
        let stockObject = JSON.parse(event.data);
        let pricecap = parseFloat(stockObject.p).toFixed(2);
        if ((pricecap * 100 / price)>0){
            stockPriceElementcap4.innerText = '+' + (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap4.style.color = 'green';
        } else {
            stockPriceElementcap4.innerText = (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap4.style.color = 'red';
        }
        lastcap = price;
    };
};

ws5.onmessage= (event) => {
    let stockObject = JSON.parse(event.data);
    let price = parseFloat(stockObject.p).toFixed(2);
    stockPriceElement5.innerText = price;
    stockPriceElement5.style.color = !lastPrice || lastPrice === price ? 'green' : price >= lastPrice ? 'green' : 'red';
    lastPrice = price;
    wscap5.onmessage = (event) => {
        let stockObject = JSON.parse(event.data);
        let pricecap = parseFloat(stockObject.p).toFixed(2);
        if ((pricecap * 100 / price)>0){
            stockPriceElementcap5.innerText = '+' + (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap5.style.color = 'green';
        } else {
            stockPriceElementcap5.innerText = (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap5.style.color = 'red';
        }
        lastcap = price;
    };
};

ws6.onmessage= (event) => {
    let stockObject = JSON.parse(event.data);
    let price = parseFloat(stockObject.p).toFixed(2);
    stockPriceElement6.innerText = price;
    stockPriceElement6.style.color = !lastPrice || lastPrice === price ? 'green' : price >= lastPrice ? 'green' : 'red';
    lastPrice = price;
    wscap6.onmessage = (event) => {
        let stockObject = JSON.parse(event.data);
        let pricecap = parseFloat(stockObject.p).toFixed(2);
        if ((pricecap * 100 / price)>0){
            stockPriceElementcap6.innerText = '+' + (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap6.style.color = 'green';
        } else {
            stockPriceElementcap6.innerText = (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap6.style.color = 'red';
        }
        lastcap = price;
    };
};

ws7.onmessage= (event) => {
    let stockObject = JSON.parse(event.data);
    let price = parseFloat(stockObject.p).toFixed(2);
    stockPriceElement7.innerText = price;
    stockPriceElement7.style.color = !lastPrice || lastPrice === price ? 'green' : price >= lastPrice ? 'green' : 'red';
    lastPrice = price;
    wscap7.onmessage = (event) => {
        let stockObject = JSON.parse(event.data);
        let pricecap = parseFloat(stockObject.p).toFixed(2);
        if ((pricecap * 100 / price)>0){
            stockPriceElementcap7.innerText = '+' + (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap7.style.color = 'green';
        } else {
            stockPriceElementcap7.innerText = (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap7.style.color = 'red';
        }
        lastcap = price;
    };
};

ws8.onmessage= (event) => {
    let stockObject = JSON.parse(event.data);
    let price = parseFloat(stockObject.p).toFixed(2);
    stockPriceElement8.innerText = price;
    stockPriceElement8.style.color = !lastPrice || lastPrice === price ? 'green' : price >= lastPrice ? 'green' : 'red';
    lastPrice = price;
    wscap8.onmessage = (event) => {
        let stockObject = JSON.parse(event.data);
        let pricecap = parseFloat(stockObject.p).toFixed(2);
        if ((pricecap)>0){
            stockPriceElementcap8.innerText = '+' + (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap8.style.color = 'green';
        } else {
            stockPriceElementcap8.innerText = (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap8.style.color = 'red';
        }
        lastcap = price;
    };
};

ws9.onmessage= (event) => {
    let stockObject = JSON.parse(event.data);
    let price = parseFloat(stockObject.p).toFixed(2);
    stockPriceElement9.innerText = price;
    stockPriceElement9.style.color = !lastPrice || lastPrice === price ? 'green' : price >= lastPrice ? 'green' : 'red';
    lastPrice = price;
    wscap9.onmessage = (event) => {
        let stockObject = JSON.parse(event.data);
        let pricecap = parseFloat(stockObject.p).toFixed(2);
        if ((pricecap * 100 / price)>0){
            stockPriceElementcap9.innerText = '+' + (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap9.style.color = 'green';
        } else {
            stockPriceElementcap9.innerText = (pricecap * 100 / price).toFixed(2) + '%';
            stockPriceElementcap9.style.color = 'red';
        }
        lastcap = price;
    };
};