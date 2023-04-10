function initMap() {
  const mapElement = document.querySelector('#svg-turkiye-haritasi');
  const infoElement = document.querySelector('.il-isimleri');

  function handleMapHover(event) {
    const target = event.target;
    const parentNode = target.parentNode;

    if (target.tagName === 'path' && parentNode.id !== 'guney-kibris') {
      infoElement.innerHTML = `<div>${parentNode.getAttribute('data-iladi')}</div>`;
    }
  }

  function handleMapMove(event) {
    infoElement.style.top = `${event.pageY + 25}px`;
    infoElement.style.left = `${event.pageX}px`;
  }

  function handleMapOut() {
    infoElement.innerHTML = '';
  }

  function handleMapClick(event) {
    const target = event.target;
    const parentNode = target.parentNode;

    if (target.tagName === 'path' && parentNode.getAttribute('data-plakakodu')) {
      $( "#alert_primary" ).hide( "slow");

      const city_id = parentNode.getAttribute('data-plakakodu');
      const queryParams = new URLSearchParams({city_id});

      fetch(`http://localhost/get_city.php?${queryParams}`)
        .then(response => response.text())
        .then(html => $('#result').html(html))
        .catch(error => console.error('Error fetching city data', error));
    }
  }

  mapElement.addEventListener('mouseover', handleMapHover);
  mapElement.addEventListener('mousemove', handleMapMove);
  mapElement.addEventListener('mouseout', handleMapOut);
  mapElement.addEventListener('click', handleMapClick);
}
