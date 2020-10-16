
// Snippet Menu Fixed Positioning Toggle
var startProductBarPos=0;

window.onscroll=function(){
    var foo = document.getElementById('snippet-types');
    var bar = document.getElementById('list-snippets');
    var cont = document.getElementById('contentBlog');
    if(startProductBarPos<1)startProductBarPos=findPosY(bar);

    if(pageYOffset>startProductBarPos){
        var contwidth = cont.offsetWidth;
        var thirty = .3;
        var contcalc = (contwidth * thirty - 6)+'px';
        foo.style.position='fixed';
        foo.style.width=contcalc;
        foo.style.top=0;
    }else{
        foo.style.position='relative';
        foo.style.width='100%';
    }

};

function findPosY(obj) {
    var curtop = -5;
    if (typeof (obj.offsetParent) != 'undefined' && obj.offsetParent) {
        while (obj.offsetParent) {
            curtop += obj.offsetTop;
            obj = obj.offsetParent;
        }
        curtop += obj.offsetTop;
    }
    else if (obj.y)
        curtop += obj.y;
    return curtop;
}
