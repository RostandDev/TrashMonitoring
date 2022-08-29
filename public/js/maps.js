 class Trash {

    constructor(_url){
        this._data;
        this._number;

        this._set_data();

      

    }

    _set_data(){
         
         xhr = new XMLHttpRequest();
         xhr.open('GET',this.url);
         xhr.onreadystatechange = function()
         {
             if(xhr.readyState == 4 && xhr.status == 200)
             {
                this._data = xhr.responseText;
             }
         }
         xhr.send(null);
         return xhr;
     }

    
 }