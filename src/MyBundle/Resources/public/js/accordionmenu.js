$(document).ready(function(){

	// menu accordion
	$("#navigation ul .sousmenu").hide();
	$("#navigation ul a").click(function(){
		
		$("#navigation ul .sousmenu").slideUp();

		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown();
		}
	})

	// navbar fixed top on scroll
	// var offset = $(".navbar").offset().top;
	// var mq = window.matchMedia( "(min-width: 991px)" );
 //        $(document).scroll(function(){
 //            var scrollTop = $(document).scrollTop();
 //            if(scrollTop > offset){
 //                $(".navbar").css("position", "fixed");
 //                if (mq.matches) {
	// 			  $(".navbar").css("width", "73.8%");
	// 			} else {
	// 			  $(".navbar").css("top", "8%");
	// 			}
 //            }
 //            else {
 //                $(".navbar").css("position", "static");
 //                if (mq.matches) {
	// 			  $(".navbar").css("width", "89%");
	// 			} else {
	// 			  $(".navbar").css("width", "100%");
	// 			}

 //            }
 //        });

        var offset = $(".navbar").offset().top;
		var mq = window.matchMedia( "(min-width: 991px)" );
		$(document).ready(function(){
			if (!mq.matches) {
				$(".navbar").css("position", "fixed");
				$(".navbar").css("width", "100%");
				$(".slicknav_menu").css("top", "50px");
				$(".container").css("top", "50px");
			}
		})
		$(document).scroll(function(){
			// pc
				if (mq.matches) {
	         	var scrollTop = $(document).scrollTop();
	        		if(scrollTop > offset){
	            		$(".navbar").css("position", "fixed");
		            	$(".navbar").css("width", "73.8%");
		            	$(".navbar").css("top", "0");
					} else {
						$(".navbar").css("position", "static");
				  		$(".navbar").css("width", "89%");
					} 
				} else {
			//mobile
					$(".navbar").css("position", "fixed");
					$(".navbar").css("width", "100%");
					$(".slicknav_menu").css("top", "50px");
				}
			});

        $('#navigation').slicknav({
			label: 'Menu',
			duration: 1000,
			easingOpen: "swing", //available with jQuery UI
			prependTo:'body'
		});
})


