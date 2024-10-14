let currentIndex = 0;
const cardContainer = document.querySelector(".card-carousel");
const cards = document.querySelectorAll(".card");

function showSlide(index) {
    const offset = -index * cards[0].offsetWidth;
    cardContainer.style.transform = `translateX(${offset}px)`;
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % cards.length;
    showSlide(currentIndex);
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + cards.length) % cards.length;
    showSlide(currentIndex);
}

function filterCards() {
    const input = document.getElementById("cardSearchInput").value.toUpperCase();
    cards.forEach(card => {
        const text = card.innerText.toUpperCase();
        card.style.display = text.includes(input) ? "" : "none";
    });
}
