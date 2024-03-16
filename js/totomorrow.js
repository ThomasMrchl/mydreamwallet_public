function updateCountdown() {
    // Obtenir la date et l'heure actuelles
    var now = new Date();

    // Obtenir la date et l'heure de fin de journée
    var endOfDay = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1, 0, 0, 0);

    // Calculer le temps restant jusqu'à la fin de la journée
    var timeLeft = endOfDay.getTime() - now.getTime();

    // Convertir le temps restant en heures, minutes et secondes
    var hours = Math.floor(timeLeft / (1000 * 60 * 60));
    var minutes = Math.floor((timeLeft / (1000 * 60)) % 60);
    var seconds = Math.floor((timeLeft / 1000) % 60);

    // Afficher le temps restant
    var countdownElement = document.getElementById("countdown");
    countdownElement.innerHTML = hours + " heures, " + minutes + " minutes, " + seconds + " secondes";
  }

  // Mettre à jour le compte à rebours toutes les secondes
  setInterval(updateCountdown, 1000);