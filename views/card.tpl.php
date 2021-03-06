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
            <div class="content-card">
                <h3 class="h3">Карточка
                    <?php if ($_GET['ref'] == 'comp') : ?>
                        компании
                    <?php elseif ($_GET['ref'] == 'routes') : ?>
                        маршрута
                    <?php else : ?>
                        перевозчика
                    <?php endif ?>
                </h3>
                <div class="content-card-wrapper">
                    <div class="composition-card">
                        <?php if ($_GET['ref'] == 'comp') : ?>
                            <?php foreach ($pageData['dataCard'] as $key => $val) { ?>
                                <div class="name-composition">
                                    <h3 class="h3"><?php echo $val['nameCompany'] ?></h3>
                                    <p class="status-card">
                                        <?php if ($val['statusCli'] == '0') : ?>
                                            <a href="#" class="link-change-status-cli"><span class="orange-stat-table"></span></a>
                                        <?php elseif ($val['statusCli'] == '1') : ?>
                                            <a href="#" class="link-change-status-cli"><span class="green-stat-table"></span></a>
                                        <?php elseif ($val['statusCli'] == '2') : ?>
                                            <a href="#" class="link-change-status-cli"><span class="red-stat-table"></span></a>
                                        <?php endif ?>
                                    </p>
                                </div>
                                <div class="composition-main-card">
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Страна</p>
                                        <p class="past-p"><?php echo $val['country'] ?></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Город</p>
                                        <p class="past-p"><?php echo $val['city'] ?></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Телефон</p>
                                        <p class="past-p"><a href="#" number="<?php echo $val['phone'] ?>" class="link-call-card"><?php echo $val['phone'] ?></a></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">E-mail</p>
                                        <p class="past-p"><a href="#"><?php echo $val['mail'] ?></a></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Адресс</p>
                                        <p class="past-p"><?php echo $val['adress'] ?></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Документы</p>
                                        <p class="past-p"><a href="#" class="link-docs"><?php echo $pageData['countDocs'] ?></a></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Маршруты</p>
                                        <p class="past-p"><a href="#" class="link-routes"><?php echo $pageData['countRoutes'] ?></a></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Сделки</p>
                                        <p class="past-p"><a href="#" class="link-add-transaction" id="<?php echo $val['nameCompany'] ?>"><?php echo $pageData['countTransaction'] ?></a></p>
                                    </div>
                                </div>
                                <a href="#" class="dell-card" ref="comp" id-card="<?php echo $val['id'] ?>">Удалить карточку</a>
                            <?php  } ?>

                        <?php elseif ($_GET['ref'] == 'routes') : ?>
                            <?php foreach ($pageData['dataCard'] as $key => $val) { ?>
                                <div class="name-composition">
                                    <h3 class="h3"><?php echo $val['rote'] ?></h3>
                                    <p class="status-card">
                                        <?php if ($val['statusCli'] == '0') : ?>
                                            <a href="#" class="link-change-status-cli"><span class="orange-stat-table"></span></a>
                                        <?php elseif ($val['statusCli'] == '1') : ?>
                                            <a href="#" class="link-change-status-cli"><span class="green-stat-table"></span></a>
                                        <?php elseif ($val['statusCli'] == '2') : ?>
                                            <a href="#" class="link-change-status-cli"><span class="red-stat-table"></span></a>
                                        <?php endif ?>
                                    </p>
                                </div>
                                <div class="composition-main-card">
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Цена</p>
                                        <p class="past-p"><?php echo $val['price'] ?></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Компания</p>
                                        <p class="past-p id-comp-p" id="<?php echo $val['idComp'] ?>"></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Перевозчик</p>
                                        <p class="past-p id-carr-p" id="<?php echo $val['idCarr'] ?>"></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Документы</p>
                                        <p class="past-p"><a href="#"><?php echo $pageData['countDocs'] ?></a></p>
                                    </div>

                                </div>
                                <a href="#" class="dell-card" ref="routes" id-card="<?php echo $val['id'] ?>">Удалить карточку</a>
                            <?php  } ?>
                        <?php else : ?>
                            <?php foreach ($pageData['dataCard'] as $key => $val) { ?>
                                <div class="name-composition">
                                    <h3 class="h3"><?php echo $val['nameDriver'] ?></h3>
                                </div>
                                <div class="composition-main-card">
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Модель машины</p>
                                        <p class="past-p"><?php echo $val['carModel'] ?></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Номер машины</p>
                                        <p class="past-p"><?php echo $val['carNumber'] ?></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Контакты водителя</p>
                                        <p class="past-p"><a href="#" class="link-call-card" number="<?php echo $val['driverContacts'] ?>"><?php echo $val['driverContacts'] ?></a></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Кубатура</p>
                                        <p class="past-p"><?php echo $val['cubeCar'] ?></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Тип машины</p>
                                        <p class="past-p"><?php echo $val['typeCar'] ?></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Фотографии</p>
                                        <p class="past-p"><a href=""><?php echo $val['photo'] ?></a></p>
                                    </div>
                                    <div class="item-composition">
                                        <p class="opacitiy-p">Маршруты</p>
                                        <p class="past-p"><a href="#" class="link-routes"><?php echo $pageData['countRoutes'] ?></a></p>
                                    </div>

                                </div>

                                <a href="#" class="dell-card" ref="carr" id-card="<?php echo $val['id'] ?>">Удалить карточку</a>
                            <?php  } ?>
                        <?php endif ?>
                    </div>
                    <div class="comments-wrapper">
                        <?php if ($_GET['ref'] == 'comp') : ?>
                            <div class="comments-wrapper-s">
                                <h3 class="h3">Комментарии</h3>
                                <div class="commets-composit">
                                    <form class="input-wrapper-comments">
                                        <input type="hidden" name='ref' value="<?php echo $_GET['id'] ?>" id="id-inp">
                                        <input type="hidden" name='ref' value="0" id="ref-inp">
                                        <input type="text" name="commentsText" id="commentsText" placeholder="Введите текст" required>
                                        <button type="submit"><i class="fab fa-telegram-plane"></i></button>
                                    </form>
                                </div>
                                <div class="comments-list">
                                    <?php if (!empty($pageData['comments'])) : ?>
                                        <?php foreach ($pageData['comments'] as $key => $val) { ?>
                                            <div class="item-comments" id-user="<?php echo $val['idUser'] ?>">
                                                <p class="name-comments" id=""></p>
                                                <p class="text-comments"><?php echo $val['text'] ?></p>
                                                <a href="#" class="dell-comments" id="<?php echo $val['id'] ?>">X</a>
                                            </div>
                                        <?php } ?>
                                    <?php else : ?>
                                        <div class="item-comments" id-user="<?php echo $val['idUser'] ?>">
                                            <p>Комментариев еще нет</p>

                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php elseif ($_GET['ref'] == 'routes') : ?>
                            <div class="comments-wrapper-s">
                                <h3 class="h3">Комментарии</h3>
                                <div class="commets-composit">
                                    <form class="input-wrapper-comments">
                                        <input type="hidden" name='ref' value="<?php echo $_GET['id'] ?>" id="id-inp">
                                        <input type="hidden" name='ref' value="1" id="ref-inp">
                                        <input type="text" name="commentsText" id="commentsText" placeholder="Введите текст" required>
                                        <button type="submit"><i class="fab fa-telegram-plane"></i></button>
                                    </form>
                                </div>
                                <div class="comments-list">
                                    <?php if (!empty($pageData['comments'])) : ?>
                                        <?php foreach ($pageData['comments'] as $key => $val) { ?>
                                            <div class="item-comments" id-user="<?php echo $val['idUser'] ?>">
                                                <p class="name-comments" id=""></p>
                                                <p class="text-comments"><?php echo $val['text'] ?></p>
                                                <a href="#" class="dell-comments" id="<?php echo $val['id'] ?>">X</a>
                                            </div>
                                        <?php } ?>
                                    <?php else : ?>
                                        <div class="item-comments" id-user="<?php echo $val['idUser'] ?>">
                                            <p>Комментариев еще нет</p>

                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="comments-wrapper-s">
                                <h3 class="h3">Комментарии</h3>
                                <div class="commets-composit">
                                    <form class="input-wrapper-comments">
                                        <input type="hidden" name='ref' value="<?php echo $_GET['id'] ?>" id="id-inp">
                                        <input type="hidden" name='ref' value="2" id="ref-inp">
                                        <input type="text" name="commentsText" id="commentsText" placeholder="Введите текст" required>
                                        <button type="submit"><i class="fab fa-telegram-plane"></i></button>
                                    </form>
                                </div>
                                <div class="comments-list">
                                    <?php if (!empty($pageData['comments'])) : ?>
                                        <?php foreach ($pageData['comments'] as $key => $val) { ?>
                                            <div class="item-comments" id-user="<?php echo $val['idUser'] ?>">
                                                <p class="name-comments" id=""></p>
                                                <p class="text-comments"><?php echo $val['text'] ?></p>
                                                <a href="#" class="dell-comments" id="<?php echo $val['id'] ?>">X</a>
                                            </div>
                                        <?php } ?>
                                    <?php else : ?>
                                        <div class="item-comments" id-user="<?php echo $val['idUser'] ?>">
                                            <p>Комментариев еще нет</p>

                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>



        <div style="display: none;">
            <div class="hidden-list-routes box-modal">
                <?php foreach ($pageData['dataRoutesId'] as $key => $val) { ?>
                    <div class="item-routes-hidden">
                        <a href="/cabinet/card/?id=<?php echo $val['id'] ?>&ref=routes">
                            <p class="number-route-h">Номер маршрута: <span><?php echo $val['id'] ?></span> </p>
                            <p class="route-text-h">Направление: <span><?php echo $val['rote'] ?></span></p>
                            <p class="price-h">Цена: <span><?php echo $val['price'] ?></span></p>
                            <p class="kil-m-h">Киллометраж: <span><?php echo $val['kilometers'] ?></span></p>
                            <p clas="name-company" id="<?php echo $val['idComp'] ?>"></p>
                        </a>
                    </div>
                    <div class="box-modal_close arcticmodal-close" style="font-size:22px">X</div>
                <?php } ?>
            </div>
        </div>
        <div style="display: none;">
            <div class="hidden-list-docs box-modal">
                <div class="docs-wrapper">
                    <?php foreach ($pageData['docs'] as $key => $val) { ?>
                        <div class="item-docs-wrapper">
                            <a href="/docs/<?php echo $val['nameDocs'] ?>">
                                <img src="/img/google-docs.png" alt="">
                                <p><?php echo $val['nameDocs'] ?></p>
                                <a href="#" id="<?php echo $val['id'] ?>" name-doc="<?php echo $val['nameDocs'] ?>" class="dell-docs">Удалить</a>
                            </a>
                        </div>
                    <?php } ?>
                    <a href="#" class="add-docs">+</a>
                </div>
                <div class="box-modal_close arcticmodal-close" style="font-size:22px">X</div>
            </div>
        </div>
        <div style="display: none">
            <div class="hidden-form-add-docs box-modal">
                <form class="add-docs-form" method="POST" enctype="multipart/form-data">
                    <input type="file" name="docs" id="docsInput" required><br>
                    <input type="submit" value="Загрузить">
                </form>
            </div>
        </div>
        <div style="display: none;">
            <div class="hidden-change-status-clis box-modal">
                <div class="link-wrapper-hidden-cli">
                    <input type="hidden" id="idCardChange" value="<?php echo $_GET['id'] ?>">
                    <input type="hidden" id="refCardChange" value="<?php echo $_GET['ref'] ?>">
                    <a href="#" class="change-status-link-hid" val="1">Хороший клиент</a><br>
                    <a href="#" class="change-status-link-hid" val="0">Стандар</a><br>
                    <a href="#" class="change-status-link-hid" val="2">Плохой клиент</a><br>
                </div>

            </div>

        </div>
        <div style="display: none;">
            <div class="hidden-add-transaction box-modal">
                <form class="form-add-transaction">
                    <div class="label-wrapper-transaction">
                        <label>Дата</label><br>
                        <input type="text" name="date" id="dateTransaction" required>
                        
                    </div>
                    <div class="label-wrapper-transaction">
                        <label>Фирма</label><br>
                        <input type="text" name="company" id="companyTransaction" required>
                    </div>
                    <div class="label-wrapper-transaction">
                        <label>Заказчик</label><br>
                        <input type="text" name="customer" id="customerTransaction" required>
                    </div>
                    <div class="label-wrapper-transaction">
                        <label>Маршрут</label><br>
                        <input type="text" name="route" id="routeTransaction" required>
                    </div>
                    <div class="label-wrapper-transaction">
                        <label>Сумма входа</label><br>
                        <input type="text" name="sumIn" id="sumInTransaction" required>
                    </div>
                    <div class="label-wrapper-transaction">
                        <label>Форма оплаты</label><br>
                        <input type="text" name="formPay" id="formPayTransaction" required>
                    </div>
                    <div class="label-wrapper-transaction">
                        <label>Дата оплаты</label><br>
                        <input type="text" name="datePay" id="datePayTransaction" required>
                    </div>
                    <div class="label-wrapper-transaction">
                        <label>Сумма оплаты</label><br>
                        <input type="text" name="sumPay" id="sumPayTransaction" required>
                    </div>
                    <div class="label-wrapper-transaction">
                        <label>Доходы</label><br>
                        <input type="text" name="income" id="incomeTransaction" required>
                    </div>
                    <button type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </main>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/libs/articmodal/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/card.js"></script>
    <script src="/js/main.user.js"></script>
</body>

</html>