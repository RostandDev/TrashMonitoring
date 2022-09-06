        function _header(_form){
            let header = document.createElement('div');
            header.className = 'header';
            header.innerHTML = `<div class="header"><div id="alldelete" class="icofont-trash" style="display: none;"></div><div class="btns"><div id="open" class="icofont-plus-circle"></div><div class="icofont-trash max-delete" id="max-delete"></div><div class="icofont-close close-max-delete" id="max-delete" style="display: none;"></div></div></div>`;

            return header;

        }

        function clearActive(){

            let drivers = document.querySelectorAll(".driver");

            for( let i= 0; i <drivers.length; i++){            
                    
                if(drivers[i].classList.contains('active'))  drivers[i].classList.remove("active");
                        
            }
        }

        function _message(message){
            let pop = document.createElement('div');
            pop.id = 'message';
            pop.innerHTML = message;
            document.querySelector('.message').appendChild(pop);
            setTimeout(()=>{
                document.querySelector(".message").removeChild(pop);
            }, 2000); 
            
            
        }
