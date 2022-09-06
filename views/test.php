<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/page.css">
    <link rel="stylesheet" href="../public/media/fonts/icofont/icofont.css">
    <link rel="stylesheet" href="../public/media/fonts/icofont/icofont.min.css">
    <title>Document</title>
</head>
<body>
    
    <table >

    <thead>
                <tr>
                    <th id ='t-check'>Choisir</th>
                    <th>Num</th>
                    <th>Nom</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Adresse</th>
                    
                    
                </tr>
            </thead>
            <tbody id="u_table" >

            </tbody>
            <tfoot>
                <tr id="navs">
                <td id="prev" class="icofont-arrow-left"></div>
                <td id="next" class="icofont-arrow-right"></div>
                </tr>
            </tfoot>

            
    </table>
</body>
<script src="../public/js/request.js"></script>
<script>
    let container = document.getElementById('u_table');

display_trash = (_start, _end)=>{
    
    let req = _getRequest('../trashs?trashs');
    req.then(data=>{
    let tr = '';
    let _data = data.data;


    document.getElementById('u_table').innerHTML ='';
        for( let n = _start; n < _end; n++){
           
            tr += `
            <tr>
                <td id='t-check'><input type='checkbox'  id="datacheck" _id="${_data[n]._id}"></td>
                <td>${n+1}</td>
                <td>${_data[n]._name}</td>
                <td>${_data[n]._latitude}</td>
                <td>${_data[n]._longitude}</td>
                <td>${_data[n]._address}</td>
                
                <td >
                    <i id="userupdate" class="icofont-ui-edit" _id="${_data[n]._id}"></i>
                    
                </td>
                <td >
                    <i id="userdelete" class="icofont-trash" _id="${_data[n]._id}"></i>
                </td>
            
            </tr>
            `; 

        }
        document.getElementById('u_table').innerHTML = tr;
    })
    

}

let start =0;
let end = 20;
display_trash(start,end);


document.getElementById("next").onclick = ()=>{

    start +=20;
    end += 20;
    display_trash(start, end );

}

document.getElementById("prev").onclick = ()=>{
    start -=20;
    end -= 20; 
    display_trash(start, end );

}

    
</script>
</html>