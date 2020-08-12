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
            <div class="header-client">

                <div class="logo-client">
                    <?php if (!empty($pageData['getDataComp'])) : ?>
                        <p>Компании</p>
                    <?php elseif (!empty($pageData['getDataCar'])) : ?>
                        <p>Перевозчики</p>
                    <?php else : ?>
                        <p>Маршруты</p>
                    <?php endif ?>
                </div>
                <div class="links-header-client-wrapper">
                    <a href="/cabinet/clients" <?php if (empty($_GET)) : ?> class="active" <?php endif ?>>Компании</a>
                    <a href="/cabinet/clients?cli=carriers" <?php if ($_GET['cli'] === 'carriers') : ?> class="active" <?php endif ?>>Перевозчики</a>
                    <a href="/cabinet/clients?cli=routes" <?php if ($_GET['cli'] === 'routes') : ?> class="active" <?php endif ?>>Маршруты</a>
                    <a href="#" class="link-add-client-wrapper">+</a>
                </div>
            </div>
            <a href="#" class="send-all">Отправить всем</a>
            <a href="#" class="take-call-wrapper"><i class="fas fa-phone-volume"></i></a>
            <div class="table-wrapper-clients">

                <?php if (!empty($pageData['getDataComp'])) : ?>
                    <table class="table-wrapper" data-page-length='5'>
                        <thead>
                            <tr>
                                <td>Номер</td>
                                <td>Компания</td>
                                <td>Страна</td>
                                <td>Город</td>
                                <td>Контактное лицо</td>
                                <td>Статус</td>
                                <td>Отправить письмо</td>
                                <td>Звонок</td>
                                <td>Удалить</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($pageData['getDataComp'] as $key => $val) { ?>
                                <tr>
                                    <td>
                                        <?php echo $val['id'] ?>
                                    </td>
                                    <td>
                                        <a href="/cabinet/card?id=<?php echo $val['id'] ?>&ref=comp"><?php echo $val['nameCompany'] ?></a>
                                    </td>
                                    <td>
                                        <p><?php echo $val['country'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $val['city'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $val['nameContat'] ?></p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php if ($val['statusCli'] == '0') : ?>
                                                <span class="orange-stat-table"></span>
                                            <?php elseif ($val['statusCli'] == '1') : ?>
                                                <span class="green-stat-table"></span>
                                            <?php elseif ($val['statusCli'] == '2') : ?>
                                                <span class="red-stat-table"></span>
                                            <?php endif ?>
                                        </p>
                                    </td>
                                    <td><a href="#" class="sends-mails-one" mail="<?php echo $val['mail'] ?>"><i class="fas fa-envelope"></i></a></td>
                                    <td><a href="#" class="call-link-comp" number="<?php echo $val['phone'] ?>"><i class="fas fa-phone-volume"></i></a></td>
                                    <td><a href="#" class="dell-link-comp" data-event="company" id="<?php echo $val['id'] ?>"><i class="fas fa-minus-circle"></i></a></td>
                                </tr>
                            <?php  } ?>
                        </tbody>

                    </table>
                <?php elseif (!empty($pageData['getDataCar'])) : ?>
                    <table class="table-wrapper" data-page-length='5'>
                        <thead>
                            <tr>
                                <td>Номер</td>
                                <td>Водитель</td>
                                <td>Марка</td>
                                <td>Номер</td>
                                <td>Тип Траспорта</td>
                                <td>Кубантура</td>
                                <td>Статус</td>
                                <td>Звонок</td>
                                <td>Удалить</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($pageData['getDataCar'] as $key => $val) { ?>
                                <tr>
                                    <td><?php echo $val['id'] ?></td>
                                    <td>
                                        <a href="/cabinet/card?id=<?php echo $val['id'] ?>&ref=carr"><?php echo $val['nameDriver'] ?></a>
                                    </td>
                                    <td>
                                        <p><?php echo $val['carModel'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $val['carNumber'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $val['typeCar'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $val['cubeCar'] ?></p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php if ($val['statusCli'] == '0') : ?>
                                                <span class="orange-stat-table"></span>
                                            <?php elseif ($val['statusCli'] == '1') : ?>
                                                <span class="green-stat-table"></span>
                                            <?php elseif ($val['statusCli'] == '2') : ?>
                                                <span class="red-stat-table"></span>
                                            <?php endif ?>
                                        </p>
                                    </td>
                                    <td><a href="#" class="call-link-comp" number="<?php echo $val['driverContacts'] ?>"><i class="fas fa-phone-volume"></i></a></td>
                                    <td><a href="#" class="dell-link-comp" data-event="carrier" id="<?php echo $val['id'] ?>"><i class="fas fa-minus-circle"></i></a></td>
                                </tr>
                            <?php  } ?>
                        </tbody>

                    </table>
                <?php else : ?>
                    <table class="table-wrapper" data-page-length='5'>
                        <thead>
                            <tr>
                                <td>Номер</td>
                                <td>Маршрут</td>
                                <td>Цена</td>
                                <td>Километры</td>
                                <td>Компания</td>

                                <td>Удалить</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($pageData['getDataRoutes'] as $key => $val) { ?>
                                <tr>
                                    <td>
                                        <a href="/cabinet/card?id=<?php echo $val['id'] ?>&ref=routes"><?php echo $val['id'] ?></a>
                                    </td>
                                    <td>
                                        <p><?php echo $val['rote'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $val['price'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $val['kilometers'] ?></p>
                                    </td>
                                    <td>
                                        <p class="id-comp-wrapper"><?php echo $val['idComp'] ?></p>
                                    </td>

                                    <td><a href="#" class="dell-link-comp" data-event="routes" id="<?php echo $val['id'] ?>"><i class="fas fa-minus-circle"></i></a></td>
                                </tr>
                            <?php  } ?>
                        </tbody>

                    </table>
                <?php endif ?>
            </div>






        </div>
        <div style="display: none;">
            <div class="hidden-add-clients box-modal">
                <div class="link-add-hidden-client">
                    <a href="#" class="add-company">Добавить компанию</a>
                    <a href="#" class="add-routes">Добавить маршрут</a>
                    <a href="#" class="add-carr">Добавить перевозчика</a>
                    <div class="box-modal_close arcticmodal-close" style="font-size: 22px;">X</div>
                </div>
            </div>
        </div>
        <div style="display: none">
            <div class="hidden-add-company box-modal">
                <form class="add-form-company">
                    <h3 class="h3">Добавить компанию</h3>
                    <p class="error-form-add"></p>
                    <div class="input-label-wrapper-hidden">
                        <label>Название компании</label><br>
                        <input type="text" name="nameCompany" id="nameCompany" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Страна</label><br>

                        <input type="text" name="country" required>

                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Город</label><br>
                        <input type="text" name="city" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Контактное лицо</label><br>
                        <input type="text" name="contactName" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Телефон</label><br>
                        <input type="text" name="phone">
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Почта</label><br>
                        <input type="text" name="email" id="mailValidate">
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Почтовый адресс</label><br>
                        <input type="text" name="adress">
                    </div>
                    <button type="submit">Добавить</button>
                </form>
                <div class="box-modal_close arcticmodal-close" style="font-size: 22px;">X</div>
            </div>
        </div>
        <div style="display: none">
            <div class="hidden-add-routes box-modal">
                <form class="add-form-routes">
                    <h3 class="h3">Добавить маршрут</h3>
                    <p class="error-form-add"></p>
                    <div class="input-label-wrapper-hidden">
                        <label>Маршрут(Откуда-Куда)</label><br>
                        <input type="text" name="routes" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Цена(500UAN)</label><br>

                        <input type="text" name="price" required>

                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Расстояние</label><br>
                        <input type="text" name="kilometers" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Номер компании</label><br>
                        <input type="text" name="idComp" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Номер Перевозчика(Необязательно)</label><br>
                        <input type="text" name="idCarr">
                    </div>
                    <button type="submit">Добавить</button>
                </form>
                <div class="box-modal_close arcticmodal-close" style="font-size: 22px;">X</div>
            </div>
        </div>
        <div style="display: none">
            <div class="hidden-add-carrier box-modal">
                <form class="add-form-carrier">
                    <h3 class="h3">Добавить Перевозчика</h3>
                    <p class="error-form-add"></p>
                    <div class="input-label-wrapper-hidden">
                        <label>Модель автомобиля</label><br>
                        <input type="text" name="carModel" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Номер Автомобиля</label><br>

                        <input type="text" name="carNumber" required>

                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Имя водителя</label><br>
                        <input type="text" name="nameDriver" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Номер водителя</label><br>
                        <input type="text" name="driverContact" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Тип Транспорта</label><br>
                        <input type="text" name="typeCar" required>
                    </div>
                    <div class="input-label-wrapper-hidden">
                        <label>Кубантура</label><br>
                        <input type="text" name="cubes">
                    </div>
                    <button type="submit">Добавить</button>
                </form>
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
        <div style="display: none">
            <div class="hidden-send-mail box-modal">
                <form class="send-mail-form">
                    <h3 class="h3"></h3>
                    <input type="hidden" name="mail" id="mailSend" value="">
                    <textarea name="textMail" cols="30" rows="10"></textarea>
                    <button type="submit">Отправить</button>
                    <div class="box-modal_close arcticmodal-close" style="font-size: 22px;">X</div>
                </form>
            </div>
        </div>
        <div style="display: none">
            <div class="hidden-send-mails box-modal">
                <form class="send-mail-form-all">
                    <h3 class="h3">Отправить письмо всем</h3>

                    <textarea name="textMail" cols="30" rows="10"></textarea>
                    <button type="submit">Отправить</button>
                    <div class="box-modal_close arcticmodal-close" style="font-size: 22px;">X</div>
                </form>
            </div>
        </div>
        <div style="display: none;">
            <div class="hidden-form-call-number box-modal">
                <form class="call-to-number">
                    <label for="numberCall">Введите номер телефона</label>
                    <input type="text" onkeyup="testStr(this);testJump(this);" maxlength="20" name="number" id="numberCall" required>
                    <button type="submit"><i class="fas fa-phone-volume"></i></button>
                </form>
                <div class="wrapperr-card">
                    <p id="p-link-trigger">Такой компании нет. <a href="#" id="link-trigger">Добавить?</a></p>
                </div>
            </div>
        </div>
        <div style="display: none;">
            <div class="add-button-transaction box-modal">
                <p>Вы хотите добавить сделку?</p>
                <a href="#" class="link-add-transaction-clients">Добавить</a>
                <a href="#" class="close-link-add-transaction">Закрыть</a>
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
    <script type="text/javascript">
        function testJump(x) {
            var ml = ~~x.getAttribute('maxlength');
            if (ml && x.value.length >= ml) {
                do {
                    x = x.nextSibling;
                }
                while (x && !(/text/.test(x.type)));
                if (x && /text/.test(x.type)) {
                    x.focus();
                }
            }
        }

        function testStr(input) {
            var value = input.value;
            var rep = /[-\.;":'a-zA-Zа-яА-Я]/;
            if (rep.test(value)) {
                value = value.replace(rep, '');
                input.value = value;
            }
        }
    </script>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/libs/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="/libs/articmodal/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/clients.js"></script>
    <script src="/js/validate.js"></script>
    <script src="/js/main.user.js"></script>
</body>

</html>