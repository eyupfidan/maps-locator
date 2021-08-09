<?php require('settings/config.php'); 
   if($_SESSION["user_admin"] == 0){
    header('location: http://localhost/panel/login');
   }
$store_list = $db->query("SELECT * FROM stores", PDO::FETCH_ASSOC);
$durum = @$_GET['durum'];
if($durum == false){ $durum = 0; }
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Mağaza Listesi</title>
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
                                        Mağaza Listesi
                                        <div class="page-title-subheading">
                                            Burada mevcut mağazalar listelenir.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">,
                                    <a href="<?php echo $data['base_url']; ?>panel/store_add.php">
                                        <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Yeni Eczane Ekle">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>    
                            </div>
                        </div>
                        <div class="row" style="padding: 15px">
                            <div class="main-card col-sm-12 card">
                                <div class="card-body">
                                <h5 class="card-title">MAĞAZA LİSTESİ</h5>
                                    <?php if($durum == 1){  ?> <p style="color: green; font-weight: bold">* İşlem Başarılı</p> <?php } ?>
                                    <table id="listem" class="mb-0 table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Mağaza Adı</th>
                                                <th>İşlem</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($store_list as $row){ ?> 
                                                <tr>
                                                    <th scope="row"><?php echo $row['store_id']; ?></th>
                                                    <td><?php echo $row['store_name']; ?></td>
                                                    <td>
                                                        <a href="http://localhost/panel/store_edit.php?store_id=<?php echo $row['store_id']; ?>">
                                                            <button class="mb-2 mr-2 btn btn-info">DÜZENLE</button>
                                                        </a>
                                                        <a href="http://localhost/panel/action/store_delete.php?store_id=<?php echo $row['store_id']; ?>">
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