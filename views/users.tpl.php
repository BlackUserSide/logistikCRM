<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/fontawosome/css/all.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/libs/DataTables-1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/libs/articmodal/jquery.arcticmodal-0.3.css">
    <link rel="stylesheet" href="/libs/articmodal/themes/simple.css">
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
                    <a href="#" class="notification-link"><span class="count-notif"></span><i class="fas fa-bell"></i><span></span></a>
                    <a href="/profile" class="profile-link"><?php echo substr($_SESSION['user']['name'], 0, 1) ?></a>
                </div>
            </div>
            <div class="content-main-users">
                <a href="#" class="add-user-link">Добавить</a>
                <table class="table-users">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Логин</td>
                            <td>Имя</td>
                            <td>Фамилия</td>
                            <td>e-mail</td>
                            <td>Должность</td>
                            <?php if ($_SESSION['user']['status'] == '1') : ?>
                                <td>Действия</td>
                            <?php endif  ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pageData['usersList'] as $key => $val) { ?>
                            <tr>
                                <td><?php echo $val['id'] ?></td>
                                <td><?php echo $val['login'] ?></td>
                                <td><?php echo $val['name'] ?></td>
                                <td><?php echo $val['lastName'] ?></td>
                                <td><?php echo $val['email'] ?></td>
                                <td>
                                    <?php if ($val['status'] == '2') : ?>
                                        Сотрудник
                                    <?php else : ?>
                                        Администратор
                                    <?php endif ?>
                                </td>
                                <?php if ($_SESSION['user']['status'] == '1') : ?>
                                    <td>
                                        <a href="#" class="action-list-users" id="<?php echo $val['id'] ?>">Управлять</a>
                                    </td>
                                <?php endif  ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="display: none;">
            <div class="hidden-action-nick box-modal">
                <div class="actiun-users">

                    <a href="#" class="dell-user-h">Удалить</a>
                    <a href="#" class="change-status-h">Изменить статус</a>

                </div>
                <div class="box-modal_close arcticmodal-close" style="font-size: 22px;">X</div>
            </div>
        </div>
        <div style="display: none;">
            <div class="hidden-add-user box-modal">
                <form class="add-user">
                    <div class="input-label-add-user">
                        <label>Логин</label><br>
                        <input type="text" name="login" required>
                    </div>
                    <div class="input-label-add-user">
                        <label>Имя</label><br>
                        <input type="text" name="name" required>
                    </div>
                    <div class="input-label-add-user">
                        <label>Фамилия</label><br>
                        <input type="text" name="lastName" required>
                    </div>
                    <div class="input-label-add-user">
                        <label>email</label><br>
                        <input type="text" name="email" required>
                    </div>
                    <div class="input-label-add-user">
                        <label>Пароль</label><br>
                        <input type="text" name="password" required>
                    </div>
                    <div class="input-label-add-user">
                        <label>Линия Binotel</label><br>
                        <input type="text" name="servNumber" required>
                    </div>

                    <button type="submit">Зарегистрировать</button>
                </form>
            </div>
        </div>
    </main>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/libs/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="/libs/articmodal/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/users.js"></script>
    <script src="/js/main.user.js"></script>
</body>

</html>