document.addEventListener("DOMContentLoaded", function() {
	let disabledInput = document.querySelectorAll('.disabled input');
	disabledInput.forEach(input => {
		input.setAttribute("disabled", true);
	});
})