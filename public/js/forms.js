
        function userform(){
            let form_container = document.createElement('div');
            form_container.classList.add("form");
            form_container.classList.add("useradd");
            form_container.innerHTML = `<form id="userAdd"><div class="close">×</div><div><div>Nom</div><input type="text" id="_last_name"></div><div><div>Prenoms</div><input type="text" id="_first_name"></div><div><div>Email</div><input type="text" id="_email"></div><div><div>Identifiant</div><input type="text" id="_identifier"></div><div><div>Mot de passe </div><input type="text" id="_password"></div><div><input type="button" id="useradd" value="Enregistrer"></div></form>`;


            return form_container;

            
        }



        function user_updataform(){
            let form_container = document.createElement('div');
            form_container.classList.add("form");
            form_container.classList.add("userupdate");
            form_container.innerHTML = `<form id="userUpdate"><div class="close">×</div><div><div>Nom</div><input type="text" id="u_last_name"></div><div><div>Prenoms</div><input type="text" id="u_first_name"></div><div><div>Email</div><input type="text" id="u_email"></div><div><div>Identifiant</div><input type="text" id="u_identifier"></div><div><div>Mot de passe </div><input type="text" id="u_password"></div><div><select id="u_access_level"><option value="reader">Simple utilisateur</option><option value="editor">Administrateur</option></select></div><div><input type="button" id="u_update" value="Enregistrer"></div><input id="u_id" type="hidden"></form>`;


            return form_container;

            
        }




        function trashform(){
            let form_container = document.createElement('div');
            form_container.classList.add("form");
            form_container.classList.add("trashadd");
            form_container.innerHTML = `<form id="trashAdd"><div class="close">×</div><div><div>Nom</div><input type="text" id="_name"></div><div><div>Longitude</div><input type="text" id="_longitude"></div><div><div>Latitude</div><input type="text" id="_latitude"></div><div><div>Adresse</div><input type="text" id="_address"></div><div><input type="button" id="trashadd" value="Enregistrer"></div></form>`;

            return form_container;

            
        }


        function trash_updateform(){
            let form_container = document.createElement('div');
            form_container.classList.add("form");
            form_container.classList.add("trashupdate");

            form_container.innerHTML = `<form id="trashUpdate"><div class="close">×</div><div><div>Nom</div><input type="text" id="u_name"></div><div><div>Longitude</div><input type="text" id="u_longitude"></div><div><div>Latitude</div><input type="text" id="u_latitude"></div><div><div>Adresse</div><input type="text" id="u_address"></div><div><input type="button" id="t_update" value="Enregistrer"></div><input id="u_id" type="hidden"></form><form id="trashUpdate"><div class="close">×</div><div><div>Nom</div><input type="text" id="u_name"></div><div><div>Longitude</div><input type="text" id="u_longitude"></div><div><div>Latitude</div><input type="text" id="u_latitude"></div><div><div>Adresse</div><input type="text" id="u_address"></div><div><input type="button" id="t_update" value="Enregistrer"></div><input id="u_id" type="hidden"></form>`;


            return form_container;

            
        }