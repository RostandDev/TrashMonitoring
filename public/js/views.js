
    let pages = document.querySelector('.page');


    trashs = () =>{

        let tab = document.createElement('table');
        let thead =  document.createElement('thead');
        let tbody =  document.createElement('tbody');
        let numth =  document.createElement('th'); 
        numth.innerHTML = 'Num';
        let name_th =  document.createElement('th'); 
        name_th.innerHTML ='Name';

        let latitude_th =  document.createElement('th'); 
        latitude_th.innerHTML = 'Latitude';
        let longitude_th =  document.createElement('th'); 
        longitude_th.innerHTML = 'Longitude';
        let address_th =  document.createElement('th'); 
        address_th.innerHTML = 'Adresse';
        let headtr =  document.createElement('tr'); 
        let bodytr =  document.createElement('tr'); 

        headtr.appendChild(numth);
        headtr.appendChild(name_th);
        headtr.appendChild(latitude_th);
        headtr.appendChild(longitude_th);
        headtr.appendChild(address_th);


        thead.appendChild(headtr);
        //tbody.appendChild(bodytr);

        tab.appendChild(thead);
        tab.appendChild(tbody);


        
        
       
        let req =  _getRequest('trashs?trashs');

        req.then((_data) =>{

            if(pages.children.length !== 0){
                pages.innerHTML='';
                
            } 

            pages.appendChild(_header('trash'));
            pages.appendChild(tab);
            pages.appendChild(trashform());
            pages.appendChild(trash_updateform());
            

            for (let i in _data.data ) {
                
                let tr= document.createElement('tr');

                

                let numtd =  document.createElement('td'); 
                numtd.innerHTML = i;
                let name_td =  document.createElement('td'); 
                name_td.innerHTML =_data.data[i]._name;
        
                let latitude_td =  document.createElement('td'); 
                latitude_td.innerHTML = _data.data[i]._latitude;
                let longitude_td =  document.createElement('td'); 
                longitude_td.innerHTML =_data.data[i]._longitude;
                let address_td =  document.createElement('td'); 
                address_td.innerHTML = _data.data[i]._address;

                let btn_td =  document.createElement('td'); 
                btn_td.id = "btn";

                let update_btn = document.createElement('i');
                update_btn.id = 'trashupdate'
                update_btn.className = "icofont-ui-edit";
                update_btn.setAttribute("_id",_data.data[i]._id);

                let delete_btn = document.createElement('i');
                delete_btn.id = "trashdelete";
                delete_btn.className = "icofont-trash";
                delete_btn.setAttribute("_id",  _data.data[i]._id)

                btn_td.appendChild(update_btn);
                btn_td.appendChild(delete_btn);

                tr.appendChild(numtd);
                tr.appendChild(name_td);
                tr.appendChild(latitude_td);
                tr.appendChild(longitude_td);
                tr.appendChild(address_td);
                tr.appendChild(btn_td);

                tbody.appendChild(tr);


            }            

            let _open = document.getElementById("open");
            let _close =  document.querySelectorAll('.close');
            let _add = document.querySelector('#trashadd');

            let _update = document.querySelectorAll('#trashupdate');
            let u_update = document.querySelector('#t_update');


            let _delete = document.querySelectorAll("#trashdelete");

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

    users = () =>{



        let tab = document.createElement('table');
        let thead =  document.createElement('thead');
        let tbody =  document.createElement('tbody');
        let numth =  document.createElement('th'); 
        numth.innerHTML = 'Num';
        let last_name_th =  document.createElement('th'); 
        last_name_th.innerHTML ='Nom';

        let first_name_th =  document.createElement('th'); 
        first_name_th.innerHTML = 'Prenoms';

        let emailth =  document.createElement('th'); 
        emailth.innerHTML = 'Email';

        let droitth =  document.createElement('th'); 
        droitth.innerHTML = 'Droit';

        let headtr =  document.createElement('tr'); 
        let bodytr =  document.createElement('tr'); 



        headtr.appendChild(numth);
        headtr.appendChild(last_name_th);
        headtr.appendChild(first_name_th);
        headtr.appendChild(emailth);
        headtr.appendChild(droitth);


        thead.appendChild(headtr);

        tab.appendChild(thead);
        tab.appendChild(tbody);


        
        
       
        let req =  _getRequest('admins?admins');

        req.then((_data) =>{

            if(pages.children.length !== 0){
                pages.innerHTML='';
                
            } 

            pages.appendChild(_header('user'));
            pages.appendChild(tab);
            pages.appendChild(userform());
            pages.appendChild(user_updataform());

            
            



            for (let i in _data.data ) {
                
                let tr= document.createElement('tr');

                

                let numtd =  document.createElement('td'); 
                numtd.innerHTML = i;
                let last_name_td =  document.createElement('td'); 
                last_name_td.innerHTML =_data.data[i]._last_name;
        
                let first_name_td =  document.createElement('td'); 
                first_name_td.innerHTML = _data.data[i]._first_name;

                let emailtd =  document.createElement('td'); 
                emailtd.innerHTML =_data.data[i]._email;

                let droittd =  document.createElement('td'); 

                _data.data[i]._access_level == 'reader' ? droittd.innerHTML='Utilisateur' :droittd.innerHTML = 'Administrateur';




                let btn_td =  document.createElement('td'); 
                btn_td.id = "btn";

                let update_btn = document.createElement('i');
                update_btn.id = 'userupdate'
                update_btn.className = "icofont-ui-edit";
                update_btn.setAttribute("_id",_data.data[i]._id);

                let delete_btn = document.createElement('i');
                delete_btn.id = "userdelete";
                delete_btn.className = "icofont-trash";
                delete_btn.setAttribute("_id",  _data.data[i]._id);

                btn_td.appendChild(update_btn);
                btn_td.appendChild(delete_btn);
                

                tr.appendChild(numtd);
                tr.appendChild(last_name_td);
                tr.appendChild(first_name_td);
                tr.appendChild(emailtd);
                tr.appendChild(droittd);
                tr.appendChild(btn_td); 

                tbody.appendChild(tr);


            }

            
                let _open = document.getElementById("open");
                let _close =  document.querySelectorAll('.close');

                let _add = document.querySelector('#useradd');

                let _update = document.querySelectorAll('#userupdate');
                let u_update = document.querySelector('#u_update');
                let _delete = document.querySelectorAll("#userdelete");

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
                                //document.querySelector('#u_password').value = _data.data[i]._password;
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






    


    



