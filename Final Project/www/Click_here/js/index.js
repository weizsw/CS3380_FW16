$(document).ready(function(){
		var timejg=8000;//轮播间隔时间
		var size = $('.box_img .imgHolder ul li').size();
		for(var i=1;i<=size;i++){
			$('.box_tab').append('<a></a>')
		}

		$('.box_img .imgHolder ul li').eq(0).show();
		$('.box_tab a').eq(0).addClass('active')
		$('.box_tab a').click(function(){
			$(this).addClass('active').siblings().removeClass('active');
			var index = $(this).index();
			i=index;
			$('.box_img .imgHolder ul li').eq(index).stop().fadeIn(300).siblings().stop().fadeOut(300);
		});

		var i = 0;
		var time = setInterval(move,timejg);

		function move(){
			i++;
			if(i==size){
				i=0;
			}

			$('.box_tab a').eq(i).addClass('active').siblings().removeClass('active');
			$('.box_img .imgHolder ul li').eq(i).fadeIn(300).siblings().fadeOut(300);
		}

		$('.box').hover(function(){
			clearInterval(time);
		},function(){
			time = setInterval(move,timejg);
		});
	});

$(document).ready(function() {
	$(".token").click(function() {
		// z
		$("form").removeClass("hidden");
		$("form").toggle();

	})
})