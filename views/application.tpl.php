<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/libs/articmodal/jquery.arcticmodal-0.3.css">
    <link rel="stylesheet" href="/libs/articmodal/themes/simple.css">
    <link rel="stylesheet" href="/libs/DataTables-1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/fontawosome/css/all.css">
    <link rel="stylesheet" href="/css/main.css">
    <title><?php echo $pageData['title'] ?></title>
</head>

<body>
    <main class="cabinet-main">
        <div class="navbar-wrapper">
            <div class="top-line-navbar">
                <img src="/img/footer-logo 1.png" alt="">
            </div>
            <nav class="navbar-nav">
                <ul>
                    <li class="home-link"><a href="/cabinet"><i class="fas fa-home"></i>Главная</a></li>
                    <li class="task-link"><a href="/cabinet/task"><i class="fas fa-clipboard"></i>Задачи</a></li>
                    <li class="clients-link"><a href="/cabinet/clients"><i class="fas fa-user-friends"></i>Клиенты</a></li>
                    <li class="add-link"><a href="/cabinet/users"><i class="fas fa-plus-square"></i>Сотрудники</a></li>
                    <li class="setings-link"><a href="/cabinet/application"><i class="fas fa-cog"></i>Заявки</a></li>
                    <li class="setings-link"><a href="/cabinet/transactions"><i class="fas fa-money-check-alt"></i>Сделки</a></li>
                    <li><a href="#" class="log-out-user"><i class="fas fa-sign-out-alt"></i>Выйти</a></li>
                </ul>
            </nav>
        </div>
        <div class="content-wrapper">
            <div class="header-content">
                <h1 class="h1"><?php echo $pageData['titleMain'] ?></h1>
                <div class="open-task-wrapper">
                    <p class="task-open"><a href="/cabinet/task"><?php echo $pageData['countTask'] ?> активных заданий</a></p>
                </div>
                <div class="search-wrapper">
                    <input type="text" name="search-wrapper" placeholder="Поиск" id="searchInput">
                    <a href="#" class="start-search"><i class="fas fa-search"></i></a>
                </div>
                <div class="notifiction-profile">
                    <a href="#" class="notification-link"> <span class="count-notif"></span> <i class="fas fa-bell"></i><span></span></a>
                    <a href="/profile" class="profile-link"><?php echo substr($_SESSION['user']['name'], 0, 1) ?></a>
                </div>
            </div>
            <div class="content-application">
                <div class="table-wrapper-app">
                    <table class="main-table-app">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Откуда</td>
                                <td>Куда</td>
                                <td>Тип Груза</td>
                                <td>Вес/Объем</td>
                                <td>Имя</td>
                                <td>Позвонить</td>
                                <td>Текст</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pageData['dataApplication'] as $key => $val) { ?>
                                <tr>
                                    <td><?php echo $val['id'] ?></td>
                                    <td><?php echo $val['fromWhere'] ?></td>
                                    <td><?php echo $val['whereFrom'] ?></td>
                                    <td><?php echo $val['typeCargo'] ?></td>
                                    <td><?php echo $val['widtch'] ?></td>
                                    <td><?php echo $val['name'] ?></td>
                                    <td><a href="#" class="call-to-number-app" number="<?php echo $val['phone'] ?>"><i class="fas fa-phone-volume"></i></a></td>
                                    <td><a href="#" class="show-text-link" id="<?php echo $val['id'] ?>"><?php echo substr($val['text'], 0, 32) ?>..</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="display: none">
            <div class="hidden-full-text-app box-modal">
                <p></p>
            </div>
        </div>
    </main>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/libs/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="/libs/articmodal/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/application.js"></script>
    <script src="/js/main.user.js"></script>
</body>

</html>