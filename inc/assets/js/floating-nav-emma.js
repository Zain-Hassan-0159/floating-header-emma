jQuery(document).ready(function ($) {

    const floating_header = $('.floating_header');
    const selected_sections = floating_header.find('ul li a');

    // Attach scroll event listener
    $(window).scroll(function () {
        selected_sections.each(function(){
            const distanceFromTop = $(window).scrollTop();
            const item = $(this);
            const itemTop = $(item.data('href'))?.offset()?.top;
            if((distanceFromTop + 150) > itemTop){
                selected_sections.removeClass('active')
                item.addClass("active")
            }
        })
    });

    selected_sections.on("click", function(){
        selected_sections.removeClass("active");
        $(this).addClass("active");
    })
});