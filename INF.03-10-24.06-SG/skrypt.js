// Funkcja do obsługi kliknięć na cytaty
function toggleQuotes(clickedId) {
    // Pobieramy wszystkie elementy cytatów
    const quote1 = document.getElementById('cite1');
    const quote2 = document.getElementById('cite2');
    const quote3 = document.getElementById('cite3');
    
    // Na podstawie kliknięcia zmieniamy widoczność cytatów
    if (clickedId === 'cite1') {
        quote1.style.display = 'none';  // Ukryj pierwszy cytat
        quote2.style.display = 'block'; // Pokaż drugi cytat
    } else if (clickedId === 'cite2') {
        quote2.style.display = 'none';  // Ukryj drugi cytat
        quote3.style.display = 'block'; // Pokaż trzeci cytat
    } else if (clickedId === 'cite3') {
        quote3.style.display = 'none';  // Ukryj trzeci cytat
        quote1.style.display = 'block'; // Pokaż pierwszy cytat
    }
}

// Dodajemy nasłuch na kliknięcia dla każdego cytatu
document.getElementById('cite1').addEventListener('click', function() {
    toggleQuotes('cite1');
});
document.getElementById('cite2').addEventListener('click', function() {
    toggleQuotes('cite2');
});
document.getElementById('cite3').addEventListener('click', function() {
    toggleQuotes('cite3');
});