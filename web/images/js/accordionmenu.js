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
	var offset = $(".navbar").offset().top;
        $(document).scroll(function(){
            var scrollTop = $(document).scrollTop();
            if(scrollTop > offset){
                $(".navbar").css("position", "fixed");
                $(".navbar").css("margin-top", "-150px");
                // $(".navbar").css("padding-right", "50%");
            }
            else {
                $(".navbar").css("position", "static");
                $(".navbar").css("margin-top", "0px");
                $(".navbar").css("padding-right", "0");
            }
        });
})


