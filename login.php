<?php
session_start();
include("connection.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($email) && !empty($password)) {
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                header("Location: dashboard.php");
                exit();
            } else {
                $message = "Senha incorreta.";
            }
        } else {
            $message = "Usuário não encontrado.";
        }

        $stmt->close();
    } else {
        $message = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Demo Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #6ea8fe);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
        }

        .btn {
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
        }

        .brand-title {
            font-weight: 700;
            color: #0d6efd;
        }

        .small-link {
            text-decoration: none;
            font-weight: 500;
        }

        .success-alert {
            position: absolute;
            top: 20px;
            width: 100%;
            max-width: 420px;
        }
    </style>
</head>
<body>

<?php if (isset($_GET["success"])): ?>
<div class="success-alert">
    <div class="alert alert-success text-center shadow-sm">
        Cadastro realizado com sucesso! Faça login.
    </div>
</div>
<?php endif; ?>

<div class="card auth-card p-4">
    <div class="card-body">
        <div class="text-center mb-4">
            <h2 class="brand-title">Demo Store</h2>
            <p class="text-muted mb-0">Acesse sua conta</p>
        </div>

        <?php if (!empty($message)) : ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" placeholder="Digite sua senha" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>

        <div class="text-center mt-3">
            <p class="mb-1">Ainda não tem conta?
                <a href="register.php" class="small-link">Cadastre-se</a>
            </p>
            <a href="index.php" class="small-link">Voltar para a loja</a>
        </div>
    </div>
</div>

</body>
</html>