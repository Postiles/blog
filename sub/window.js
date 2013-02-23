/* this file is for setting the style for subscribe file */

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
    var content = document.getElementById('content');
    var nWidth = (winW-1024)/2;
    var nHeight = (winH-586)/2 - 1;
    content.style.top = nHeight + "px";
    content.style.left = nWidth + "px";
    //content.style.top = '800px';

    var bLine = document.getElementById("bLine");
    var nHeight = (winH-10)/2;
    //bLine.style.top = nWidth + "px";
    bLine.style.top = nHeight + 'px';
}

window.onresize = function(event){
    adjust();
}
