        function _header(_form){
            let header = document.createElement('div');
            header.className = 'header';


            let btns = document.createElement('div');
            btns.className = "btns";

            let addbtn = document.createElement('div');
            
            addbtn.id ="open";
            addbtn.className ="icofont-plus-circle";

            let alldelete = document.createElement('div');
            
            alldelete.id ="alldelete";
            alldelete.className ="icofont-trash";
            alldelete.style.display = 'none';

            
            

            let deletebtn = document.createElement('div');
            deletebtn.className = "icofont-trash";
            deletebtn.classList.add("max-delete");
            deletebtn.id = "max-delete";

            let delete_close_btn = document.createElement('div');
            delete_close_btn.className = "icofont-close";
            delete_close_btn.classList.add("close-max-delete");
            delete_close_btn.id = "max-delete";
            delete_close_btn.style.display = "none";

            btns.appendChild(addbtn);
            btns.appendChild (deletebtn);
            btns.appendChild (delete_close_btn);
            
            header.appendChild (alldelete);

            header.appendChild(btns);

            return header;

        }

        function clearActive(){

            let drivers = document.querySelectorAll(".driver");

            for( let i= 0; i <drivers.length; i++){            
                    
                if(drivers[i].classList.contains('active'))  drivers[i].classList.remove("active");
                        
            }
        }
