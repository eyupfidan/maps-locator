<?php require('settings/config.php'); 
   if($_SESSION["user_admin"] == 0){
    header('location: http://localhost/panel/login');
   }
   
   $konumlar_list = $db->query("SELECT * FROM locations", PDO::FETCH_ASSOC);
   $api_key = $db->query("SELECT * FROM api_key", PDO::FETCH_ASSOC);
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
      <title>Mağaza Ekle</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
      <meta name="description" content="This is an example dashboard created using build-in elements and components.">
      <meta name="msapplication-tap-highlight" content="no">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
      <link href="main.css" rel="stylesheet">
      <link href="custom.css" rel="stylesheet">
   </head>
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
                        Mağaza Ekle
                        <div class="page-title-subheading">
                           Buradan yeni mağazalar ekleyebilirsiniz.
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row" style="padding: 15px">
               <div class="main-card col-sm-12 card">
                  <form id="store_add_form" method="post" action="http://localhost/panel/action/store_add.php">
                     <div class="col-sm-12" style="padding-left: 30px; padding-right: 30px; padding-top: 30px;">
                        <!-- webkulMap -->
                        <?php if($durum == 1){?>
                        <div class="alert alert-success" role="alert">
                           * MAĞAZA EKLENDİ
                        </div>
                        <?php } ?>
                        <div id="webkulMap" style="height: 380px; margin-top:10px;"></div>
                        <div class="position-relative row " style="margin-top:10px;">
                           <div class="col-sm-6 ">
                              <input type="text" class="form-control"  name="street-address" value="Kadıköy Hasanpaşa Mahallesi"  id="address" placeholder="Konum Adresi" autocomplete="off"/>
                           </div>
                           <div class="col-sm-2 ">
                              <input type="text" class="form-control" name="latitude" value="41.13038536538544" placeholder="latitude" id="latitude" readonly/>
                           </div>
                           <div class="col-sm-2 ">
                              <input type="text" class="form-control" name="longitude" value="28.95435560338845" placeholder="longitude" id="longitude" readonly/>
                           </div>
                           <div class="col-sm-2 ">
                              <a href="#"  id="find-address" class="btn btn-dark btn-lg" >Konumu Bul</a>
                           </div>
                           <!-- webkulMap -->
                        </div>
                        <!-- col-sm-12 -->
                        <div class="card-body" style="margin-top: 50px">
                           <div class="position-relative row form-group">
                              <label for="exampleEmail" class="col-sm-2 col-form-label">Mağaza Adı</label>
                              <div class="col-sm-10">
                                 <input name="store_name" id="exampleEmail" placeholder="Adı" type="text" class="form-control" required>
                              </div>
                           </div>
                           <div class="position-relative row form-group">
                              <label for="exampleEmail" class="col-sm-2 col-form-label">Adres</label>
                              <div class="col-sm-10">
                                 <input name="store_adress" id="exampleEmail" placeholder="Adres" type="text" class="form-control" required>
                              </div>
                           </div>
                           <div class="position-relative row form-group">
                              <label for="exampleSelect" class="col-sm-2 col-form-label">Bağlı İl</label>
                              <div class="col-sm-10">
                                 <div class="ui form">
                                    <select name="skills[]" multiple="" class="label ui selection fluid dropdown">
                                       <?php foreach($konumlar_list as $row){?>  
                                       <option value="<?php echo $row['plaka']; ?>" data-value="<?php echo $row['plaka']; ?>"><?php echo $row['konum_adi']; ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="position-relative row form-group">
                              <label for="exampleEmail" class="col-sm-2 col-form-label">Detay</label>
                              <div class="col-sm-10">
                                 <textarea id="summernote" name="editordata"></textarea>
                              </div>
                           </div>
                           <div class="position-relative row ">
                              <div class="col-sm-10 offset-sm-2">
                                 <button type="submit" name="submit" class="btn btn-success">Mağazayı Ekle</button>
                              </div>
                           </div>
                        </div>
                        <!-- card-body -->
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="./assets/scripts/main.js"></script>
   </body>
   <script type="text/javascript" src="./assets/scripts/custom.js"></script></body>
   <?php foreach($api_key as $row){
      $api_key = $row['api_key'];
      }?> 
   <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key; ?>"></script> 
   </script>
   <script type="text/javascript">
      var map;
      var marker;
      var myLatlng = new google.maps.LatLng('41.13038536538544', '28.95435560338845');
      var geocoder = new google.maps.Geocoder();
      var infowindow = new google.maps.InfoWindow();
      function initialize() {
          var mapOptions = {
          zoom: 10,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById("webkulMap"), mapOptions);
          marker = new google.maps.Marker({
              map: map,
              position: myLatlng,
              draggable: true
          });
          google.maps.event.addListener(marker, 'dragend', function() {
              geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                  if (status == google.maps.GeocoderStatus.OK) {
                      if (results[0]) {
                          var address_components = results[0].address_components;
                          var components={};
                          jQuery.each(address_components, function(k,v1) {jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});});
                          $('#latitude').val(marker.getPosition().lat());
                          $('#longitude').val(marker.getPosition().lng());
                          infowindow.setContent(results[0].formatted_address);
                          infowindow.open(map, marker);
                      }
                  }
              });
          });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
   </script>
   <script>
      $("#find-address").click(function(){
        var apiKey = <?php echo "'".$api_key."'"; ?>;
        var  address =  $('#address').val();
        var addressClean = address.replace(/\s+/g, '+');
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
          address: addressClean 
        }, function(results, status) {
          console.log(status);
          if (status == 'OK') {
            longitude = results[0].geometry.location.lng();
            latitude = results[0].geometry.location.lat();
            document.getElementById("longitude").value = longitude;
            document.getElementById("latitude").value = latitude;
            // geocoder is asynchronous, do this in the callback function
            longitude = $("input#longitude").val();
            latitude = $("input#latitude").val();
            if (longitude && latitude) {
              longitude = parseFloat(longitude);
              latitude = parseFloat(latitude);
              initMap(longitude, latitude);
            }
          } else alert("geocode failed")
        });
        function initMap(longitude, latitude) {
        var myLatlng = new google.maps.LatLng(latitude, longitude);
        var mapOptions = {
          zoom: 17,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("webkulMap"), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          draggable: true,
          title: "Where's your garden?"
        });
        google.maps.event.addListener(marker, 'dragend', function() {
                geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var address_components = results[0].address_components;
                            var components={};
                            jQuery.each(address_components, function(k,v1) {jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});});
      
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
      };
      }) 
   </script>
   <script>
      $('#summernote').summernote({
        placeholder: 'Bayi hakkında bilgiler',
        tabsize: 2,
        height: 250,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', [ 'codeview']]
        ]
      });
      
      $('.label.ui.dropdown')
      .dropdown();
      
      $('.no.label.ui.dropdown')
      .dropdown({
      useLabels: false
      });
      
      $('.ui.button').on('click', function () {
      $('.ui.dropdown')
      .dropdown('restore defaults')
      })
      
   </script>
</html>