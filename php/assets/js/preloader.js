var preloader = document.getElementById("preloader");
var content = document.getElementById("content");

var preloaderDiv = document.getElementById("preloaderDiv");
var navbar = document.getElementById("navbar");
var main = document.getElementById("main");
var loaded = document.body.classList.contains("loaded");

var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
var is_android = navigator.platform.toLowerCase().indexOf("android") > -1;


if (!loaded ) {

  navbar.classList.add("d-none");
  main.classList.add("d-none");

  if (!document.hasFocus()) {
    preloader.muted = true;
  } else if (performance.navigation.type === 1) {
    // Page is being reloaded, so mute the preloader
    preloader.muted = true;
  }
  

  preloader.play(); 
}

window.onbeforeunload = function() {
  preloader.muted = true;
  preloader.pause(); 
};


preloader.onended = function() {

    preloader.classList.add('fade-out');

    setTimeout(function() {
        preloaderDiv.classList.add('d-none');
        navbar.classList.remove("d-none");
      navbar.classList.add("d-block");
      main.classList.remove("d-none");
      main.classList.add("d-block");
        document.body.classList.add('loaded');

        setTimeout(function() {
            document.body.style.overflow = 'auto';
        }, 1000); 
    }, 1000); 
};