$(document).ready(function () {
    $('.close-popover').click(function () {
        $(this).parent('.custom-popover').fadeOut();
    });
    $('#map-wrapper .navbar-toggle').click(function () {
        $('#toolbar').toggleClass('show');
    });
    $('.select-view a.fa-th').click(function () {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $('.tiles-view').fadeIn('slow');
        $('.list-view').fadeOut('slow');
        equalheight('.project-list .project-block');
    });
    $('.select-view a.fa-bars').click(function () {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $('.tiles-view').fadeOut('slow');
        $('.list-view').fadeIn('fast');

    });



    $('#profileeditTab').tabCollapse({
        tabsClass: 'hidden-sm hidden-xs',
        accordionClass: 'visible-sm visible-xs'
    });

});
equalheight = function (container) {

    var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;
    $(container).each(function () {

        $el = $(this);
        $($el).outerHeight('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}
$(window).load(function () {
   // equalheight('.project-list .project-block');
});






