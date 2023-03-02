
 let map, infoWindow;


function initMap() {
   

      infoWindow = new google.maps.InfoWindow();
    
      const locationButton = document.createElement("button");
        // Try HTML5 geolocation.
              map = new google.maps.Map(document.getElementById("map"), {
                center: {lat:  36.713183, lng: -6.125641},
                
                zoom: 15,         
              });

                    const image =
            "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
        const beachMarker = new google.maps.Marker({
            position: { lat: 36.713183, lng: -6.125641 },
            map,
            animation: google.maps.Animation.DROP,
            icon: image,
        });

          
    }
  