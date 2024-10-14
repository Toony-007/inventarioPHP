<?php
require 'db/db_config.php';

$query = $pdo->query("SELECT * FROM productos");
$productos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Productos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Inventario de Productos</h1>
        <p>Administra y consulta el inventario con una interfaz intuitiva y moderna</p>
    </header>

    <!-- Slider de Tarjetas -->
    <section class="cards-section">
        <h2>Productos en Inventario</h2>
        <div class="slider">
            <button class="slider-btn" onclick="prevCard()">&#10094;</button>
            <div class="card-container">
                <?php foreach ($productos as $producto): ?>
                    <div class="card">
                        <div class="card-icon">📦</div>
                        <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
                        <p><strong>Categoría:</strong> <?= htmlspecialchars($producto['categoria']) ?></p>
                        <p><strong>Cantidad:</strong> <?= htmlspecialchars($producto['cantidad']) ?></p>
                        <p><strong>Precio:</strong> $<?= htmlspecialchars($producto['precio']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="slider-btn" onclick="nextCard()">&#10095;</button>
        </div>
    </section>

    <!-- Tabla de Inventario -->
    <section class="table-section">
        <h2>Tabla de Inventario</h2>
        <input type="text" id="searchInput" placeholder="Buscar productos..." onkeyup="filterTable()">
        <button onclick="sortTable()">Ordenar por Nombre</button>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody id="productTable">
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td><?= htmlspecialchars($producto['categoria']) ?></td>
                        <td><?= htmlspecialchars($producto['cantidad']) ?></td>
                        <td>$<?= htmlspecialchars($producto['precio']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div id="pagination">
            <button onclick="prevPage()">Anterior</button>
            <span id="pageNumber">1</span>
            <button onclick="nextPage()">Siguiente</button>
        </div>
    </section>

    <script src="js/scripts.js"></script>
</body>
</html>
