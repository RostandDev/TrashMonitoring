(
    function(){

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
        }


        //requete de reccupération des données
        function request(_url){
            return new Promise((_resp, _fail ) => {
                let xhr = new XMLHttpRequest();
                
                xhr.open("GET", _url);
                
                xhr.onreadystatechange =  () =>{
                
                    if(xhr.readyState == 4 && xhr.status == 200){
                        _resp(xhr.responseText);
                                
                    }
                    else{
                                    
                        _fail(`Erreur : status : ${xhr.status} et readstate : ${xhr.readyState}`)
                    }
                }
                
                    xhr.send(null);
            });
        }
        
    }
)();
    
    

    
