$(function() {
    $(".toggle").on("click", function() {
        if ($(".item").hasClass("active")) {
            $(".item").removeClass("active");
            $(this).find("a").html("<i class='fas fa-bars'></i>");
        } else {
            $(".item").addClass("active");
            $(this).find("a").html("<i class='fas fa-times'></i>");
        }
    });
});

/* Valoracion */

$(".clasificacion").find("input").change(function(){
    var valor = $(this).val()
    $(".clasificacion").find("input").removeClass("activo")
    $(".clasificacion").find("input").each(function(index){
       if(index+1<=valor){
        $(this).addClass("activo")
       }
       
    })
  })
  
  $(".clasificacion").find("label").mouseover(function(){
    var valor = $(this).prev("input").val()
    $(".clasificacion").find("input").removeClass("activo")
    $(".clasificacion").find("input").each(function(index){
       if(index+1<=valor){
        $(this).addClass("activo")
       }
       
    })
  })