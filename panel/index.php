<?php require('settings/config.php'); 

if($_GET['logout'])
{
    session_destroy();
    header('location: http://localhost/panel/login');
}
if($_SESSION["user_admin"] == 0){
    header('location: http://localhost/panel/login');
	
}

?>
<!doctype html>
<html lang="tr">
<head>
    <?php $_SESSION["user_admin"] ?> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Modd Group Google Locator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
<link href="main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                Modd Group
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
        </div>       
                
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    
                <?php include("sidebar.php"); ?>
                </div>    
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-pin icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>

                                    <div>
                                        Google Store Locator
                                        <div class="page-title-subheading">
                                            Bu paneli kullanarak bayileriniz veya mağazalarınız için harita bulucu hazırlayabilirsiniz.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="mb-3 card card-body"><h5 class="card-title">Mağazalar</h5> Mağazaları yönetin ve yenilerini ekleyin<br><br>
                                    <a href="http://localhost/panel/store_list.php"><button class="btn btn-primary">Listele</button></a>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="mb-3 card card-body"><h5 class="card-title">Lokasyonlar</h5> Lokasyonları yönetin ve yenilerini ekleyin<br><br>
                                    <a href="http://localhost/panel/location_view.php"><button class="btn btn-primary">Listele</button></a>
                                </div>
                            </div>
                        </div>           
                    </div>


                <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>

