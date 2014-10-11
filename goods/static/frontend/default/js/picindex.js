$(document).ready(function(){
    var ali=$('#lunbonum li');
    var aPage=$('#lunhuanback p');
    var aslide_img=$('.lunhuancenter b');
    var iNow=0;
	
    ali.each(function(index){	
        $(this).mouseover(function(){
            slide(index);
        })
    });
	
    function slide(index){	
        iNow=index;
        ali.eq(index).addClass('lunboone').siblings().removeClass();
		aPage.eq(index).siblings().stop().animate({opacity:0},600);
		aPage.eq(index).stop().animate({opacity:1},600);	
        aslide_img.eq(index).stop().animate({opacity:1,top:-10},600).siblings('b').stop().animate({opacity:0,top:-40},600);
    }
	
	function autoRun(){	
        iNow++;
		if(iNow==ali.length){
			iNow=0;
		}
		slide(iNow);
	}
	
	var timer=setInterval(autoRun,4000);
		
    ali.hover(function(){
		clearInterval(timer);
	},function(){
		timer=setInterval(autoRun,4000);
    });
	
	//圆点
	var $menuLi = $('#nav .menu');
            var $menuHd = $('#nav .menu-hd');
            var $menuBd = $('#nav .menu-bd');
            var $arrow = $('#nav .m1 i');
            $menuBd.hover(function () {
                $menuHd.addClass('on');
            }, function () {
                $menuHd.removeClass('on');
            });
            $menuLi.hover(function () {
                $menuHd.children('b').addClass('b-on');
            }, function () {
                $menuHd.children('b').removeClass('b-on');
         })
   //tab切换
   //五谷杂粮
    $('.my-zal .zl_title p').hover(function() {
	   $(this).addClass("selected").siblings().removeClass(); 
	   $(".zl-cont > ul").hide().eq($('.my-zal .zl_title p').index(this)).show();
     });
	$("#guide_2").hover(function(){
	   $(this).find(".category").removeClass("non");
	},function(){
	   $(this).find(".category").addClass("non");
	});
	/*购物车/浏览记录*/
	$(".head-user-menu dl").hover(function() {
		$(this).addClass("hover");
	},
	function() {
		$(this).removeClass("hover");
	});
	$('.head-user-menu .my-mall').mouseover(function(){// 最近浏览的商品
		load_history_information();
		$(this).unbind('mouseover');
	});
	$('.head-user-menu .my-cart').mouseover(function(){// 运行加载购物车
		load_cart_information();
		$(this).unbind('mouseover');
	});
})