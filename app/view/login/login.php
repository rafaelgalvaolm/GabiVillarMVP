<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="gabiVillar/public/css/login/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="gabiVillar/public/js/login/login.js" defer></script>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card login-card">
        <img src="../../../public/images/logo.png" class="card-img-top mx-auto d-block" alt="Logo">
        <div class="card-body">
            <form action="/gabiVillar/login/autenticar" method="post">
                <div class="form-group">
                    <label for="inputUsuario">usuario</label>
                    <input type="text" class="form-control" id="inputUsuario" name="username" aria-describedby="usuarioHelp">
                </div>
                <div class="form-group">
                    <label for="inputSenha">senha</label>
                    <input type="password" class="form-control" id="inputSenha" name="password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/layout/_toast.php'; ?>
