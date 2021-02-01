/*!
 * Numerica - Numerica v1.0.0 ()
 * Copyright 2020-2021 Xavier SENENTE
 */

(function(window) {
  
  "use strict"; // Start of use strict

  if (document.querySelector('#slide1') !== null) { 
    
    document.querySelector('#slide1').classList.add('-active')

    var controller = new ScrollMagic.Controller({
      globalSceneOptions: {
        // définit le déclenchement du controller par rapport à la fenêtre du navigateur (onLeave = 0)
        triggerHook: 'onLeave',
        // permet l'animation du scroll en sens inverse
        reverse: true
      }
    });
  
    var slides = document.querySelectorAll(".scCarousel__item");
    var dots   = document.querySelectorAll(".scCarousel__navItem");
    // var links  = document.querySelectorAll(".scCarousel__navLink");
  
    new ScrollMagic.Scene({
      // définit le début de la scène
      triggerElement: '.scCarousel',
      duration: slides.length * 500
    })
    .setPin('.scCarousel')
    .setClassToggle('.scCarousel', '-active')
    .on("progress", function (event) {
      var interval = 1 / slides.length;
      for (var i = 0; i < slides.length; i++) {
        // console.log(slides[i])
        if (event.progress > interval * i && event.progress < interval * (i + 1) ) {
          // console.log(event.progress + 'pour passage ' + i )
          slides[i].classList.add('-active');
          dots[i].classList.add('-active');
        } else if ( event.progress < interval * slides.length && event.progress > 0.1 ) {
          slides[i].classList.remove('-active');
          dots[i].classList.remove('-active');
        }
      }
      // links.forEach(
      //   function(link) {
      //    link.addEventListener("click", function(event) {
      //     console.log(event.progress);
      //   });
      // });
      
      // el.addEventListener("click", modifyText, false);
    })
    .addTo(controller);
  }  


})(window); // End of use strict

function wrap(el, wrapper) {
  el.parentNode.insertBefore(wrapper, el);
  wrapper.appendChild(el);
  console.log(el)
}
 
if (document.querySelector('.carouselHeader') !== null) {
  // carousel de l'en-tête de la page d'accueil
  var flktyHeader = new Flickity( '.carouselHeader', {
    // options
    cellAlign: 'left',
    contain: true,
    wrapAround: true, 
    prevNextButtons: false, 
    autoPlay: 5000,
    pauseAutoPlayOnHover: false,
    fade: true,
    hash: true,
    on: {
      ready: function() {
        // console.log('Flickity ready');
        var titles = document.querySelectorAll(".carouselHeader__title");
        var dots   = document.querySelectorAll(".dot");
        for ( var i = 0; i < titles.length; ++i ) {
          var item = titles[i];
          // console.log(item.innerHTML);
          dots[i].append(item.innerHTML)
        }
      }
    }
  });

  // element that will be wrapped
  var el = document.querySelector('.flickity-page-dots');
  // create wrapper container
  var wrapper = document.createElement('div');
  wrapper.classList.add("container-fluid");
  // insert wrapper before el in the DOM tree
  el.parentNode.insertBefore(wrapper, el);
  // move el into wrapper
  wrapper.appendChild(el);
} 

if (document.querySelector('.carousel') !== null) {
  var carousel = document.querySelector('.carousel');
  if ( carousel ) {
    var flkty = new Flickity( carousel, {
      // options
      wrapAround: true,
      imagesLoaded: true,
      lazyLoad: 3,
      cellAlign: 'left',
      arrowShape: 'M44.314 64.142L31.586 51.414a2 2 0 010-2.828l12.728-12.728a2 2 0 112.828 2.828L37.828 48H73v4H37.828l9.314 9.314a2 2 0 11-2.828 2.828z'
    });
  }
}



// ------------- Menu Sticky -----------------

var MenuSticky = (function(w,d,undefined) {

	'use strict';

	var el_html = d.documentElement,
			el_body = d.getElementsByTagName('body')[0],
			header = d.getElementsByClassName('header'),
			menuIsStuck = function() {


			var wScrollTop	= w.pageYOffset || el_body.scrollTop,
				regexp		= /(nav\-is\-stuck)/i,
				classFound	= el_html.className.match( regexp ),
				navHeight	= header.offsetHeight,
				// bodyRect	= el_body.getBoundingClientRect(),
				scrollValue	= 600;
 
			// si le scroll est d'au moins 600 et
			// la class nav-is-stuck n'existe pas sur HTML
			if ( wScrollTop > scrollValue && !classFound ) {
				el_html.className = el_html.className + 'nav-is-stuck';
				el_body.style.paddingTop = navHeight + 'px';
			}
 
			// si le scroll est inférieur à 2 et
			// la class nav-is-stuck existe
			if ( wScrollTop < 2 && classFound ) {
				el_html.className = el_html.className.replace( regexp, '' );
				el_body.style.paddingTop = '0';
			}

		},
		onScrolling = function() {
			// on exécute notre fonction menuIsStuck()
			// dans la fonction onScrolling()
			menuIsStuck();
			// on pourrait faire plein d'autres choses ici 
		};
 
	// quand on scroll
	w.addEventListener('scroll', function(){
		// on exécute la fonction onScrolling()
		w.requestAnimationFrame( onScrolling );
	});


	// ------------- Menu Mobile -----------------

	// On cible les éléments à modifier
	var hamburger = document.querySelector(".menuBurger"),
			menu 			= document.querySelector(".menu"),
			page 			= document.documentElement;

	// La fonction permettant de basculer l'affichage en ajoutant/supprimant des classes
	function doToggle() {
		this.classList.toggle('-open');
		menu.classList.toggle('-open');
		page.classList.toggle('noscroll');
	}

// La fonction doToggle() est appelé lorsqu'on clique sur l'icone de menu
hamburger.addEventListener('click', doToggle);

// ------------- Search Form -----------------

// var hamburger = document.querySelector(".menuBurger"),
// 		menu 			= document.querySelector(".menu"),
// 		page 			= document.documentElement;

// function doToggle() {
// 	this.classList.toggle('-open');
// 	menu.classList.toggle('-open');
// 	page.classList.toggle('noscroll');
// }

// hamburger.addEventListener('click', doToggle);
 
}(window, document));
(function(window) {
  "use strict"; // Start of use strict

  


})(window); // End of use strict


// Smooth scrolling using jQuery easing pour les ancres
  /* $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 70)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });*/ 

  // Closes responsive menu when a scroll trigger link is clicked
  /* $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });*/

  // Activate scrollspy to add active class to navbar items on scroll
  // $('body').scrollspy({
  //   target: '#mainNav',
  //   offset: 100
  // });

  // Collapse Navbar
  /*var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };*/
  // Collapse now if page is not at top
  // navbarCollapse();
  // Collapse the navbar when page is scrolled
  // $(window).scroll(navbarCollapse);

// Splitting();                      
// ScrollOut({
//   targets: '[data-splitting]'
// });


(function(window) {

	'use strict';

	var openCtrl        = document.querySelector('.header__search'),
		  closeCtrl       = document.querySelector('.searchForm__close'),
		  searchContainer = document.querySelector('.searchForm'),
		  inputSearch     = searchContainer.querySelector('.searchForm__input');

	function init() {
		initEvents();	
	}

	function initEvents() {
		openCtrl.addEventListener('click', openSearch);
		closeCtrl.addEventListener('click', closeSearch);
		document.addEventListener('keyup', function(ev) {
			// escape key.
			if( ev.keyCode == 27 ) {
				closeSearch();
			}
		});
	}

	function openSearch() {
		searchContainer.classList.add('-open');
		inputSearch.focus();
	}

	function closeSearch() {
		searchContainer.classList.remove('-open');
		inputSearch.blur();
		inputSearch.value = '';
	}

	

	init();

})(window);