
    
   function loadusersonline()
    
    {
       $.get("functions.php?usersonline=result", function(data){
             
             $(".usersonline").text(data);
       });
        
    }




setInterval(function(){
  loadusersonline();            
    
    
},500);

     
       