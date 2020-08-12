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
            <div class="content-wrapper-transaction">
                <a class="add-transaction-link" href="#">Добавить</a>
                <div class="table-transaction">
                    <table class="table-transaction-wrapper">
                        <thead>
                            <td>Дата</td>
                            <td>Фирма</td>
                            <td>Заказчик</td>
                            <td>Маршрут</td>
                            <td>Сумма вход.</td>
                            <td>Форма оплаты</td>
                            <td>Дата оплаты</td>
                            <td>Сумма перевода</td>
                            <td>Доход</td>
                            
                        </thead>
                        <tbody>
                            <?php foreach ($pageData['dataTransaction'] as $key => $val) { ?>
                                <tr>
                                    <td><a href="#" class="active-change-trans" id="<?php echo $val['id'] ?>" val="0"><?php echo $val['date'] ?></a></td>
                                    <td><a href="#" class="active-change-trans" id="<?php echo $val['id'] ?>"val="1"><?php echo $val['company'] ?></a></td>
                                    <td><a href="#" class="active-change-trans active-id-company" id="<?php echo $val['id'] ?>"val="2"><?php echo $val['idComp'] ?></a></td>
                                    <td><a href="#" class="active-change-trans" id="<?php echo $val['id'] ?>"val="3"><?php echo $val['route'] ?></a></td>
                                    <td><a href="#" class="active-change-trans" id="<?php echo $val['id'] ?>"val="4"><?php echo $val['sumIns'] ?></a></td>
                                    <td><a href="#" class="active-change-trans" id="<?php echo $val['id'] ?>"val="5"><?php echo $val['formPay'] ?></a></td>
                                    <td><a href="#" class="active-change-trans" id="<?php echo $val['id'] ?>"val="6"><?php echo $val['datePay'] ?></a></td>
                                    <td><a href="#" class="active-change-trans" id="<?php echo $val['id'] ?>"val="7"><?php echo $val['sumPay'] ?></a></td>
                                    <td><a href="#" class="active-change-trans" id="<?php echo $val['id'] ?>"val="8"><?php 
                                        if ($_SESSION['user']['status'] == '3') {
                                            echo 'Недоступно';
                                        } else {
                                            echo $val['income'];
                                        }
                                    ?></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
        <div style="display: none;">
            <div class="wrapper-chnage-transaction box-modal">
                <form  class="change-trans-wrapper">
                    
                    <button type="submit">Редактировать</button>
                </form>
            </div>
        </div>
    </main>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/libs/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="/libs/articmodal/jquery.arcticmodal-0.3.min.js"></script>
    <script src="/js/transactions.js"></script>
    <script src="/js/main.user.js"></script>
</body>

</html>