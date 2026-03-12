<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Demo Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7fb;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .dashboard-wrapper {
            padding: 50px 0;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #0d6efd, #3d8bfd);
            color: white;
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 12px 30px rgba(13, 110, 253, 0.18);
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .dashboard-header p {
            margin: 0;
            font-size: 1.05rem;
            opacity: 0.95;
        }

        .info-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
            height: 100%;
        }

        .info-card .card-body {
            padding: 28px;
        }

        .info-label {
            font-size: 0.95rem;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .info-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #212529;
        }

        .section-box {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
            padding: 30px;
            margin-top: 30px;
        }

        .section-box h3 {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .section-box p {
            color: #6c757d;
            margin-bottom: 20px;
        }

        .action-buttons .btn {
            border-radius: 12px;
            padding: 12px 18px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container dashboard-wrapper">

    <div class="dashboard-header">
        <h1>Área do Cliente</h1>
        <p>Bem-vindo, <strong><?php echo htmlspecialchars($_SESSION["user_name"]); ?></strong>. Seu acesso foi realizado com sucesso.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card info-card">
                <div class="card-body">
                    <div class="info-label">Status da conta</div>
                    <div class="info-value">Ativa</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card info-card">
                <div class="card-body">
                    <div class="info-label">Tipo de acesso</div>
                    <div class="info-value">Cliente autenticado</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card info-card">
                <div class="card-body">
                    <div class="info-label">Sessão</div>
                    <div class="info-value">Em andamento</div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-box">
        <h3>Painel de navegação</h3>
        <p>
            Esta é uma área restrita do sistema, acessível apenas para usuários autenticados.
            A partir daqui, você pode retornar à loja ou encerrar sua sessão com segurança.
        </p>

        <div class="action-buttons d-flex flex-wrap gap-3">
            <a href="index.php" class="btn btn-primary">Voltar para a loja</a>
            <a href="logout.php" class="btn btn-outline-danger">Sair</a>
        </div>
    </div>

</div>

</body>
</html>