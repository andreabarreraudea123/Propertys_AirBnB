function validateSignup() {
	let type_identification = document.getElementById("type_identification").value;
	let identification = document.getElementById("identification").value;
	let name = document.getElementById("name").value;
	let lastname = document.getElementById("lastname").value;
	let email = document.getElementById("email").value;
	let password = document.getElementById("password").value;

	if (type_identification === "") {
		Swal.fire({
			title: "Error",
			text: "El campo type_identification esta vacio",
			icon: "error",
			confirmButtonText: 'Continuar',
			footer: '<span class="footer-alert">Esta información es importante</span>',
			background: '#ddd',
			backdrop: true,
			toast: true,
			position: 'center',
			allowOutsideClick: false,
			allowEscapeKey: true,
			allowEnterKey: true,
			stopKeydownPropagation: false,
			showConfirmButton: true,
			confirmButtonColor: '#c20707',
			confirmButtonAriaLabel: 'Continuar',
			buttonsStyling: true,
			showCloseButton: true,
			closeButtonAriaLabel: 'close alert'
		});
		return false;

	} else if (identification === "") {
		Swal.fire({
			title: "Error",
			text: "El campo identification esta vacio",
			icon: "error",
			confirmButtonText: 'Continuar',
			footer: '<span class="footer-alert">Esta información es importante</span>',
			background: '#ddd',
			backdrop: true,
			toast: true,
			position: 'center',
			allowOutsideClick: false,
			allowEscapeKey: true,
			allowEnterKey: true,
			stopKeydownPropagation: false,
			showConfirmButton: true,
			confirmButtonColor: '#c20707',
			confirmButtonAriaLabel: 'Continuar',
			buttonsStyling: true,
			showCloseButton: true,
			closeButtonAriaLabel: 'close alert'
		});
		return false;
	} else if (name === "") {
		Swal.fire({
			title: "Error",
			text: "El campo name esta vacio",
			icon: "error",
			confirmButtonText: 'Continuar',
			footer: '<span class="footer-alert">Esta información es importante</span>',
			background: '#ddd',
			backdrop: true,
			toast: true,
			position: 'center',
			allowOutsideClick: false,
			allowEscapeKey: true,
			allowEnterKey: true,
			stopKeydownPropagation: false,
			showConfirmButton: true,
			confirmButtonColor: '#c20707',
			confirmButtonAriaLabel: 'Continuar',
			buttonsStyling: true,
			showCloseButton: true,
			closeButtonAriaLabel: 'close alert'
		});
		return false;
	} else if (lastname === "") {
		Swal.fire({
			title: "Error",
			text: "El campo lastname esta vacio",
			icon: "error",
			confirmButtonText: 'Continuar',
			footer: '<span class="footer-alert">Esta información es importante</span>',
			background: '#ddd',
			backdrop: true,
			toast: true,
			position: 'center',
			allowOutsideClick: false,
			allowEscapeKey: true,
			allowEnterKey: true,
			stopKeydownPropagation: false,
			showConfirmButton: true,
			confirmButtonColor: '#c20707',
			confirmButtonAriaLabel: 'Continuar',
			buttonsStyling: true,
			showCloseButton: true,
			closeButtonAriaLabel: 'close alert'
		});
		return false;
	} else if (email === "") {
		Swal.fire({
			title: "Error",
			text: "El campo email esta vacio",
			icon: "error",
			confirmButtonText: 'Continuar',
			footer: '<span class="footer-alert">Esta información es importante</span>',
			background: '#ddd',
			backdrop: true,
			toast: true,
			position: 'center',
			allowOutsideClick: false,
			allowEscapeKey: true,
			allowEnterKey: true,
			stopKeydownPropagation: false,
			showConfirmButton: true,
			confirmButtonColor: '#c20707',
			confirmButtonAriaLabel: 'Continuar',
			buttonsStyling: true,
			showCloseButton: true,
			closeButtonAriaLabel: 'close alert'
		});
		return false;
	} else if (password === "") {
		Swal.fire({
			title: "Error",
			text: "El campo password esta vacio",
			icon: "error",
			confirmButtonText: 'Continuar',
			footer: '<span class="footer-alert">Esta información es importante</span>',
			background: '#ddd',
			backdrop: true,
			toast: true,
			position: 'center',
			allowOutsideClick: false,
			allowEscapeKey: true,
			allowEnterKey: true,
			stopKeydownPropagation: false,
			showConfirmButton: true,
			confirmButtonColor: '#c20707',
			confirmButtonAriaLabel: 'Continuar',
			buttonsStyling: true,
			showCloseButton: true,
			closeButtonAriaLabel: 'close alert'
		});
		return false;
	}
}

// function validateSignIn() {

// 	let email = document.getElementById("email").value;
// 	let password = document.getElementById("password").value;

// 	if (email === "") {
// 		Swal.fire({
// 			title: "Error",
// 			text: "El campo email esta vacio",
// 			icon: "error",
// 			confirmButtonText: 'Continuar',
// 			footer: '<span class="footer-alert">Esta información es importante</span>',
// 			background: '#ddd',
// 			backdrop: true,
// 			toast: true,
// 			position: 'center',
// 			allowOutsideClick: false,
// 			allowEscapeKey: true,
// 			allowEnterKey: true,
// 			stopKeydownPropagation: false,
// 			showConfirmButton: true,
// 			confirmButtonColor: '#c20707',
// 			confirmButtonAriaLabel: 'Continuar',
// 			buttonsStyling: true,
// 			showCloseButton: true,
// 			closeButtonAriaLabel: 'close alert'
// 		});
// 		return false;

// 	} else if (password === "") {
// 		Swal.fire({
// 			title: "Error",
// 			text: "El campo password esta vacio",
// 			icon: "error",
// 			confirmButtonText: 'Continuar',
// 			footer: '<span class="footer-alert">Esta información es importante</span>',
// 			background: '#ddd',
// 			backdrop: true,
// 			toast: true,
// 			position: 'center',
// 			allowOutsideClick: false,
// 			allowEscapeKey: true,
// 			allowEnterKey: true,
// 			stopKeydownPropagation: false,
// 			showConfirmButton: true,
// 			confirmButtonColor: '#c20707',
// 			confirmButtonAriaLabel: 'Continuar',
// 			buttonsStyling: true,
// 			showCloseButton: true,
// 			closeButtonAriaLabel: 'close alert'
// 		});
// 		return false;
// 	}
// }
