(
    function(){
       

        // Montre les coordonées de l'endroit cliqué sur la carte
        function onMapClick(e) {
            alert("Vous avez cliqué sur l'espace :  " + e.latlng);
        } 


        function _error(_data){
            console.log("_data");
        }

        

        maps = ()=>{

            let _map = document.createElement('div');
            _map.id = 'maps';
            
            if(pages.children.length !== 0){
                pages.innerHTML='';
                
            } 
            pages.appendChild(_map);

            let req = _getRequest('maps');

            req.then((_data) =>{


                let map = L.map('maps').setView([6.2079449,1.1731463], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: 'tiddTrashs'
                }).addTo(map);
    
                let marker2 = L.marker([6.2079449,1.1731463]).addTo(map);
    
                marker2.bindPopup("<b>TIDD</b>").openPopup();
    
    
    
                map.on('click', onMapClick); 
                
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


                for(let i in _data.data){
                    let trash = 0;
                    if(_data.data[i]._full_level <= 50){
                         trash = blue;
                    }
                    if(_data.data[i]._full_level <= 80){
                         trash = yellow;
                    }
                    if(_data.data[i]._full_level >= 90){
                         trash = red;
                    }
                    let long = _data.data[i]._longitude;
                    let lat = _data.data[i]._latitude;
    
                    
    
                    let marker = L.marker([lat,long], {icon: trash}).addTo(map);
                    marker.bindPopup(`<b> Poubelle :${ _data.data[i]._name } </br> Niveau : ${ _data.data[i]._full_level }% </br> Adress :${ _data.data[i]._address } <b>`);
                }
    
                //console.log(_data);

            })
            

        }
       
       
    }
)()