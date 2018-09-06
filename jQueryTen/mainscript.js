jQuery(function(){
   
 
  
   $("#inform input").focus(function(){
       $(this).css("border-color","#ced4da")
       $(this).css("background-color","white")
   })
   
   $("#inform").submit(function(){
      var emptyInput = $(this).parent().find("input").filter(function () { 
          return this.value === "";
       })
       console.log(emptyInput)
       
    //    emptyInput.css("border-color","red")
      
       jQuery.each(emptyInput, function(key,value){
           $(value).css("border-color","red")
           $(value).css("background","yellow")

       })
       emptyInput.eq(0).tooltip('show',{
           title: "This should be fill"
       })

        $("#firstname").attr("title","FirstName should be fill").tooltip({
            trigger: "click"
        });


       
       $("#inform input").focusout(function(){
        if(this.value == "")    {
         $(this).css("border-color","red")
         $(this).css("background-color","yellow")
         $("#firstname").attr("title","this should be fill").tooltip('hide');
         
        }else{
         $(this).css("border-color","#ced4da")
         $(this).css("background-color","white")
        }
        })
       
   
        
    })

   

   
    
})