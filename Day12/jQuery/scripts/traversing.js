$(function(){

    $(".container2").children().css("border","2px solid red");

    $(".container2").parent().css("border","2px solid red");

    $(".container2").parents().css("border","2px solid red");

    $(".container2").parentsUntil($("body")).css("border","2px solid red");
    
    $("#p2").prev().prev().css("border","2px solid green");

    $("#p2").next().next().css("border","2px solid green");

    $(".container2").find("#p2").css("border","2px solid red");

    var padding = 1;
    var fontSize = 50;
    $(".container2 div").each(function(index,element){
        $(element).css("padding",padding+"rem")
        .css("font-size",fontSize+"px");
        padding += 0.6;
        fontSize += 20;
    })
})

