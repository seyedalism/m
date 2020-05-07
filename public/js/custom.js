$('.tree-toggle').click(function () {
	$(this).parent().children('ul.tree').toggle(200);
});
$(function(){
    $('.tree-toggle').parent().children('ul.tree').toggle(200);
})

 $('.owl-carousel').owlCarousel({
        stagePadding: 10,
        dots:false,
        autoplay:true,
        autoplayTimeout:3500,
        autoplayHoverPause:true,
		items:10,
        center: true,
        rtl:true,
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:5
            }
        }
    })