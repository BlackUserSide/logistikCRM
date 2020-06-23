<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/fontawosome/css/all.css">
    <link rel="stylesheet" href="/css/main.css">
    <title><?php echo $pageData['title'] ?></title>
</head>

<body>
    <main class="main-login">
        <div class="image-wrapper">
            <img src="/img/bg-login.png" alt="">
        </div>
        <div class="login-wrapper">
           <form class="login-form">
               <h1 class="h1">Вход в CRM</h1>
               <p class="error-form"></p> 
               <label>Логин</label><br>
               <input type="text" name="login" id="loginInp" required><br>
               <label>Пароль</label><br>
               <input type="password" name="password" id="passwordInp" required><br>
               <button class="btn-login">Вход <span class="login-loader"><i class="fas fa-sync-alt"></i></span></button>
               
           </form>
           <div class="logo-created">
               <img src="/img/LogX.png" alt="">
           </div>
        </div>
    </main>
   
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/login.js"></script>

</body>

</html>