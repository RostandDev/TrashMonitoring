
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



        function user_updataform(){
            let form_container = document.createElement('div');
            form_container.classList.add("form");
            form_container.classList.add("userupdate");

            let close = document.createElement('div');
            close.className = "close";
            close.innerHTML = "&times;"

            form_container.appendChild(close);


            let lname_container = document.createElement("div");
            let lname_title = document.createElement("div");
            lname_title.innerHTML = "Nom";
            let lname_input = document.createElement("input");
            lname_input.type = "text";
            lname_input.id = 'u_last_name';

            lname_container.appendChild(lname_title);
            lname_container.appendChild(lname_input);


            let fname_container = document.createElement("div");
            let fname_title = document.createElement("div");
            fname_title.innerHTML = "Prenoms";
            let fname_input = document.createElement("input");
            fname_input.type = "text";
            fname_input.id = 'u_first_name';

            fname_container.appendChild(fname_title);
            fname_container.appendChild(fname_input);


            let email_container = document.createElement("div");
            let email_title = document.createElement("div");
            email_title.innerHTML = "Email";
            let email_input = document.createElement("input");
            email_input.type = "text";
            email_input.id = 'u_email';

            email_container.appendChild(email_title);
            email_container.appendChild(email_input);


            let identifier_container = document.createElement("div");
            let identifier_title = document.createElement("div");
            identifier_title.innerHTML = "Identifiant";
            let identifier_input = document.createElement("input");
            identifier_input.type = "text";
            identifier_input.id = 'u_identifier';

            identifier_container.appendChild(identifier_title);
            identifier_container.appendChild(identifier_input);


            let password_container = document.createElement("div");
            let password_title = document.createElement("div");
            password_title.innerHTML = "Mot de passe ";
            let password_input = document.createElement("input");
            password_input.type = "text";
            password_input.id = 'u_password';

            let access_container = document.createElement("div");
            let access_title = document.createElement("div");
            access_title.innerHTML = "Niveau d'acces ";
            let access_input = document.createElement("select");
            access_input.id = "u_access_level";
            let access_option1 = document.createElement("option");
            access_option1.innerHTML = 'Simple utilisateur';
            access_option1.value = 'reader';
            let access_option2 = document.createElement("option");
            access_option2.innerHTML = 'Administrateur';
            access_option2.value = 'editor';


            access_input.appendChild(access_option1);
            access_input.appendChild(access_option2);

            password_container.appendChild(password_title);
            password_container.appendChild(password_input);
            access_container.appendChild(access_input);


            let btn_container = document.createElement("div");
            let btn_input = document.createElement("input");
            btn_input.type = "button";
            btn_input.id = 'u_update';
            btn_input.value="Enregistrer";

            btn_container.appendChild(btn_input);

            let id = document.createElement("input");
            id.id ="u_id";
            id.type ="hidden";

            let _form = document.createElement('form');

            _form.id = 'userUpdate';

            _form.appendChild(close);
            _form.appendChild(lname_container);
            _form.appendChild(fname_container);
            _form.appendChild(email_container);
            _form.appendChild(identifier_container);
            _form.appendChild(password_container);
            _form.appendChild(access_container);
            _form.appendChild(btn_container);
            _form.appendChild(id);

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
            adresse_title.innerHTML = "Adresse";
            let adresse_input = document.createElement("input");
            adresse_input.type = "text";
            adresse_input.id = '_address';

            adresse_container.appendChild(adresse_title);
            adresse_container.appendChild(adresse_input);


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


        function trash_updateform(){
            let form_container = document.createElement('div');
            form_container.classList.add("form");
            form_container.classList.add("trashupdate");

            let close = document.createElement('div');
            close.className = "close";
            close.innerHTML = "&times;"

            form_container.appendChild(close);


            let longitude_container = document.createElement("div");
            let longitude_title = document.createElement("div");
            longitude_title.innerHTML = "Longitude";
            let longitude_input = document.createElement("input");
            longitude_input.type = "text";
            longitude_input.id = 'u_longitude';

            longitude_container.appendChild(longitude_title);
            longitude_container.appendChild(longitude_input);


            let latitude_container = document.createElement("div");
            let latitude_title = document.createElement("div");
            latitude_title.innerHTML = "Latitude";
            let latitude_input = document.createElement("input");
            latitude_input.type = "text";
            latitude_input.id = 'u_latitude';

            latitude_container.appendChild(latitude_title);
            latitude_container.appendChild(latitude_input);


            let name_container = document.createElement("div");
            let name_title = document.createElement("div");
            name_title.innerHTML = "Nom";
            let name_input = document.createElement("input");
            name_input.type = "text";
            name_input.id = 'u_name';

            name_container.appendChild(name_title);
            name_container.appendChild(name_input);


            let adresse_container = document.createElement("div");
            let adresse_title = document.createElement("div");
            adresse_title.innerHTML = "Adresse";
            let adresse_input = document.createElement("input");
            adresse_input.type = "text";
            adresse_input.id = 'u_address';

            adresse_container.appendChild(adresse_title);
            adresse_container.appendChild(adresse_input);


            let btn_container = document.createElement("div");
            let btn_input = document.createElement("input");
            btn_input.type = "button";
            btn_input.id = 't_update';
            btn_input.value="Enregistrer";

            let id = document.createElement("input");
            id.id ="u_id";
            id.type ="hidden";

            btn_container.appendChild(btn_input);

            let _form = document.createElement('form');

            _form.id = 'trashUpdate';

            _form.appendChild(close);
            _form.appendChild(name_container);
            _form.appendChild(longitude_container);
            _form.appendChild(latitude_container);
            _form.appendChild(adresse_container);
            _form.appendChild(btn_container);

            _form.appendChild(id);

            form_container.appendChild(_form);


            return form_container;

            
        }