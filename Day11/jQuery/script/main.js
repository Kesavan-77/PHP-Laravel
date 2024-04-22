// document.getElementById("btn-0").addEventListener("click", function() {
//     alert("hii boss");
// });

// document.getElementById("btn-1").addEventListener("mouseenter", function() {
//     this.style.display = "none";
// });

// document.getElementById("btn-2").addEventListener("click", function() {
//     this.style.display = "none";
// });

// document.getElementById("btn-3").addEventListener("dblclick", function() {
//     this.style.display = "none";
// });

// document.getElementById("navbtn").addEventListener("click", function() {
//     var navList = document.getElementById("nav-list");
//     if (navList.style.display === "block") {
//         navList.style.display = "none";
//     } else {
//         navList.style.display = "block";
//     }
// });

function showPassword(e){
    e.preventDefault();
    var passInput = $('#pass');
    if (passInput.length) {
        if (passInput.attr("type") === 'password') {
            passInput.attr("type", "text");
        } else if (passInput.attr("type") === 'text') {
            passInput.attr("type", "password");
        }
    }
}


$(function(){

    $("#btn-0").click(function(){
        alert("hii boss");
    })
    
    $("#btn-1").hover(function(){
        $(this).hide();
    })

    $("#btn-2").click(function(){
        $(this).hide();
    })

    $("#btn-3").dblclick(function(){
        $(this).hide();
    })

    $("#navbtn").click(function(){
        // $("#nav-list").fadeToggle(500);
        
        $("#nav-list").slideToggle(500,function(){
            $('.sub-content').slideToggle(500);
        });
    })

    $("#ques").click(function(){
        $('#content').slideToggle(500);
    })

    $('#nav-list a').on('click', function(event) {
        if (this.hash !== '') {
            event.preventDefault();
            var hash = this.hash;            
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1000, function(){
                window.location.hash = hash;
            });
        }
    });
})

