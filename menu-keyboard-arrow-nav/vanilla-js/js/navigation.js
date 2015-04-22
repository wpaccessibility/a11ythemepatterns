// menu navigation with arrow keys 

( function() {

	var mainMenus = document.getElementsByClassName('menu');
	var subMenus = document.getElementsByClassName('sub-menu');

	var combinedMenus = [].concat(Array.prototype.slice.call(mainMenus), Array.prototype.slice.call(subMenus));
	var cMenusLen = combinedMenus.length;

	for(var m = 0; m < cMenusLen; m++) {
		var allMenuLis = combinedMenus[m].children;
		lisLen = allMenuLis.length;

		for (var l = 0; l < lisLen; l++) {
			allMenuLis.item(l).firstElementChild.addEventListener('keydown', function(e){
				var key = e.which || e.keyCode;

				// left key
				if(key === 37) {
					e.preventDefault();
					if(this.parentElement.previousElementSibling) {
						this.parentElement.previousElementSibling.firstElementChild.focus();
					}
				}
				// right key
				else if(key === 39) {
					e.preventDefault();
					if(this.parentElement.nextElementSibling) {
						this.parentElement.nextElementSibling.firstElementChild.focus();
					}
				}
				// down key
				else if(key === 40) {
					e.preventDefault();
					if(this.nextElementSibling){
						this.nextElementSibling.firstElementChild.firstElementChild.focus();
					}
					else if (this.parentElement.nextElementSibling) {
						this.parentElement.nextElementSibling.firstElementChild.focus();
					}
				}
				// up key
				else if(key === 38) {
					e.preventDefault();
					if(this.parentElement.previousElementSibling){
						this.parentElement.previousElementSibling.firstElementChild.focus();
					}
					else if (this.parentElement.parentElement.previousElementSibling){
						this.parentElement.parentElement.previousElementSibling.focus();
					}
				}

			}); //end add event listener
		}
	}

} )();
