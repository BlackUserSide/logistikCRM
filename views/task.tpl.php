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
                    <li class="nav-link home-link"><a href="/cabinet"><i class="fas fa-home"></i>Главная</a></li>
                    <li class="nav-link task-link"><a href="/cabinet/task"><i class="fas fa-clipboard"></i>Задачи</a></li>
                    <li class="nav-link clients-link"><a href="/cabinet/clients"><i class="fas fa-user-friends"></i>Клиенты</a></li>
                    <li class="nav-link add-link"><a href="/cabinet/users"><i class="fas fa-plus-square"></i>Сотрудники</a></li>
                    <li class="nav-link setings-link"><a href="/cabinet/declare"><i class="fas fa-cog"></i>Заявки</a></li>
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

            <div class="task-content-wrapper">
                <div class="add-task-link">+</div>
                <?php if (!empty($pageData['getTaskUser'])) : ?>
                    <?php foreach ($pageData['getTaskUser'] as $key => $val) { ?>
                        <div class="task-item-wrapper" id="<?php echo $val['id'] ?>">
                            <p class="name-give" id="<?php echo $val['id_Give'] ?>"></p>
                            <p class="task-text"><?php echo substr($val['textTask'], 0, 40) ?>...</p>
                            <a href="#" class="name-substr" id="<?php $val['id_Give'] ?>"></a>
                            <p class="tag-task"><?php echo $val['tagTask'] ?></p>
                            <p class="status-task">
                                <?php if ($val['status'] == '1') : ?>
                                    <i style="color: #24FF00" class="far fa-check-circle"></i>
                                <?php elseif ($val['status'] == '0') : ?>
                                    <i style="color: #FFD600" class="far fa-clock"></i>
                                <?php endif ?>

                            </p>
                        </div>
                    <?php } ?>
                <?php else : ?>
                    <p>Задачи в данный момент отсутствуют</p>
                <?php endif ?>
            </div>
        </div>
        <div style="display: none">
            <div class="hidden-card-task box-modal">
                <div class="text-container">
                    <p class="str-name-hidden"></p>
                    <p class="name-hidden-task"></p>
                    <p class="status-hidden-task"></p>
                    <p class="data-hidden-task-wrapper"><i class="far fa-check-circle"></i><span class="data-hidden-task"></span></p>
                    <p class="tegs-task-hidden-wrapper"><i class="far fa-clipboard"></i><span class="tegs-task-hidden"></span></p>
                </div>
                <div class="text-hidden-wrapper">
                    <p class="text-task-hidden"></p>
                </div>
                <a href="#" class="btn-hidden-task" id="">Выполнено</a>
                <a href="#" class="dell-hidden-task" style="display: none;" id="">Удалить</a>
                <div class="box-modal_close arcticmodal-close" style="font-size: 22px;">X</div>
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
        <div style="display: none;">
            <div class="hidden-add-taks box-modal">
                <form class="add-form-task">
                    <h3 class="h3">Добавить задачу</h3>
                    <p class="error-form-add"></p>
                    <div class="input-label-wrapper-hidden">
                        <label>Текст задачи</label><br>
                        <input type="text" name="textTusk" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Тег Задачи</label><br>

                        <input type="text" name="tageTask" required>

                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Введите номер исполнителя</label><br>
                        <input type="text" name="idUser" id="nameSearch" required><br>

                    </div>
                    <button type="submit">Добавить</button>
                </form>
                <div class="box-modal_close arcticmodal-close" style="font-size: 22px;">X</div>
            </div>
        </div>
        
    </main>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/libs/articmodal/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/task.js"></script>
    <script src="/js/main.user.js"></script>
</body>

</html>