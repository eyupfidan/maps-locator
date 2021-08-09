<?php require('settings/config.php'); 
   if($_SESSION["user_admin"] == 0){
    header('location: http://localhost/panel/login');
   }
if(empty($_GET['konum_id']))
{
    header('location: http://localhost/panel/location_view.php');

}
$konum_id = $_GET['konum_id'];
$get_konum = $db->query("SELECT * FROM locations WHERE konum_id = $konum_id ", PDO::FETCH_ASSOC);
$get_single_konum  = $get_konum -> fetch();
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Konumları Düzenle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
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
                                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>

                                    <div>
                                        Konum Düzenle
                                        <div class="page-title-subheading">
                                            Buradan mevcut konumu düzenleyebilirsiniz.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Yeni Konum Ekle">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>    
                            </div>
                        </div>
                        <div class="row" style="padding: 15px">
                            <div class="main-card col-sm-12 card">
                                <div class="card-body">
                                
                                    <form method="post" action="http://localhost/panel/action/location_edit.php?konum_id=<?php echo $konum_id; ?>">
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Konum</label>
                                            <div class="col-sm-10">
                                            <input value="<?php echo $get_single_konum['konum_adi']; ?>" name="konum_name" id="exampleEmail" placeholder="Bu konuma bir isim verin" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Plaka</label>
                                            <div class="col-sm-10">
                                            <input value="<?php echo $get_single_konum['plaka']; ?>" name="konum_plaka" id="exampleEmail" placeholder="Bu konuma bir isim verin" type="text" class="form-control" required>

                                            </div>
                                        </div>
                                        <div class="position-relative row ">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button class="btn btn-success">Konumu Düzenle</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>           
                    </div>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>