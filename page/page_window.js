/* this file is for setting the style for page window */

window.onload = function(){
    adjust();
}

var adjust = function(){
    var winW = 630, winH = 460;
    if (document.body && document.body.offsetWidth) {
         winW = document.body.offsetWidth;
          winH = document.body.offsetHeight;
    }
    if (document.compatMode=='CSS1Compat' &&
                document.documentElement &&
                    document.documentElement.offsetWidth ) {
         winW = document.documentElement.offsetWidth;
          winH = document.documentElement.offsetHeight;
    }
    if (window.innerWidth && window.innerHeight) {
         winW = window.innerWidth;
          winH = window.innerHeight;
    }

    var body = document.getElementById('body');
    var nHeight = winH-120;
    body.style.height = nHeight + 'px';

    var page_content = document.getElementById('page_content');
    var pageH = nHeight - 185;
    page_content.style.height = pageH + 'px';
}

window.onresize = function(event){
    adjust();
}
