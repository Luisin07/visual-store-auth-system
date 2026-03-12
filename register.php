<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

$baseUrl = "/visual-ecommerce-test/";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($name) && !empty($email) && !empty($password)) {
        $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $result = $checkEmail->get_result();

        if ($result->num_rows > 0) {
            $message = "Este email já está cadastrado.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute()) {
                header("Location: " . $baseUrl . "login.php?success=1");
                exit();
            } else {
                $message = "Erro ao cadastrar usuário.";
            }

            $stmt->close();
        }

        $checkEmail->close();
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
    <title>Cadastro - Demo Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #198754, #75d69c);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
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
            color: #198754;
        }

        .small-link {
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="card auth-card p-4">
    <div class="card-body">
        <div class="text-center mb-4">
            <h2 class="brand-title">Demo Store</h2>
            <p class="text-muted mb-0">Crie sua conta</p>
        </div>

        <?php if (!empty($message)) : ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" placeholder="Digite seu nome" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" placeholder="Crie uma senha" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Cadastrar</button>
        </form>

        <div class="text-center mt-3">
            <p class="mb-2">
                Já possui conta?
                <a href="<?php echo $baseUrl; ?>login.php" class="small-link">Fazer login</a>
            </p>

            <a href="<?php echo $baseUrl; ?>index.php" class="small-link">Voltar para a loja</a>
        </div>
    </div>
</div>

</body>
</html>