/**
 * define small squares in the canvas for animation
 */

$(function() {
    var section = $('.section');
    var sectionHeight = section.height();
    var sectionWidth = section.width();

    // backgrounds in section 4
    var bgContainer = $('.bg-container');
    var bgList = bgContainer.find('.bg-list');
    var bgs = bgList.find('.bg');
    var section4Up = true;
    var currBgScroll = 0;

    // section 3
    var sec3Title = $('#section-3 .title');
    var sec3Sub = $('#section-3 .sub-title');
    var canvas = $('.canvas');
    var sqs = $('.sq');

    var squares = [ ];
    for (var i in sqs) {
        squares.push({
            dom: sqs.eq(i),
            scale: -300 + Math.random() * 600,
        });
    }

    // dots at the bottom of the first page
    var dots = $('.dot');

    // section 5, button-box
    var buttonBox = $('.button-box');

    // radio icon
    var radio = $('.radio');

    var sectionContents = $('.content');

    var calSectionScrollTop = function(globalScrollTop, section_id) {
        return Math.max(0, globalScrollTop - sectionHeight * (section_id - 1));
    }

    var sec5Content = $('#section-5 .content');
    var subscribePic = sec5Content.find('.inner');
    sec5Content.css('padding-top', (sectionHeight - subscribePic.height()) / 2 - 100);

    $(document).scroll(function() {
        var scrollTop = $(document).scrollTop();

        var sectionScrollTop = [ 0, 1, 2, 3, 4 ];
        sectionScrollTop = sectionScrollTop.map(function(n) {
            return calSectionScrollTop(scrollTop, n);
        });

        var sectionScrollRatio = sectionScrollTop.map(function(n) {
            return n / sectionHeight;
        });

        /* section 1 */
        dots.eq(0).css('opacity', 1 - Math.max(0, sectionScrollTop[1]) / 300);
        dots.eq(1).css('opacity', 1 - Math.max(0, sectionScrollTop[1] - 100) / 300);
        dots.eq(2).css('opacity', 1 - Math.max(0, sectionScrollTop[1] - 200) / 300);

        /* section 2 */
        sectionContents.eq(1).css('left', scrollTop / 2 - 300);

        /* section 3 */
        sec3Title.css('margin-left', 200 * (sectionScrollRatio[2] - 1));
        sec3Sub.css('margin-left', 160 - 300 * (sectionScrollRatio[2] - 1));
        for (var i in squares) {
            var sq = squares[i];
            sq.dom.css('left', sq.scale * (sectionScrollRatio[2] - 1) + 150);
        }

        /* section 4 */
        if (sectionScrollTop[3] > sectionHeight * 0.85) {
            if (section4Up) {
                bgList.animate({
                    left: - sectionWidth,
                }, 400, function() {
                });
                section4Up = false;
            }
        } else if (sectionScrollTop[3] < sectionHeight * 0.85) {
            if (!section4Up) {
                bgList.animate({
                    left: 0,
                }, 400, function() {
                });
                section4Up = true;
            }
        }

        /* section 5 */
        buttonBox.css('left', 50 + sectionScrollTop[4] / 10);
        radio.css('-webkit-transform', 'rotate(' + (- sectionScrollRatio[4] * 50 + 30) + 'deg)');
    });
});
