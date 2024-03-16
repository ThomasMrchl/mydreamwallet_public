// On récupère tous les liens d'utilisateur
const userLinks = document.querySelectorAll('.user-link');

// On ajoute un gestionnaire d'événements "click" à chaque lien
userLinks.forEach(userLink => {
    userLink.addEventListener('click', e => {
        e.preventDefault(); // On empêche le comportement par défaut du lien
        const pseudo = userLink.dataset.pseudo;
        window.location.href = `user.php?pseudo=${pseudo}`; // On redirige vers la page user.php avec le pseudo en paramètre GET
    });
});