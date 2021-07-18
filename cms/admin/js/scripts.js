$(document).ready(function(){
    
   
    
    

    $('#selectAllBoxes').click(function(event){

        if(this.checked){

            $('.checkBoxes').each(function(){ 

                this.checked = true; 

            });

        } else {

            if(this.checked){

                $('.checkBoxes').each(function(){

                    this.checked = false; 

                });

            }  
        }
    });
});

               
       
       
       
       

      