window.onload = function() {
	// Creating HTML alert errors
	const alerts = {
		"code": "<div class=\"alert alert-danger\">Error: Se ha modificado el código de cliente!</div>",
		"user": "<div class=\"alert alert-danger\">Error: El usuario debe iniciar con las letras \"XMX\" y debe tener una longitud de 6 caracteres</div>",
		"name": "<div class=\"alert alert-danger\">Error: El nombre debe contener entre 5 y 15 caracteres!</div>",
		"job": "<div class=\"alert alert-danger\">Error: El nombre del cargo debe contener entre 5 y 10 caracteres!</div>",
		"phone": "<div class=\"alert alert-danger\">Error: El teléfono debe tener una longitud de 7 caracteres y solo contener números (El código de pais se agregará de forma automática)</div>",
		"email": "<div class=\"alert alert-danger\">Error: El correo electrónico ingresado no tiene un formato válido!</div>"
	}

	// Getting DOM required Elements
	//Buttons
	const clearButton = document.getElementById('clear');
	const submitButton = document.getElementById('send');
	//Alert boxes
	const codeAlerts = document.getElementById('codeAlert');
	const userAlerts = document.getElementById('userAlert');
	const nameAlerts = document.getElementById('nameAlert');
	const jobAlerts = document.getElementById('jobAlert');
	const phoneAlerts = document.getElementById('phoneAlert');
	const emailAlerts = document.getElementById('emailAlert');
	//Input fields
	const codeField = document.getElementById('clientCode');
	const userField = document.getElementById('user');
	const nameField = document.getElementById('name');
	const jobField = document.getElementById('job');
	const phoneField = document.getElementById('phone');
	const emailField = document.getElementById('email');
	const mobileField = document.getElementById('mobile');
	const typeField = document.getElementById('type');
	const webstoreAuthField = document.getElementById('webstoreAuth');
	const orderAuthField = document.getElementById('orderAuth');
	const passwordSendField = document.getElementById('passwordSend');
	//Auxiliary elements
	const watermark = document.getElementById('watermark');

	// Triggering changes for phone field
	phoneField.addEventListener('change', (event) => {
		if (watermark.classList.contains('d-none')) {
			watermark.classList.remove('d-none');
		}
		if (!phoneField.classList.contains('filled')) {
			phoneField.classList.add('filled');
		}
	});

	// Clearing all data once user clicks on Cancel
	clearButton.addEventListener('click', (event) =>{
		codeAlerts.innerHTML = '';
		userAlerts.innerHTML = '';
		nameAlerts.innerHTML = '';
		jobAlerts.innerHTML = '';
		phoneAlerts.innerHTML = '';
		emailAlerts.innerHTML = '';
		codeField.value = 'xmxwebdemo2';
		userField.value = '';
		nameField.value = '';
		jobField.value = '';
		phoneField.value = '';
		emailField.value = '';
		mobileField.value = '';
		typeField.value = '';
		webstoreAuthField.checked = false;
		orderAuthField.checked = false;
		passwordSendField.checked = false;
	});

	// Clearing all data once user clicks on Cancel
	submitButton.addEventListener('click', (event) =>{
		
		// Stop form submit
		event.preventDefault();
		
		// Cleaning alerts
		codeAlerts.innerHTML = '';
		userAlerts.innerHTML = '';
		nameAlerts.innerHTML = '';
		jobAlerts.innerHTML = '';
		phoneAlerts.innerHTML = '';
		emailAlerts.innerHTML = '';
		
		// Setting data as valid by default
		let validData = true;
		
		// Running validation functions
		if (!validateCode(codeField.value)) {
			codeAlerts.innerHTML = alerts.code;
			validData = false;
		}

		if (!validateUser(userField.value)) {
			userAlerts.innerHTML = alerts.user;
			validData = false;
		}

		if (!validateName(nameField.value)) {
			nameAlerts.innerHTML = alerts.name;
			validData = false;
		}

		if (!validateJob(jobField.value)) {
			jobAlerts.innerHTML = alerts.job;
			validData = false;
		}

		if (!validatePhone(phoneField.value)) {
			phoneAlerts.innerHTML = alerts.phone;
			validData = false;
		}

		if (!validateEmail(emailField.value)) {
			emailAlerts.innerHTML = alerts.email;
			validData = false;
		}

		// If data still seems valid send form
		if (validData) {
			document.getElementById('webform').submit();
		}
	});
}
// Validating the code was not modified
function validateCode(code){
	if(code != "xmxwebdemo2"){
		return false;
	}
	return true;
}

// Validating username comp
function validateUser(user){
	// Validating user field length
	if (user.length != 6) {
		return false;
	}
	// Validating start with XMX
	let pattern = /^XMX/;
	if (!pattern.test(user)) {
		return false;
	}
	return true;
}

// Validating client's name
function validateName(name){
	if (name.length < 5 || name.length > 15) {
		return false;
	}
	return true;
}

// Validate client's job name
function validateJob(job){
	if (job.length < 5 || job.length > 10) {
		return false;
	}
	return true;
}

// Validating client's phone
function validatePhone(phone){
	// Validating length
	if (phone.length != 7) {
		return false;
	}
	let pattern = /\D/;
	// Validating only numbers
	if (pattern.test(phone)) {
		return false;
	}
	return true;
}

function validateEmail(email){
	let pattern =  /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
	if (!pattern.test(email)) {
		return false;
	}
	return true;
}
