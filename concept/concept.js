$(function() {
    var section = $('.section');
    var sectionHeight = section.height();

    // dots at the bottom of the first page
    var dots = $('.dot');

    // last page, button-box
    var buttonBox = $('.button-box');

    // radio icon
    var radio = $('.radio');

    var section2Content = $('#section-2 .content');
    var section3Content = $('#section-3 .content');
    var section4Content = $('#section-4 .content');
    var section5Content = $('#section-5 .content');

    var sectionScrollTop = function(globalScrollTop, section_id) {
        return Math.max(0, globalScrollTop - sectionHeight * (section_id - 1));
    }

    $(document).scroll(function() {
        var scrollTop = $(document).scrollTop();

        dots.css('opacity', 1 - Math.max(0, scrollTop) / 500);

        var section2ScrollTop = sectionScrollTop(scrollTop, 2);
        var section4ScrollTop = sectionScrollTop(scrollTop, 4);

        section2Content.css('left', scrollTop / 2 - 300);
        // section3Content.css('top', sectionHeight - section2ScrollTop / 2 - 200);

        var section4ScrollRatio = section4ScrollTop / sectionHeight;
        buttonBox.css('left', 50 + section4ScrollTop / 10);
        radio.css('-webkit-transform', 'rotate(' + (- section4ScrollRatio * 50 + 30) + 'deg)');
    });
});
