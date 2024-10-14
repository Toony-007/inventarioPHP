// Variables globales para la paginación y el slider de tarjetas
let currentPage = 1;
let currentCardIndex = 0;
const rowsPerPage = 10;
const cardsPerPage = 3;

// Filtro de búsqueda mejorado
function filterTable() {
    const input = document.getElementById("searchInput").value.toUpperCase();
    const rows = document.getElementById("productTable").getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        let match = false;
        for (let j = 0; j < cells.length; j++) {
            if (cells[j] && cells[j].innerText.toUpperCase().includes(input)) {
                match = true;
                break;
            }
        }
        rows[i].style.display = match ? "" : "none";
    }
}

// Ordenar la tabla por nombre
function sortTable() {
    const table = document.getElementById("productTable");
    let rows = Array.from(table.rows);
    rows.sort((a, b) => a.cells[0].innerText.localeCompare(b.cells[0].innerText));
    rows.forEach(row => table.appendChild(row));
}

// Funciones de paginación para la tabla
function paginateTable() {
    const rows = document.getElementById("productTable").getElementsByTagName("tr");
    const pageCount = Math.ceil(rows.length / rowsPerPage);
    for (let i = 0; i < rows.length; i++) {
        rows[i].style.display = (i >= (currentPage - 1) * rowsPerPage && i < currentPage * rowsPerPage) ? "" : "none";
    }
    document.getElementById("pageNumber").innerText = currentPage;
}

function nextPage() {
    const rows = document.getElementById("productTable").getElementsByTagName("tr");
    if (currentPage < Math.ceil(rows.length / rowsPerPage)) {
        currentPage++;
        paginateTable();
    }
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        paginateTable();
    }
}

// Funciones de navegación del slider de tarjetas
function showCards() {
    const cards = document.querySelectorAll(".card");
    cards.forEach((card, index) => {
        card.style.display = (index >= currentCardIndex && index < currentCardIndex + cardsPerPage) ? "block" : "none";
    });
}

function nextCard() {
    const cards = document.querySelectorAll(".card");
    if (currentCardIndex + cardsPerPage < cards.length) {
        currentCardIndex += cardsPerPage;
        showCards();
    }
}

function prevCard() {
    if (currentCardIndex - cardsPerPage >= 0) {
        currentCardIndex -= cardsPerPage;
        showCards();
    }
}

// Inicialización de funciones
paginateTable();
showCards();
