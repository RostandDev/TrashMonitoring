
       
       //requete de reccupération des données
       function _getRequest(_url){
        return new Promise((_resp, _fail ) => {
            let xhr = new XMLHttpRequest();
                    
            xhr.open( "GET",_url);
                   
            xhr.onreadystatechange =  () =>{
                    
                if(xhr.readyState == 4 && xhr.status == 200){
                    _resp(JSON.parse(xhr.responseText));
                                    
                }
                
                
            }
                    
            xhr.send(null);
        });
    }


    //requete d'envoi de formulaire des données
    function _postRequest(_url, _data){            
        let form_data = new FormData(); 

        for (const key in _data) {
           form_data.append(key, _data[key]);
        }

        return new Promise((_resp, _fail ) => {
            let xhr = new XMLHttpRequest();
                    
            xhr.open( "POST",_url);
                           
            xhr.onreadystatechange =  () =>{
                            
                if(xhr.readyState == 4 && xhr.status == 200){
                    _resp(JSON.parse(xhr.responseText));
                                                
                }
            }
                            
            xhr.send(form_data);
        });
    }
