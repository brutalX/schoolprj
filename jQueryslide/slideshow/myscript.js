jQuery(function(){
 var nextSlide = $("#slides>img:eq(0)");
 var nxtSlideImgSrc;
 var playing = true;
 var pauseButton = document.getElementById('pause');
 console.log(nextSlide);


 
var slideInterval = setInterval(
   function(){
        $("#slide").fadeOut(500,
        function (){
        if (nextSlide.next().length == 0 ){
            
            nextSlide = $("#slides>img:eq(0)");
            
        }
        else {
            nextSlide = nextSlide.next();
        }
        nxtSlideImgSrc = nextSlide.attr("src");     
        $("#slide").attr("src",nxtSlideImgSrc).fadeIn(1000);
    })}, 2000)
    
   
    function pauseSlideshow(){
        pauseButton.innerHTML = 'Play';
        playing = false;
        clearInterval(slideInterval);
    }
    
    function playSlideshow(){
        pauseButton.innerHTML = 'Pause';
        playing = true;
        slideInterval = setInterval(
            function(){
                 $("#slide").fadeOut(500,
                 function (){
                 if (nextSlide.next().length == 0 ){
                     
                     nextSlide = $("#slides>img:eq(0)");
                     
                 }
                 else {
                     nextSlide = nextSlide.next();
                 }
                 nxtSlideImgSrc = nextSlide.attr("src");     
                 $("#slide").attr("src",nxtSlideImgSrc).fadeIn(1000);
             })}, 2000);
    }
    
    pauseButton.onclick = function(){
        if(playing){ pauseSlideshow(); }
        else{ playSlideshow(); }
    };    
});
