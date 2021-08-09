

function svgturkiyeharitasi() {
  const element = document.querySelector('#svg-turkiye-haritasi');
  const info = document.querySelector('.il-isimleri');

  element.addEventListener(
    'mouseover',
    function (event) {
      if (event.target.tagName === 'path' && event.target.parentNode.id !== 'guney-kibris') {
        info.innerHTML = [
          '<div>',
          event.target.parentNode.getAttribute('data-iladi'),
          '</div>'
        ].join('');
      }
    }
  );

  element.addEventListener(
    'mousemove',
    function (event) {
      info.style.top = event.pageY + 25 + 'px';
      info.style.left = event.pageX + 'px';
    }
  );

  element.addEventListener(
    'mouseout',
    function (event) {
      info.innerHTML = '';
    }
  );

}
$(document).ready(function() {
  $("#svg-turkiye-haritasi").click(function(event) {
    $( "#alert_primary" ).hide( "slow", function() {
    });
    var parentcode = event.target.parentNode.getAttribute('data-plakakodu');
    var city_id = "city_id=" + parentcode ;
    $.ajax({
        type:'GET',
        url:'http://localhost/get_city.php',
        data: city_id,
        success:function(html){
           $('#result').html(html);
        }
    });
  });
});
