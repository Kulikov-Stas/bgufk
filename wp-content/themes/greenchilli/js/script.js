$(document).ready(function(){

    /*$('.slider').bxSlider({
        pager: true,
        mode: 'fade'
    });*/

    $('[placeholder]').focus(function () {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
            input.val('');
            input.removeClass('placeholder');
        }
    }).blur(function () {
        var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
            input.addClass('placeholder');
            input.val(input.attr('placeholder'));
        }
    }).blur().parents('form').submit(function () {
        $(this).find('[placeholder]').each(function () {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        })
    });

    $('.clicktab').click(function () {
        $(this).parent().parent().find('.clicktab').removeClass('active');
        $(this).addClass('active');
        $('.blck').removeClass('activeblck');
        $($(this).attr('href')).addClass('activeblck')
        return false;
    });

        /*$('.slider_index2').each(function () {
        $(this).bxSlider({
            pager: false,
            slideWidth: 156,
            maxSlides: 5
        })
    })*/
        $('.question_item_toggle').click(function(){
            $(this).parent().find('.question_item_answer').slideToggle();
            return false;
        })
        $('.clear_search').click(function(){
            $(this).parent().find('.input_search').val("");
            $(this).parent().find('.input_search').focus();
            return false;
        })
        //$('.fancybox').fancybox({padding:0})
        $('.nav_secondary').html($('.nav>li.current-post-parent>a').parent().children('.sub-menu').html());    
        
        $('.nav>li>a').hover(function(){
            $('.nav_secondary').html($(this).parent().children('.sub-menu').html());
        }, function(){})
        $('nav').hover(function(){},function(){
            $('.nav_secondary').html($('.nav>li.current-post-parent>a').parent().children('.sub-menu').html());           
        });

});
