<?php include ROOT . '/views/nativeTpl/header.php' ?>
<?php include ROOT . '/views/nativeTpl/navbar.php' ?>
<section class="task-s">
    <div class="task-low">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="task-container">
                        <div class="top-line-task">
                            <p>Задачи</p>
                            <a href="#" class="update-task-main"><i class="fas fa-sync-alt update-link-s"></i>Обновить</a>
                        </div>
                        <div class="task-item">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php foreach($pageData['taskData'] as $key => $val) { ?>
                                        <div class="col-xl-4 col-md-4 col-lg-4 col-sm-4">
                                            <div class="wrapper-task-box" style="border: 2px solid #b5071c">
                                                <div class="top-line-wrapper-item" style="background-color: #b5071c;">
                                                    <p>Выполнить до: <?php echo $val['dateOver'] ?></p>
                                                </div>
                                                <div class="text-task">
                                                    <p><?php echo substr($val['textTask'], 0, 40) ?>...</p>
                                                </div>
                                                <div class="name-user">
                                                    <p class="get-name"></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</section>




<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/cabinet.js"></script>
</body>

</html>