        function _header(_form){
            let header = document.createElement('div');
            header.className = 'header';


            let btns = document.createElement('div');
            btns.className = "btns";

            let addbtn = document.createElement('div');
            
            addbtn.id ="open";
            addbtn.className ="icofont-plus-circle";
            

            let deletebtn = document.createElement('div');
            deletebtn.className = "icofont-trash";

            btns.appendChild(addbtn);
            btns.appendChild (deletebtn);

            header.appendChild(btns);

            return header;

        }

        function userform(){
            let form_container = document.createElement('div');
            form_container.classList.add("form");
            form_container.classList.add("useradd");

            let close = document.createElement('div');
            close.className = "close";
            close.innerHTML = "&times;"

            form_container.appendChild(close);


            let lname_container = document.createElement("div");
            let lname_title = document.createElement("div");
            lname_title.innerHTML = "Nom";
            let lname_input = document.createElement("input");
            lname_input.type = "text";
            lname_input.id = '_last_name';

            lname_container.appendChild(lname_title);
            lname_container.appendChild(lname_input);


            let fname_container = document.createElement("div");
            let fname_title = document.createElement("div");
            fname_title.innerHTML = "Prenoms";
            let fname_input = document.createElement("input");
            fname_input.type = "text";
            fname_input.id = '_first_name';

            fname_container.appendChild(fname_title);
            fname_container.appendChild(fname_input);


            let email_container = document.createElement("div");
            let email_title = document.createElement("div");
            email_title.innerHTML = "Email";
            let email_input = document.createElement("input");
            email_input.type = "text";
            email_input.id = '_email';

            email_container.appendChild(email_title);
            email_container.appendChild(email_input);


            let identifier_container = document.createElement("div");
            let identifier_title = document.createElement("div");
            identifier_title.innerHTML = "Identifiant";
            let identifier_input = document.createElement("input");
            identifier_input.type = "text";
            identifier_input.id = '_identifier';

            identifier_container.appendChild(identifier_title);
            identifier_container.appendChild(identifier_input);


            let password_container = document.createElement("div");
            let password_title = document.createElement("div");
            password_title.innerHTML = "Mot de passe ";
            let password_input = document.createElement("input");
            password_input.type = "text";
            password_input.id = '_password';

            password_container.appendChild(password_title);
            password_container.appendChild(password_input);


            let btn_container = document.createElement("div");
            let btn_input = document.createElement("input");
            btn_input.type = "button";
            btn_input.id = 'useradd';
            btn_input.value="Enregistrer";


            btn_container.appendChild(btn_input);

            let _form = document.createElement('form');

            _form.id = 'userAdd';

            _form.appendChild(close);
            _form.appendChild(lname_container);
            _form.appendChild(fname_container);
            _form.appendChild(email_container);
            _form.appendChild(identifier_container);
            _form.appendChild(password_container);
            _form.appendChild(btn_container);

            form_container.appendChild(_form);


            return form_container;

            
        }

        function trashform(){
            let form_container = document.createElement('div');
            form_container.classList.add("form");
            form_container.classList.add("trashadd");

            let close = document.createElement('div');
            close.className = "close";
            close.innerHTML = "&times;"

            form_container.appendChild(close);


            let longitude_container = document.createElement("div");
            let longitude_title = document.createElement("div");
            longitude_title.innerHTML = "Longitude";
            let longitude_input = document.createElement("input");
            longitude_input.type = "text";
            longitude_input.id = '_longitude';

            longitude_container.appendChild(longitude_title);
            longitude_container.appendChild(longitude_input);


            let latitude_container = document.createElement("div");
            let latitude_title = document.createElement("div");
            latitude_title.innerHTML = "Latitude";
            let latitude_input = document.createElement("input");
            latitude_input.type = "text";
            latitude_input.id = '_latitude';

            latitude_container.appendChild(latitude_title);
            latitude_container.appendChild(latitude_input);


            let name_container = document.createElement("div");
            let name_title = document.createElement("div");
            name_title.innerHTML = "Nom";
            let name_input = document.createElement("input");
            name_input.type = "text";
            name_input.id = '_name';

            name_container.appendChild(name_title);
            name_container.appendChild(name_input);


            let adresse_container = document.createElement("div");
            let adresse_title = document.createElement("div");
            adresse_title.innerHTML = "Longitude";
            let adresse_input = document.createElement("input");
            adresse_input.type = "text";
            adresse_input.id = '_address';

            adresse_container.appendChild(longitude_title);
            adresse_container.appendChild(longitude_input);


            let btn_container = document.createElement("div");
            let btn_input = document.createElement("input");
            btn_input.type = "button";
            btn_input.id = 'trashadd';
            btn_input.value="Enregistrer";


            btn_container.appendChild(btn_input);

            let _form = document.createElement('form');

            _form.id = 'trashAdd';

            _form.appendChild(close);
            _form.appendChild(name_container);
            _form.appendChild(longitude_container);
            _form.appendChild(latitude_container);
            _form.appendChild(adresse_container);
            _form.appendChild(btn_container);

            form_container.appendChild(_form);


            return form_container;

            
        }



       
       
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

        
       /*
        function openForm(form){
            if(form == 'trash') document.querySelector('.trashadd').style.display = "block";
            else if(form == 'user') document.querySelector('.useradd').style.display = "block";
            else if(form == 'trashupdate') document.querySelector('.trashupdate').style.display = "block";
            else if(form == 'userupdate') document.querySelector('.userupdate').style.display = "block";       
            
        }
        
        function closeForm(form){
            
            if(form == 'trash') document.querySelector('.trashadd').style.display = "none";
            else if(form == 'user') document.querySelector('.useradd').style.display = "none";
            else if(form == 'trashupdate') document.querySelector('.trashupdate').style.display = "none";
            else if(form == 'userupdate') document.querySelector('.userupdate').style.display = "none"; 
        }
        
        
        function page(ev, page){
                
            var i, pagecontent, dirvers;
        
            pagecontent = document.querySelectorAll('.page');
        
            for(i=0; i<pagecontent.length; i++){
                pagecontent[i].style.display = 'none';
            }
        
            dirvers = document.querySelectorAll('.driver');
        
            for(i=0; i<dirvers.length; i++){
                dirvers[i].className =  dirvers[i].className.replace("active","") ;
            }
        
            document.getElementById(page).style.display = "block";
        
            ev.currentTarget.className += "active";
        }*/


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
                console.log(_data);
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
            })
        }





        

    
    

    
