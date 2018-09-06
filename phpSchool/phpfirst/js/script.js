$(document).ready(function(){
    function submitAjax() {
        var na = $('#name').value;
        var em = $('#email').value;
        var ms = $('message').value;
        if (na=="" || em=="" ||  ms=="") {
            $('#ajaxDiv').style.visibility="visible";
            $("#ajaxDiv").html("<span class='alert alert-danger'>Please provide the following info.<span/>");

        }
        else if(na!="" && em!="" && ms!=""){
            $('#ajaxDiv').style.visibility="visible";
            var data = $('#contactForm').serialize();
            $.ajax({
            url: "mail.php",
            method: "POST",
            data: {"data" : data },
            success:  function(response){
                $("#ajaxDiv").html("<span class='alert alert-success'>We will keep in touch shortly<span/>");
                $("#contactForm").reset();
            }
            }); // end of ajax call
        }



    }

})