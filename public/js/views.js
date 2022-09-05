
   let pages = document.querySelector('.page');

    let container = document.getElementById('u_table');

    display_trash = (_start, _end)=>{
        
        let req = _getRequest('trashs?trashs');
        req.then(data=>{
        let tr = '';
        let _data = data.data;


        document.getElementById('u_table').innerHTML ='';
            for( let n = _start; n < _end; n++){
               
                tr += `
                <tr>
                    <td id='t-check'><input type='checkbox'  id="datacheck" value="${_data[n]._id}"></td>
                    <td>${n+1}</td>
                    <td>${_data[n]._name}</td>
                    <td>${_data[n]._latitude}</td>
                    <td>${_data[n]._longitude}</td>
                    <td>${_data[n]._address}</td>
                    
                    <td >
                        <i id="trashupdate" class="icofont-ui-edit" _id="${_data[n]._id}"></i>
                        
                    </td>
                    <td >
                        <i id="trashdelete" class="icofont-trash" _id="${_data[n]._id}"></i>
                    </td>
                
                </tr>
                `; 

            }
            document.getElementById('u_table').innerHTML = tr;


            let _open = document.getElementById("open");
            let _close =  document.querySelectorAll('.close');
            let _add = document.querySelector('#trashadd');
            let _max_delte = document.querySelector(".max-delete");
            let _update = document.querySelectorAll('#trashupdate');
            let u_update = document.querySelector('#t_update');
            let _delete = document.querySelectorAll("#trashdelete");
            let close_max_delte = document.querySelector(".close-max-delete");
            let delete_check = document.querySelector('#alldelete');

            let _checkbox = document.querySelectorAll("#datacheck");
            

            delete_check.onclick = ()=>{
                
                
                let data = [];
                for(let i=0; i< _checkbox.length; i++){

                    if(_checkbox[i].checked){
                      
                        data[i] = _checkbox[i].value;

                       
                    }

                }


                let del = _groupedeleting("trashs", data);
                console.log(del);

                alert(del+" Poubelles supprimées");
            }

            _max_delte.onclick = ()=>{
                
  
                _max_delte.style.display = 'none';
                close_max_delte.style.display = 'block';
                
                t_check=document.querySelectorAll('#t-check');
                
                for(let inner = 0; inner <t_check.length; inner++){
                    delete_check.style.display = 'block';
                    t_check[inner].style.display = 'block';
                }
            }

            close_max_delte.onclick = ()=>{
                
                close_max_delte.style.display = 'none';
                _max_delte.style.display = 'block';

                delete_check.style.display = 'none';
                
                t_check=document.querySelectorAll('#t-check');
                
                for(let inner = 0; inner <t_check.length; inner++){
                    t_check[inner].style.display = 'none';
                }
            }

            for(let i=0; i<_delete.length; i++){
                _delete[i].onclick = ()=>{
                    if(confirm("Voules vous supprimer cette poubelle ?")){
                        
                        let id = _delete[i].getAttribute("_id");
                        

                        let req = _getRequest("trashs?delete&id="+id);

                        req.then((_data)=>{
                            //console.log(_data);
                            if(_data.status == !0){
                                trashs();
                            }
                        })
                    }
                }
            }

            for(let i=0; i< _update.length; i++){
                _update[i].onclick = () =>{
                    let id = _update[i].getAttribute("_id");

                    let req = _getRequest("trashs?trashs&id="+id);
                    
                    req.then((_data)=>{
                        console.log(_data);
                        if(_data.status == !1) return !1;

                        for (let i in _data.data ) {
                            document.querySelector('#u_name').value = _data.data[i]._name;
                            document.querySelector('#u_longitude').value = _data.data[i]._longitude;
                            document.querySelector('#u_latitude').value = _data.data[i]._latitude;
                            document.querySelector('#u_address').value = _data.data[i]._address;
                            document.querySelector('#u_id').value = _data.data[i]._id;
                           // document.querySelector('#_').value = _data[i]._;
                        }    
                        
                    })
               
                    document.querySelector('.trashupdate').style.display = "block";
                }
            }

            u_update.onclick = ()=>{
                _updateTrash();
            }

            

            _add.onclick = ()=>{
               _insertTrash();
            } 

            _close[0].onclick = ()=>{
                document.querySelector('.trashadd').style.display = "none";
            } 


            _close[1].onclick = ()=>{
                document.querySelector('.trashupdate').style.display = "none";
            } 

            _open.onclick = ()=>{
                document.querySelector('.trashadd').style.display = "block";
            }
        })
        

    }


    trashs = () =>{

        let tab = document.createElement('table');
        let tab_content = `
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
                    <td id="loading"> Loading ... </td>
                    <td id="next" class="icofont-arrow-right"></div>
                </tr>
            </tfoot>
        `;
        tab.innerHTML = tab_content;


      

            if(pages.children.length !== 0) pages.innerHTML = '';

            pages.appendChild(_header('trash'));
            pages.appendChild(tab);
            pages.appendChild(trashform());
            pages.appendChild(trash_updateform());
            
            
            


    let start =0;
    let end = 50;
    display_trash(start,end);
    document.querySelector('#loading').style.display = 'none';

    
    document.getElementById("next").onclick = ()=>{

        start +=50;
        end += 50;
        document.querySelector('#loading').style.display = 'block';
        display_trash(start, end );
        document.querySelector('#loading').style.display = 'none';

    }

    document.getElementById("prev").onclick = ()=>{
        start -=50;
        end -= 50; 
        document.querySelector('#loading').style.display = 'block';
        display_trash(start, end );
        document.querySelector('#loading').style.display = 'none';
        
    }

    
        
}

