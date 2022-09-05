( ()=>{
    let pages = document.querySelector('.page');

display_user = (_start, _end)=>{
    
    let req = _getRequest('admins?admins');
    req.then(data=>{
    let tr = '';
    let _data = data.data;


    document.getElementById('u_table').innerHTML ='';
        for( let n = _start; n < _end; n++){
           
            let level ='';
            (_data[n]._access_level == 'editor') ? level ='Administrateur' : level = 'Utilisateur';
            tr += `
            <tr>
                <td id='t-check'><input type='checkbox'  id="datacheck" value="${_data[n]._id}"></td>
                <td>${n+1}</td>
                <td>${_data[n]._last_name}</td>
                <td>${_data[n]._first_name}</td>
                <td>${_data[n]._email}</td>
                <td>${level}</td>
                
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



        let _open = document.getElementById("open");
        let _close =  document.querySelectorAll('.close');

        let _add = document.querySelector('#useradd');
        let _max_delte = document.querySelector(".max-delete");
        let _update = document.querySelectorAll('#userupdate');
        let u_update = document.querySelector('#u_update');
        let _delete = document.querySelectorAll("#userdelete");
        let close_max_delte = document.querySelector(".close-max-delete");
        let delete_check = document.querySelector('#alldelete');

        let _checkbox = document.querySelectorAll("#datacheck");
        

        delete_check.onclick = ()=>{
            
            
            let del = 0;
            for(let i=0; i< _checkbox.length; i++){
                if(_checkbox[i].checked){                   

                   let data = _getRequest("trashs?delete&id="+_checkbox[i].value);

                   req.then(()=>{
                        trashs();
                   });
                   del++;
                }

            }

            alert(del+" Poubelles supprimées");
        }

        _max_delte.onclick = ()=>{
                
  
            _max_delte.style.display = 'none';
            close_max_delte.style.display = 'block';
            delete_check.style.display = 'block';
            
            t_check=document.querySelectorAll('#t-check');
            
            for(let inner = 0; inner <t_check.length; inner++){
                
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
                if(confirm("Voules vous supprimer cet utilisateur ?")){

                    let id = _delete[i].getAttribute("_id");

                    let req = _getRequest("admins?delete&id="+id);

                    req.then((_data)=>{
                        if(_data.status == !0){
                            users();
                        }
                    })
                }
            }
        }

        for(let i=0; i<_update.length; i++){
            _update[i].onclick = () =>{

                let id = _update[i].getAttribute("_id");

                let req = _getRequest("admins?admins&id="+id);
                req.then((_data)=>{
                    if(_data.status == !0){
                        for (let i in _data.data ) {
                        document.querySelector('#u_last_name').value = _data.data[i]._last_name;
                        document.querySelector('#u_first_name').value = _data.data[i]._first_name;
                        document.querySelector('#u_email').value = _data.data[i]._email;
                        document.querySelector('#u_identifier').value = _data.data[i]._identifier;
                        document.querySelector('#u_id').value = _data.data[i]._id;
                        }
                    }
                    //console.log(_data);
                })
                document.querySelector('.userupdate').style.display = "block";
            }
        }

        u_update.onclick = ()=>{
            _updateUser();
        }
        _add.onclick = ()=>{
           _insertUser();
        } 

        _close[0].onclick = ()=>{
            
            document.querySelector('.useradd').style.display = "none";
        }

        _close[1].onclick = ()=>{
            document.querySelector('.userupdate').style.display = "none";
            
        }

        _open.onclick = ()=>{
            
            document.querySelector('.useradd').style.display = "block";
        }    

    })
    

}



users = () =>{

    tab_content = `
    
    <thead>
        <tr>
            <th id ='t-check'>Choisir</th>
            <th>Num</th>
            <th>Nom</th>
            <th>Prenons</th>
            <th>Email</th>
            <th>Droit d'accès</th>
            
            
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



    let tab = document.createElement('table');
    tab.innerHTML = tab_content;

    if(pages.children.length !== 0){
        pages.innerHTML='';
        
    } 

    pages.appendChild(_header('user'));
    pages.appendChild(tab);
    pages.appendChild(userform());
    pages.appendChild(user_updataform());
   

    let start =0;
    let end = 50;
    display_user(start,end);
    document.querySelector('#loading').style.display = 'none';


    document.getElementById("next").onclick = ()=>{

        start +=50;
        end += 50;
        document.querySelector('#loading').style.display = 'block';
        display_user(start, end );
        document.querySelector('#loading').style.display = 'none';

    }

    document.getElementById("prev").onclick = ()=>{
        start -=50;
        end -= 50; 
        document.querySelector('#loading').style.display = 'block';
        display_user(start, end );
        document.querySelector('#loading').style.display = 'none';

    }
        
        

}

}

)();

