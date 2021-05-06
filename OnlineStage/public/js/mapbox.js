var thisSortida;
var thisFinal;

$(document).ready(function(){

    //tema mapa y tal
    mapboxgl.accessToken = 'pk.eyJ1IjoiamxlY2h1Z2F0IiwiYSI6ImNrbzhwcG52cjBta2cycG11dHA5NHJhNTAifQ.fi_PSZy_IVAgt6Wu3BwKng';
    
    var map = new mapboxgl.Map({
      container: 'map', // Container ID
      style: 'mapbox://styles/mapbox/outdoors-v11', // Map style to use
      center: [1.69361,41.22972], // Starting position [lng, lat]
      zoom: 5, // Starting zoom level
    });


    // var geocoder = new MapboxGeocoder({ // Initialize the geocoder
    //     accessToken: mapboxgl.accessToken, // Set the access token
    //     mapboxgl: mapboxgl, // Set the mapbox-gl instance
    //     marker: false, // Do not use the default marker style
    //     placeholder: 'Donde rustimos bro?', // Placeholder text for the search bar
    //     bbox: [-11.232422,35.947992,4.534058,43.866419], // Boundary for Berkeley
    //     proximity: {
    //       longitude: 2.029174,
    //       latitude: 42.406967
    //     } // Coordina   tes of UC Berkeley
    // });      
    // // Add the geocoder to the map
    // map.addControl(geocoder);
    
    // var marker = new mapboxgl.Marker({
    // draggable: true
    // })
    // .setLngLat([1.69361,41.22972])
    // .addTo(map);
         
    // function onDragEnd() {
    //     var lngLat = marker.getLngLat();
    //     coordinates.style.display = 'block';
    //     coordinates.innerHTML = 'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
    //     salidamapa.innerHTML = lngLat.lng + "," + lngLat.lat;
    // }

    // marker.on('dragend', onDragEnd);

    // var marker2 = new mapboxgl.Marker({
    //     draggable: true
    //     })
    //     .setLngLat([1.69361,41.22972])
    //     .addTo(map);
            
    // function onDragEnd2() {
    //     var lngLat2 = marker2.getLngLat();
    //     coordinates.style.display = 'block';
    //     coordinates.innerHTML ='Longitude: ' + lngLat2.lng + '<br />Latitude: ' + lngLat2.lat;
    //     finalmapa.innerHTML = lngLat2.lng + "," + lngLat2.lat;
    // }
        
    // marker2.on('dragend', onDragEnd2);

    var directions = new MapboxDirections({
        accessToken: mapboxgl.accessToken,
        unit: 'metric',
        profile: 'mapbox/driving',
        controls:{
            inputs: true,
            profileSwitcher: false,
            instructions: false,
        },
        language: "es",
        placeholderOrigin: "De donde sales?",
        placeholderDestination: "Final del tramo."
    });

    map.addControl(directions,'top-left');

    map.on('load',  function() {
        directions.setOrigin([1.63104,41.26467]); // can be address in form setOrigin("12, Elm Street, NY")
        directions.setDestination([1.65855,41.25084]); // can be address

    })
    $("#add_tramo").click(function() {
        map.resize();
    });

    directions.on("route", e => {
        let routes = e.route
        $("#distancia").val((routes.map(r => r.distance) / 1000).toFixed(2));

        var salida = directions.getOrigin().geometry.coordinates.reverse();
        var llegada = directions.getDestination().geometry.coordinates.reverse();

        salida = $.map(salida, function(n){
            return(n.toFixed(10));
        });

        llegada = $.map(llegada, function(n){
            return(n.toFixed(10));
        });

        $('#sortida').val(salida.join());
        $('#final').val(llegada.join());

        

        
        respostaSortida = $.ajax(
        {
            type:'GET',
            url: "https://api.mapbox.com/geocoding/v5/mapbox.places/"+salida[1]+","+salida[0]+".json?types=address&access_token=pk.eyJ1IjoiamxlY2h1Z2F0IiwiYSI6ImNrbzhwcG52cjBta2cycG11dHA5NHJhNTAifQ.fi_PSZy_IVAgt6Wu3BwKng",
            success: function(data){
                respostaSortida = data.features[0].text;
            }
        }).then(function(){
            respostaFinal = $.ajax(
            {
                type:'GET',
                url: "https://api.mapbox.com/geocoding/v5/mapbox.places/"+llegada[1]+","+llegada[0]+".json?types=address&access_token=pk.eyJ1IjoiamxlY2h1Z2F0IiwiYSI6ImNrbzhwcG52cjBta2cycG11dHA5NHJhNTAifQ.fi_PSZy_IVAgt6Wu3BwKng",
                success: function(data){
                    respostaFinal = data.features[0].text;
                }
            }).then(function(){
                $("#adressa").val(respostaSortida+"&&"+respostaFinal);

            })
        });
    });

});