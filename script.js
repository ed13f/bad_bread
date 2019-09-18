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
        // $('.gallery-img').addClass("image-hover");
    });

    //Mailchimp submissions
    $('#mailchimp').submit(function(e){
        e.preventDefault();
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var testPhoneNumber = /^\W\d{3}\W\s\d{3}\W\d{4}/i;
        var mailchimpform = $(this);
        var fullNameInput = mailchimpform.find("#fullname");
        var fullNameValue = fullNameInput.val();
        var locationInput = mailchimpform.find("#location");
        var locationValue = locationInput.val();
        var phoneNumberInput = mailchimpform.find("#phone_number");
        var phoneNumberValue = phoneNumberInput.val();
        var emailInput = mailchimpform.find("#email");
        var emailValue = emailInput.val();
        var descriptionInput = mailchimpform.find("#description");
        var descriptionValue = descriptionInput.val();
        if(fullNameValue != "" && locationValue != "" && phoneNumberValue != "" && emailValue != "" && descriptionValue != "" && testEmail.test(emailValue) && testPhoneNumber.test(phoneNumberValue)){
        $.ajax({
            url:mailchimpform.attr('action'),
            type:'POST',
            data:mailchimpform.serialize(),
            success:function(data){
                console.log(data);
                var form = $('#mailchimp')
                var inputs = form.find('input').addClass("form-submitted");
                var labels = form.find('label').addClass("form-submitted");
                form.find('.submit input').val("Submitted!");
            }
        });
        return false;
        } else{
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            var testPhoneNumber = /^\W\d{3}\W\s\d{3}\W\d{4}/i;
            if(fullNameValue == ""){
                fullNameInput.attr("placeholder", "Name Required");
                fullNameInput.siblings("label").addClass("active-input");
            }
            if(locationValue == ""){
                locationInput.attr("placeholder", "Location Required");
                locationInput.siblings("label").addClass("active-input");
            }
            if(phoneNumberValue == ""){
                phoneNumberInput.attr("placeholder", "Phone Number Required");
                phoneNumberInput.siblings("label").addClass("active-input");
            }
            if(emailValue == ""){
                emailInput.attr("placeholder", "Email Required");
                emailInput.siblings("label").addClass("active-input");
            }
            if(descriptionValue == ""){
                descriptionInput.attr("placeholder", "Description Required");
                descriptionInput.siblings("label").addClass("active-input");
            }
            if(phoneNumberValue != "" && !testPhoneNumber.test(phoneNumberValue)){
                phoneNumberInput.val("");
                phoneNumberInput.attr("placeholder", "Not a Valid Number");
                phoneNumberInput.siblings("label").addClass("active-input");
            }
            if(emailValue != "" && !testEmail.test(emailValue)){
                emailInput.val("");
                emailInput.attr("placeholder", "Not a Valid Email");
                emailInput.siblings("label").addClass("active-input");
            }
        }
    });
    $('body').on('input', "#phone_number", function(e){
            var output,
              $this = $(this),
              input = $this.val();
              
              if(/\)$/.test(input) || /\-$/.test(input)){
                output = input.substring(0, input.length - 1);
                $this.val(output);
                return
              } else if(/\)\s$/.test(input)){
                output = input.substring(0, input.length - 2);
                $this.val(output);
                return
              } else if(/\($/.test(input) || input == ""){
                output = "";
                $this.val(output);
                return
              }
            if(e.keyCode != 8) {
              input = input.replace(/[^0-9]/g, '');
              var area = input.substr(0, 3);
              var pre = input.substr(3, 3);
              var tel = input.substr(6, 4);
              if (area.length < 3) {
                output = "(" + area;
              } else if (area.length == 3 && pre.length < 3) {
                output = "(" + area + ") " + pre;
              } else if (area.length == 3 && pre.length < 3) {
                output = "(" + area + ")" + " " + pre;
              } else if (area.length == 3 && pre.length == 3) {
                output = "(" + area + ")" + " " + pre + "-" + tel;
              }
              $this.val(output);
            }
        })

    // Slide show

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
        if($(window).scrollTop() + 17 >= topOfNav) { //scrolled past the other div?
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
    // monile menu animation
    $(".mobile-menu-button").on("click", function(){
        if($(this).hasClass("clicked")){
            $(this).removeClass("clicked")
            $("#menu-main-menu").removeClass("active-nav-menu")
            $(".mobile-nav").removeClass("active-nav");
        }else{
            $(this).addClass("clicked")
            $("#menu-main-menu").addClass("active-nav-menu")
            $(".mobile-nav").addClass("active-nav");
        } 
    })
    // input animation
    $("input").on("focus", function(){
      $(this).siblings("label").addClass("active-input")
    })
    $("input").on("focusout", function(){
      
      var activeInput = $(this);
      console.log(activeInput.val())
      if(activeInput.val() == '' && activeInput.attr('placeholder') == null){
        $(this).siblings("label").removeClass("active-input");
      }  
    })



});