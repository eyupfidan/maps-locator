<?php require('settings/config.php'); 
   if($_SESSION["user_admin"] == 0){
    header('location: http://localhost/panel/login');
   }
$konum_parent = @$_GET['parent'];
if($konum_parent == false){
    $konum_parent = 0;
}
$konumlar_list = $db->query("SELECT * FROM locations", PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Lokasyon Görüntüle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="">
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
    <link rel="stylesheet" type="text/css" href="http://localhost/panel/assets/scripts/DataTables/datatables.min.css"/>
    <link href="http://localhost/panel/main.css" rel="stylesheet"></head>
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
                                    Listele
                                        <div class="page-title-subheading">
                                            Buradan mevcut eklenen konumları görebilirsiniz.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <a href="http://localhost/panel/location_add.php">
                                        <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Yeni Konum Ekle">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>    
                            </div>
                        </div>
                        <div class="row" style="padding: 15px">
                            <div class="main-card col-sm-12 mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">İL LİSTESİ</h5>
                                    <table id="listem" class="mb-0 table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Plaka</th>
                                                <th>Konum Adı</th>
                                                <th>İşlem</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($konumlar_list as $row){ ?> 
                                                <tr>
                                                    <th scope="row"><?php echo $row['konum_id']; ?></th>
                                                    <td><?php echo $row['plaka']; ?></td>
                                                    <td><?php echo $row['konum_adi']; ?></td>
                                                    <td>
                                                        <a href="http://localhost/panel/location_edit.php?konum_id=<?php echo $row['konum_id']; ?>">
                                                            <button class="mb-2 mr-2 btn btn-info">DÜZENLE</button>
                                                        </a>
                                                        <a href="http://localhost/panel/action/location_delete.php?konum_id=<?php echo $row['konum_id']; ?>">
                                                            <button class="mb-2 mr-2 btn btn-danger">SİL</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>           
                    </div>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/DataTables/jquery.js"></script>
    <script type="text/javascript" src="./assets/scripts/main.js"></script></body>
    <script type="text/javascript" src="./assets/scripts/DataTables/datatables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#listem').DataTable();
    } );
    </script>
</html>