$(document).ready(function(){
    $.getJSON("team.json", function(data){
        $.each(data, function(){
            $.each(this, function(key, value){
                $("#team").append(
                    "Name : " + value.name + "<br />" +
                    "Profession : " + value.profession+  "<br />" +
                    "City : " + value.city + "<br /> <br />" 
                )
            })
        })
    })
})