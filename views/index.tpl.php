<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontawosome/css/all.css">
    <link rel="stylesheet" href="/css/main.css">
    <title><?php echo $pageData['title'] ?></title>
</head>

<body>
    
    <main class="main-login">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <div class="login-wrapper">
                        <form class="form-login">
                            <div class="logo-form-login">
                                <h3 class="h3">Вход</h3>
                                <p>LogXCrm</p>
                            </div>
                            <p class="error-form" style="display:none"></p>
                            <div class="input-wrapper">
                                <input type="text" name="login" id="login" autocomplete="off">
                                <span class="placeholder-input" id="login-span">Логин</span>
                            </div><br>
                            <div class="input-wrapper">
                                <input type="password" name="password" id="password" autocomplete="off">
                                <span class="placeholder-input"id="password-span">Пароль</span>
                            </div><br>
                            <button class="btn-login">Войти</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/login.js"></script>

</body>

</html>