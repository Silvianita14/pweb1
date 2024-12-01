// Menambahkan fitur pencarian
const searchInput = document.getElementById('search');
const cards = document.querySelectorAll('.card');

searchInput.addEventListener('input', () => {
    const query = searchInput.value.toLowerCase();

    cards.forEach(card => {
        const name = card.querySelector('h2').textContent.toLowerCase();
        const department = card.querySelector('p').textContent.toLowerCase();

        if (name.includes(query) || department.includes(query)) {
            card.style.display = ''; // Tampilkan kartu
        } else {
            card.style.display = 'none'; // Sembunyikan kartu
        }
    });
});
