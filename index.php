<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .hero {
            background: #0d6efd;
            color: white;
            padding: 60px;
            border-radius: 20px;
            margin-top: 30px;
        }

        .hero img {
            max-width: 100%;
            border-radius: 10px;
        }

        .product-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: 0.3s;
            border: none;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        footer {
            background: #111;
            color: white;
            padding: 40px;
            margin-top: 60px;
        }

        .navbar .user-name {
            font-weight: 600;
            margin-right: 12px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="index.php">Visual Store</a>

        <form class="d-flex w-50" onsubmit="return false;">
            <input id="searchInput" class="form-control me-2" placeholder="Buscar produtos">
            <button class="btn btn-primary" type="button" onclick="filterProducts()">Buscar</button>
        </form>

        <div class="d-flex align-items-center">
            <?php if (isset($_SESSION["user_id"])): ?>
                <span class="user-name">Olá, <?php echo htmlspecialchars($_SESSION["user_name"]); ?></span>
                <a href="dashboard.php" class="btn btn-outline-primary me-2">Dashboard</a>
                <a href="logout.php" class="btn btn-danger">Sair</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-outline-primary me-2">Entrar</a>
                <a href="register.php" class="btn btn-primary">Cadastrar</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container">
    <div class="hero">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1>Monte seu setup ideal</h1>
                <p>
                    Produtos selecionados para trabalho, estudo e entretenimento.
                    Tecnologia moderna com excelente custo-benefício.
                </p>
                <a href="#produtos" class="btn btn-light mt-3">Ver produtos</a>
            </div>

            <div class="col-lg-6 text-center">
                <img src="assets/images/banner.jpg" alt="Banner principal">
            </div>
        </div>
    </div>

    <h2 class="mt-5 mb-4">Produtos em destaque</h2>

    <div class="row g-4" id="produtos">

        <div class="col-md-4 product-item">
            <div class="card product-card">
                <img src="assets/images/notebook.jpg" alt="Notebook">
                <div class="card-body">
                    <h5>Notebook Ultra Performance</h5>
                    <p class="text-muted">Ideal para estudo e produtividade.</p>
                    <h5 class="text-primary">R$ 3499,90</h5>
                    <button class="btn btn-primary w-100">Comprar</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 product-item">
            <div class="card product-card">
                <img src="assets/images/mouse.jpg" alt="Mouse Gamer">
                <div class="card-body">
                    <h5>Mouse Gamer RGB</h5>
                    <p class="text-muted">Alta precisão e design moderno.</p>
                    <h5 class="text-primary">R$ 149,90</h5>
                    <button class="btn btn-primary w-100">Comprar</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 product-item">
            <div class="card product-card">
                <img src="assets/images/keyboard.jpg" alt="Teclado mecânico">
                <div class="card-body">
                    <h5>Teclado Mecânico Pro</h5>
                    <p class="text-muted">Conforto e resposta rápida.</p>
                    <h5 class="text-primary">R$ 289,90</h5>
                    <button class="btn btn-primary w-100">Comprar</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 product-item">
            <div class="card product-card">
                <img src="assets/images/monitor.jpg" alt="Monitor">
                <div class="card-body">
                    <h5>Monitor Full HD 24"</h5>
                    <p class="text-muted">Imagem nítida para trabalho e jogos.</p>
                    <h5 class="text-primary">R$ 899,90</h5>
                    <button class="btn btn-primary w-100">Comprar</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 product-item">
            <div class="card product-card">
                <img src="assets/images/headphone.jpg" alt="Headphone">
                <div class="card-body">
                    <h5>Headphone Bluetooth</h5>
                    <p class="text-muted">Som imersivo e bateria longa.</p>
                    <h5 class="text-primary">R$ 379,90</h5>
                    <button class="btn btn-primary w-100">Comprar</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 product-item">
            <div class="card product-card">
                <img src="assets/images/watch.jpg" alt="Smartwatch">
                <div class="card-body">
                    <h5>Smartwatch Fit Plus</h5>
                    <p class="text-muted">Monitoramento e conectividade.</p>
                    <h5 class="text-primary">R$ 459,90</h5>
                    <button class="btn btn-primary w-100">Comprar</button>
                </div>
            </div>
        </div>

    </div>
</div>

<footer>
    <div class="container text-center">
        <h4>Visual Store</h4>
        <p>Projeto de demonstração de uma loja virtual.</p>
        <p>© 2026 Todos os direitos reservados</p>
    </div>
</footer>

<script>
function filterProducts() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let products = document.querySelectorAll(".product-item");

    products.forEach(product => {
        let text = product.innerText.toLowerCase();

        if (text.includes(input)) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
}
</script>

</body>
</html>