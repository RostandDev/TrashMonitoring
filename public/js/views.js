
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
                

                tr.appendChild(numtd);
                tr.appendChild(name_td);
                tr.appendChild(latitude_td);
                tr.appendChild(longitude_td);
                tr.appendChild(address_td);

                tbody.appendChild(tr);


            }            

            let _open = document.getElementById("open");
            let _close =  document.querySelector('.close');
            let _add = document.querySelector('trashadd');

            _close.onclick = ()=>{
               _insertTrash();
            } 

            _close.onclick = ()=>{
                document.querySelector('.trashadd').style.display = "none";
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
                droittd.innerHTML = _data.data[i]._access_level;
                

                tr.appendChild(numtd);
                tr.appendChild(last_name_td);
                tr.appendChild(first_name_td);
                tr.appendChild(emailtd);
                tr.appendChild(droittd);

                tbody.appendChild(tr);


            }

            
                let _open = document.getElementById("open");
                let _close =  document.querySelector('.close');

                _close.onclick = ()=>{
                    document.querySelector('.useradd').style.display = "none";
                }    

                _open.onclick = ()=>{
                    document.querySelector('.useradd').style.display = "block";
                }    
            
        })
  


    }






    


    



