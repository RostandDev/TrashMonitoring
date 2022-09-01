(
    function(){
       
          

        // initialisation de la carte
        function init(_long =1.1731463 , _lat = 6.2079449){
            let map = L.map('map').setView([6.2079449,1.1731463], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'tiddTrashs'
            }).addTo(map);

            let marker2 = L.marker([_lat,_long]).addTo(map);

            marker2.bindPopup("<b>TIDD</b>").openPopup();

            map.on('click', onMapClick);
        }

        // Montre les coordonées de l'endroit cliqué sur la carte
        function onMapClick(e) {
            alert("Vous avez cliqué sur l'espace :  " + e.latlng);
        } 



        function response(_data){

            let blue = L.icon({
                iconUrl : 'public/media/fonts/icons/blueTrash.jpeg',
                iconSize: [ 18, 18 ],
                iconAnchor: [ 0 , 0 ],
                shadowAnchor: [ 0 , 0 ],
            });

            let yellow = L.icon({
                iconUrl : 'public/media/fonts/icons/yellowTrash.jpeg',
                iconSize: [ 18, 18 ],
                iconAnchor: [ 0 , 0 ],
                shadowAnchor: [ 0 , 0 ],
            });

            let red = L.icon({
                iconUrl : 'public/media/fonts/icons/redTrash.jpeg',
                iconSize: [ 18, 18 ],
                iconAnchor: [ 0 , 0 ],
                shadowAnchor: [ 0 , 0 ],
            });

            for(let i in _data){
                let marker = L.marker([_data[i]['_longitude'], _data[i]['_latitude']]);
                marker.bindPopup(`<b> ${_data[i]['_name'] }` ` ${_data[i]['_full_level']} <b>`);
            }
        }


        //requete de reccupération des données
        function request(_url){
            return new Promise((_resp, _fail ) => {
                let xhr = new XMLHttpRequest();
                        
                xhr.open("GET", _url);
                        
                xhr.onreadystatechange =  () =>{
                        
                    if(xhr.readyState == 4 && xhr.status == 200){
                        _resp(xhr.responseText);
                                        
                    }
                    else{
                                            
                        _fail(`Erreur : status : ${xhr.status} et readstate : ${xhr.readyState}`)
                    }
                }
                        
                    xhr.send(null);
            });
        }

        function _error(_data){
            console.log(_data);
        }

        init();      

        let req = request('maps');

        req.then(response)
        .catch(_error)
        
       
    }
)()