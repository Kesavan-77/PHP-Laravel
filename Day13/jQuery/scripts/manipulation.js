$(function(){
    $('#create').click(function(){
        $('#content-box').html("<p>Eat Code Sleep Repeat</p>");
    })

    $('#change').click(function(){
        $('#content-box').text("Repeat Sleep Code Eat");
    })

    $('#changeAll').click(function(){
        $('#content-box p').text("Exited with return 0");
    })

    $('#append').click(function(){
        $("#content-box p").append("- Boss");
    })

    $('#prepend').click(function(){
        $("#content-box p").prepend("Boss - ");
    })

    $('#before').click(function(){
        $("#content-box p").before("<p>-----------</p>");
    })

    $('#after').click(function(){
        $("#content-box p").after("<p>*************</p>");
    })

    $('#wrap').click(function(){
        $('#content-box p').wrap("<div style='color:#fff'/>"); // same as wrapAll
    })

    $('#empty').click(function(){
        $('#content-box').empty(); // same as wrapAll
    })
})