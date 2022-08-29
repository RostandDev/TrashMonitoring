()=>{
    let data = [];
var xhr = new XMLHttpRequest();
xhr.open('GET',"http://localhost/tiddTrash/trashs?onmaps");
xhr.onreadystatechange = function()
{
   if(xhr.readyState == 4 && xhr.status == 200)
   {
       var _data = xhr.responseText;

       _data = JSON.parse(_data);

       for(var i in _data){
           let values = [_data[i]['_longitude'], _data[i]['_latitude'],_data[i]['_address']];

           data[i] = values;
          
           
           
       }
   }
}
xhr.send(null);



var map = L.map('map').setView([6.1504068, 1.2189674], 20);


L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: 'tiddTrashs'
}).addTo(map);

//console.log(data);

for(var i in data)
{
   console.log(data[i]);

   for(var j=0; j<data[i].length; j++)
   {
       console.log(data[i]+" et "+ data[1])
       var marker2 = L.marker([data[i][0], data[i][1]]).addTo(map);

       marker2.bindPopup("<b>"+ data[i][2] + "</b>").openPopup();
   }
}


function onMapClick(e) {
alert("You clicked the map at " + e.latlng);
}

map.on('click', onMapClick);
}