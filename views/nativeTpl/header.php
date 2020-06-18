<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontawosome/css/all.css">
    <link rel="stylesheet" href="/css/main.css">
    <title><?php echo $pageData['title'] ?></title>
</head>

<body>
    <header class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-md-2 col-lg-2 col-xs-2 col-sm-2">
                    <div class="logo-wrapper">
                        <p>LOG<span>x</span> CRM</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6 col-lg-6">
                    <div class="date-wrapper">
                        <p class="date-now"></p>
                        
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-lg-4 col-sm-4 col-xs-4">
                    <div class="profile-wrapper">
                        <a href="/profile" class="link-profile">
                            <div class="name-wrapper">
                                <p><?php echo $_SESSION['user']['name'] ?> <?php echo $_SESSION['user']['lastName'] ?></p>
                               
                                
                            </div>
                        </a>
                        <p class="logout"><span><i class="fas fa-sign-out-alt"></i></span></p>
                    </div>
                </div>
            </div>
        </div>
    </header>