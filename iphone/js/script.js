if (navigator.userAgent.indexOf('iPhone') != -1) {
        addEventListener("load", function() {
                setTimeout(hideURLbar, 50);
        }, false);
}

function hideURLbar() {
        window.scrollTo(0, 1);
}

var updateLayout = function() {
  if (window.innerWidth != currentWidth) {
    currentWidth = window.innerWidth;
    var orient = (currentWidth == 320) ? "profile" : "landscape";
    document.body.setAttribute("orient", orient);
  }
};

iPhone.DomLoad(updateLayout);
setInterval(updateLayout, 500);