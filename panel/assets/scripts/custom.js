function get_county() {
    var city_id = "city_id=" + $("#select_sehir").val();
    $('#store_get_ilce').prop('disabled', false);
    $.ajax({
        type:'GET',
        url:'http://localhost/panel/get_county.php/',
        data: city_id,
        success:function(html){
            $('#store_get_ilce').html(html);
        }
    }); 
}
 