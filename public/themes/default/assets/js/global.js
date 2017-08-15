$(document).ready(function(){
    $('.navbar ul li').click(function(){
        var sectionId = $(this).find('a').attr('data-id');
        var me = $(this);
        $('html, body').animate({
            scrollTop: $(sectionId).offset().top
        }, 'slow');
        $('body').scroll();
    });

    var nav = $('#myNav').offset().top;
    var temp = nav;
    $(".navbar-toggle").click(function(){
        if (!$(".navbar ").hasClass('navFix')){
            setTimeout(function(){
                nav = $('.navbar-header').offset().top;
            },500)
        }else{
            nav = temp;
        }
    });

    $('.error').hide();

    $('#contactForm').submit(function(e){
        e.preventDefault();
        if($('#name').val() == '' || $('#emailAdd').val() == '' || $('.msg').val == ''){
            $('.error').show();
        } else{
        $.ajax({
            url: "/submitMessage",
            type:"POST",
            data: $('#contactForm').serializeArray()
        }).done(function() {
           alert("SUCCESS");
        });
        }
    });

    $(window).scroll(function() {
    var windscroll = $(window).scrollTop();
        if(windscroll >= nav){
            $('#myNav').addClass('navFix');
        }if(windscroll <= nav){
            $('#myNav').removeClass('navFix');
        }
        if (windscroll < $("#about").offset().top-400){
            $(".navbar ul li").removeClass("active");
            $("#menuHome").addClass("active");
            $(".btn-up").fadeOut();
        }
        if ((windscroll > $("#about").offset().top-200) && (windscroll < $("#skills").offset().top-500)){
            $(".navbar ul li").removeClass("active");
            $("#menuAbout").addClass("active");
            $(".btn-up").fadeIn();
        }
        if ((windscroll > $("#skills").offset().top-200) && (windscroll < $("#projects").offset().top-500)){
            $(".navbar ul li").removeClass("active");
            $("#menuSkills").addClass("active");
            if (!$("#skills").hasClass('animated')){
                animationCircle(htmlCircle,0.83, 2000, "HTML ", "#eeff35");
                animationCircle(cssCircle,0.81, 1700, "CSS ", "#544fff");
                animationCircle(bootstrapCircle,0.75, 1250, "Bootstrap ", "#325ff0");
                animationCircle(jsCircle,0.61, 800, "JavaScript ", "#551112");
                animationCircle(jqueryCircle,0.7, 800, "Jquery ", "#ff5511");
                $("#skills").addClass('animated');
            }
        }
        if ((windscroll >$("#projects").offset().top-200)&& (windscroll < $("#timeline").offset().top-500)){
            $(".navbar ul li").removeClass("active");
            $("#menuProjects").addClass("active");
        }
        if (windscroll >$("#timeline").offset().top-100){
            $(".navbar ul li").removeClass("active");
            $("#menuTimeline").addClass("active");
        }
    }).scroll();

    function animationCircle(idName, animatePercentage, spinTime, skillLabel, circleColor, id){
        $(id + " svg").remove();
        var bar = new ProgressBar.Circle(idName, {
            color: '#000',

            strokeWidth: 7,
            trailWidth: 1,
            easing: 'easeInOut',
            duration: spinTime,
            text: {
                autoStyleContainer: false
            },
            from: { color: '#aaa', width: 1 },
            to: { color: circleColor, width: 4 },

            step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('strokdashoffset', state.width);

                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('');
                } else {
                    circle.setText(skillLabel  +value + '%');
                }

            }
        });
        bar.animate(animatePercentage);
    }

    $('.btn-up').click(function(){
        $('html, body').animate({
            scrollTop: 0
        }, 'slow');
    });

    $(".navbar-brand").click(function(){
        $('#menuHome').addClass("active");
        $('html, body').animate({
            scrollTop: $("#home").offset().top
        }, 500);
    });

    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        autoplay: 3000,
        speed: 1500,
        loop: true
    });

    if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        new WOW().init();
    }


});