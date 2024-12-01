document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', () => {
        alert(`Profil: ${card.querySelector('h2').textContent}`);
    });
});
