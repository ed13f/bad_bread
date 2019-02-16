$( document ).ready(function() {
    console.log( "ready!" );
    $("#from_1").val("");

    // Gallery image window
    $('.gallery-img').on("click", function(){
    	console.log($( window ).width());
        if ($( window ).width() > 820 || window.innerHeight > window.innerWidth && $( window ).width() > 766){
    	$(this).closest("article").addClass("active-img");
    	$("#img-show-screen").addClass("active-screen");
    	$(".exit-screen").show();
    	$(".arrow").show();
        $('.gallery-img').removeClass("image-hover");
        }
    })
    $(".exit-screen").on("click", function(){
    	$(this).hide();
    	$(".arrow").hide();
    	$("#img-show-screen").removeClass("active-screen");
    	$(".active-img").removeClass("active-img");
        $('.gallery-img').addClass("image-hover");
    });

    $(".arrow").on("click", function(){
    	var $arrow = $(this);
    	var $gallery = $("#gallery-wrapper");
		if($arrow.attr("id") == "right-arrow"){
    		if( $gallery.find(".active-img").is(':last-child')){
    			$gallery.find(".active-img").removeClass("active-img"),
    			$gallery.children().first().addClass("active-img");
			} else {
				$gallery.find(".active-img").removeClass("active-img").next().addClass("active-img")	
			}
		} else {
    		if( $gallery.find(".active-img").is(':first-child')){
    			$gallery.find(".active-img").removeClass("active-img"),
    			$gallery.children().last().addClass("active-img");
			} else {
    			$gallery.find(".active-img").removeClass("active-img").prev().addClass("active-img")
    		}
    	}
    })

    // $(".home-image-container").hover( function(){
    //     console.log("hover");
    //     var $container = $(this);
    //     $container.find(".home-image-screen").addClass("active");
    //     $container.find(".home-link-page").addClass('slideRight');
    // },
    // function(){
    //     var $container = $(this);
    //     $container.find(".home-image-screen").removeClass("active");
    //     $container.find(".home-link-page").removeClass('slideRight');
    // }
    // )
    // nav stick
    var $mainMenu = $("#menu-main");
    var topOfNav = $mainMenu.offset().top;
    // $(window).resize(function(){
    //     console.log("resize");
    //     topOfNav = $mainMenu.offset().top;
    // });
    $(window).scroll(function() {
        if($(window).scrollTop() >= topOfNav) { //scrolled past the other div?
            $mainMenu.closest(".nav-container").addClass('sticky-nav');
            $(".nav-bar-logo").css("display","initial");
            // $(".menu-item-home").css("display","none");
        }
        else{
            $mainMenu.closest(".nav-container").removeClass('sticky-nav');
            $(".nav-bar-logo").css("display","none");
            // $(".menu-item-home").css("display","initial");
        }
    });

    // testimonial slider
    $(".quote-wrapper li:first-child").addClass("active-testimonial").css("opacity", "1");
    setInterval(function(){ 
        var $current = $(".quote-wrapper").find(".active-testimonial");
        $current.animate({
            opacity: 0
          }, 1000, function() {
            $current.removeClass("active-testimonial");
            if($current.is(':last-child')){
                $(".quote-wrapper li:first-child").addClass("active-testimonial");
            } else { 
                $current.next().addClass("active-testimonial");  
            }   
            $(".quote-wrapper li").css("opacity", "0"); 
            $(".quote-wrapper li").animate({
                opacity: 1
            },1000)  
          });   
    },10000);
    // Mobile menu open
    $('#mobile-menu-show').on("click", function(){
        console.log("mobile-click");
        $('.mobile-nav').animate({left: '+=165'}, 500)
        $('#mobile-menu-hide').removeClass('animated rotateOut');
        $('#mobile-menu-hide').addClass('animated rotateIn');
    })
    // Moble menu close
    $('#mobile-menu-hide').on('click', function(){
        $('.mobile-nav').animate({left: '-=165'}, 500)
        $('#mobile-menu-hide').removeClass('animated rotateIn');
        $('#mobile-menu-hide').addClass('animated rotateOut');
        
    })



});