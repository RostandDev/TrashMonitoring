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

        function clearActive(){

            let drivers = document.querySelectorAll(".driver");

            for( let i= 0; i <drivers.length; i++){            
                    
                if(drivers[i].classList.contains('active'))  drivers[i].classList.remove("active");
                        
            }
        }
