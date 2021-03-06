<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/fontawosome/css/all.css">
    <link rel="stylesheet" href="/css/main.css">
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
                    <li class="home-link"><a href="/cabinet" ><i class="fas fa-home"></i>Главная</a></li>
                    <li class="task-link"><a href="/cabinet/task" ><i class="fas fa-clipboard"></i>Задачи</a></li>
                    <li class="clients-link"><a href="/cabinet/clients" ><i class="fas fa-user-friends"></i>Клиенты</a></li>
                    <li class="add-link"><a href="/cabinet/users" ><i class="fas fa-plus-square"></i>Сотрудники</a></li>
                    <li class="setings-link"><a href="/cabinet/application" ><i class="fas fa-cog"></i>Заявки</a></li>
                    <li class="setings-link"><a href="/cabinet/transactions" ><i class="fas fa-money-check-alt"></i>Сделки</a></li>
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
            <div class="content-task">
                <div class="close-task">
                    <h1 class="h1">Выполненые</h1>
                    <?php if (!empty($pageData['closeTask'])) : ?>
                        <?php foreach ($pageData['closeTask'] as $key => $val) { ?>
                            <div class="task-item-wrapper">
                                <p class="name-give" id="<?php echo $val['id_Give'] ?>"></p>
                                <p class="task-text"><?php echo substr($val['textTask'], 0, 40) ?>...</p>
                                <a href="#" class="name-substr"></a>
                                <p class="tag-task"><?php echo $val['tagTask'] ?></p>
                                <p class="status-task"><i class="far fa-check-circle"></i></p>
                            </div>
                        <?php } ?>
                    <?php else : ?>
                        <p>На данный момент задачи отсутствуют</p>
                    <?php endif ?>

                </div>
                <div class="active-task">
                    <h1 class="h1">Активные</h1>
                    <?php if (!empty($pageData['activeTask'])) : ?>
                        <?php foreach ($pageData['activeTask'] as $key => $val) { ?>
                            <div class="task-item-wrapper">
                                <p class="name-give" id="<?php echo $val['id_Give'] ?>"></p>
                                <p class="task-text"><?php echo substr($val['textTask'], 0, 40) ?>...</p>
                                <a href="#" class="name-substr"></a>
                                <p class="tag-task"><?php echo $val['tagTask'] ?></p>
                                <p class="status-task"><i class="far fa-check-circle"></i></p>
                            </div>
                        <?php } ?>
                    <?php else : ?>
                        <p>На данный момент активные задачи отсутствуют</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div style="display: none">
            <div class="hidden-notification box-modal">
                <div class="list-notification">
                    <a href="#" id="clearNotif">Очистить</a>
                    <ul>
                        
                    </ul>
                </div>
                <div class="box-modal_close arcticmodal-close" style="font-size: 22px;">X</div>                    
            </div>
        </div>
    </main>
    

    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/libs/articmodal/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/cabinet.js"></script>
    <script src="/js/main.user.js"></script>
</body>

</html>