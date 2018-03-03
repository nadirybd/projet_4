var navBar = document.getElementById('nav-bar');
var overlayMenu = document.getElementById('overlay');
var navMenu = document.querySelector('#hamburger nav');
var burgerButton = document.getElementById('hamburger-button');
var class_nav = 'mobile-nav';
var class_overlay = 'overlay-menu';

navBar.innerHTML = navMenu.innerHTML;

function activateHamburger(){
		burgerButton.addEventListener('click', function(e) {
			e.preventDefault();

			navBar.classList.toggle(class_nav);
			overlay.classList.toggle(class_overlay);
		});

		overlayMenu.addEventListener('click', function(e) {
			e.preventDefault();
			navBar.classList.remove(class_nav);
			overlay.classList.remove(class_overlay);
		});

		document.addEventListener('keyup', function(e) {
			if(e.repeat === false && e.which === 27){
				navBar.classList.remove(class_nav);
				overlay.classList.remove(class_overlay);
			}
		});	
}

activateHamburger();