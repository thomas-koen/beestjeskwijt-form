import apiFetch from "@wordpress/api-fetch";

const form = document.querySelector('.bk_form');

form.addEventListener('submit', handleSubmit);

form.querySelectorAll('input').forEach(function(input) {
	input.addEventListener('input', function() {
		this.setCustomValidity('');
	});
});

const submitButton = form.querySelector('[type="submit"]');

const successMessage = document.querySelector('.bk_form_success');
const errorMessage = document.querySelector('.bk_form_error');

function handleSubmit(event){
	event.preventDefault();

	const data = new FormData(event.target);

	const values = Object.fromEntries(data.entries());

	submitButton.disabled = true;

	apiFetch({
		path: '/bkf/v1/processform',
		data:values,
		method: 'POST',
	}).then((data) => {
		if(data === 'ok'){
			form.style.display = 'none';
			errorMessage.style.display = 'none';
			successMessage.style.display = 'block';
		}
	}).catch((error) => {
		if(error.data && error.data.field){
			let field = form.querySelector(`[name="${error.data.field}"]`);
			if(field) {
				field.setCustomValidity(error.message);
			}
			form.reportValidity();
		}else{
			errorMessage.style.display = 'block';
			errorMessage.innerHTML = error.message ?? 'Er ging iets verkeerd';
			errorMessage.scrollIntoView({
				behavior: 'smooth', // smooth scroll
				block: 'start'
			})
		}
	}).finally(() => {
		submitButton.disabled = false;
	});
}
