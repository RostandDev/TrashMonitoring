
        function _insertUser( _url){
           
            let data = {
                'insert' : 'user',
                '_first_name' : document.getElementById('_first_name').value,
                '_last_name' :  document.getElementById('_last_name').value,
                '_identifier' : document.getElementById('_identifier').value ,
                '_password' :   document.getElementById('_password').value,
                '_email' :      document.getElementById('_email').value
            }

            let req = _postRequest('admins',data);


            req.then((_data)=>{
                if(_data.status == !1){
                    users();
                    if(_data.error == "DATA_ERROR") _message("Les données sont incorrestes");
                }
                if(_data.status == !0){
                    _message("Utilisateur enregistré");
                    users();
                }
            })
            .catch((_data)=>{
                _message("Erreur interne : verifier les données");
            })
        }

        function _updateUser( ){
           
            let data = {
                'update' : 'user',
                '_first_name' : document.getElementById('u_first_name').value,
                '_last_name' :  document.getElementById('u_last_name').value,
                '_identifier' : document.getElementById('u_identifier').value ,
                '_password' :   document.getElementById('u_password').value,
                '_email' :      document.getElementById('u_email').value,
                '_access_level' : document.getElementById('u_access_level').options[document.getElementById('u_access_level').selectedIndex].value,
                '_id' :      document.getElementById('u_id').value

            }

            let req = _postRequest('admins',data);


            req.then((_data)=>{
                if(_data.status == !1){
                    users();
                    if(_data.error == "DATA_ERROR") _message("Les données sont incorrestes");
                }
                if(_data.status == !0){
                    _message("Utilisateur modifié");
                    users();
                }
            })
            .catch((_data)=>{
                _message("Erreur interne : verifier les données");
            })
        }

        function _insertTrash( ){

           
            let data = {
                'insert' : 'user',
                '_name' : document.getElementById('_name').value,
                '_longitude' :  document.getElementById('_longitude').value,
                '_latitude' : document.getElementById('_latitude').value ,
                '_address' :   document.getElementById('_address').value,
               
            }

            let req = _postRequest('trashs',data);


            req.then((_data)=>{
                console.log(_data);
                if(_data.status == !1){
                    if(_data.error == "DATA_ERROR" ) _message("Erreur de données");
                }
                if(_data.status == !0){
                     _message("Poubelle enregistrée");
                     trashs();
                }
              
            })
            .catch((_data)=>{
                _message("Erreur : veuillez verifier les données ");
            })
        }


        function _updateTrash( ){

           
            let data = {
                'update' : 'trash',
                '_name' : document.getElementById('u_name').value,
                '_longitude' :  document.getElementById('u_longitude').value,
                '_latitude' : document.getElementById('u_latitude').value ,
                '_address' :   document.getElementById('u_address').value,
                '_id' :   document.getElementById('u_id').value,
               
            }

            let req = _postRequest('trashs',data);

            req.then((_data)=>{
                console.log(_data);
                if(_data.status == !1){
                    if(_data.error == "DATA_ERROR" ) _message("Erreur de données");
                }
                if(_data.status == !0){
                     _message(" Poubelle mise à jour");
                     trashs();
                }
                
               
            })
            .catch((_data)=>{
                _message("Erreur : veuillez verifier les données ");
            })
        }


        function _groupedeleting(_url, _data){                            
            let del = 0;
            for(let i=0; i< _data.length; i++){
                                  
                   let req = _getRequest(_url+"?delete&id="+_data[i]);

                   req.then((_data) =>{});
                  
            }
           
        }

