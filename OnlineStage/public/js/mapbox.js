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
        setTimeout(() => {
            map.resize();
        }, 250);
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