var overlayMenu = document.getElementById('overlay');
var navMenu = document.querySelector('#menu nav');
var mobileMenu = document.querySelector('#menu .mobile-menu');
var burgerButton = document.getElementById('hamburger-button');
var class_overlay = 'overlay-menu';
var mobileMenu = 'menu-mobile';

function activateHamburger(){
	burgerButton.addEventListener('click', function(e) {
		e.preventDefault();

		navMenu.classList.toggle(mobileMenu);
		overlay.classList.toggle(class_overlay);
	});

	overlayMenu.addEventListener('click', function(e) {
		e.preventDefault();

		navMenu.classList.remove(mobileMenu);
		overlay.classList.remove(class_overlay);
	});

	document.addEventListener('keydown', function(e) {
		if(e.repeat === false && e.which === 27){

			navMenu.classList.remove(mobileMenu);
			overlay.classList.remove(class_overlay);
		}
		});	
}

activateHamburger();
