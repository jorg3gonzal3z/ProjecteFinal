$(document).ready(function(){
    //boton para mostrar formulario añadir tramo
    $("#add_tramo").click(function() {
        $('#esconder_form').removeAttr('hidden');
        $("#form_add_tramo").removeAttr('hidden');
    });
    //boton para esconder el formulario de añadir tramo
    $("#esconder_form").click(function() {
        $("#form_add_tramo").attr('hidden',true);
        $('#esconder_form').attr('hidden',true);
    });
    //boton para mostrar formulario editar tramo
    $(".editButton").click(function() {
        $(this).attr('hidden',true);
        var thisId = $(this).attr('id');
        thisId = thisId.substring(thisId.length - 1, thisId.length);
        $("#esconder_form_edit" + thisId).attr('hidden',false);
        $("#form_edit_tramo"+ thisId).attr('hidden',false);
        $("#delete_tramo"+ thisId).attr('hidden',true);

        //boton para esconder el formulario de editar tramo
        $("#esconder_form_edit"+ thisId).click(function() {
            $("#edit_tramo"+ thisId).attr('hidden',false);
            $("#form_edit_tramo"+ thisId).attr('hidden',true);
            $(this).attr('hidden',true);
            $("#delete_tramo"+ thisId).attr('hidden',false);
        });
    });

    //imagenes del carrousel
    $('.carousel-inner').find('>:first-child').addClass('active');

//tema mapa y tal
    mapboxgl.accessToken = 'pk.eyJ1IjoiamxlY2h1Z2F0IiwiYSI6ImNrbzhwcG52cjBta2cycG11dHA5NHJhNTAifQ.fi_PSZy_IVAgt6Wu3BwKng';
    
    var map = new mapboxgl.Map({
      container: 'map', // Container ID
      style: 'mapbox://styles/mapbox/outdoors-v11', // Map style to use
      center: [1.69361,41.22972], // Starting position [lng, lat]
      zoom: 12, // Starting zoom level
    });

    var geocoder = new MapboxGeocoder({ // Initialize the geocoder
        accessToken: mapboxgl.accessToken, // Set the access token
        mapboxgl: mapboxgl, // Set the mapbox-gl instance
        marker: false, // Do not use the default marker style
        placeholder: 'Donde rustimos bro?', // Placeholder text for the search bar
        bbox: [-11.232422,35.947992,4.534058,43.866419], // Boundary for Berkeley
        proximity: {
          longitude: 2.029174,
          latitude: 42.406967
        } // Coordina   tes of UC Berkeley
      });      
      // Add the geocoder to the map
      map.addControl(geocoder);
      
      var marker = new mapboxgl.Marker({
        draggable: true
        })
        .setLngLat([1.69361,41.22972])
        .addTo(map);
         
        function onDragEnd() {
        var lngLat = marker.getLngLat();
        coordinates.style.display = 'block';
        coordinates.innerHTML = 'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
        salidamapa.innerHTML = lngLat.lng + "," + lngLat.lat;
        }

        marker.on('dragend', onDragEnd);

        var marker2 = new mapboxgl.Marker({
            draggable: true
            })
            .setLngLat([1.69361,41.22972])
            .addTo(map);
             
            function onDragEnd2() {
            var lngLat2 = marker2.getLngLat();
            coordinates.style.display = 'block';
            coordinates.innerHTML ='Longitude: ' + lngLat2.lng + '<br />Latitude: ' + lngLat2.lat;
            finalmapa.innerHTML = lngLat2.lng + "," + lngLat2.lat;

            }
             
            marker2.on('dragend', onDragEnd2);
});
