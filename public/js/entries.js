
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
                if(_data.status == !0){
                    users();
                }
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
                if(_data.status == !0){
                    users();
                }
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
               trashs();
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
               trashs();
            })
        }

