document.forms[0].addEventListener('submit', event => {
	event.preventDefault();

	fetch(event.target.action, {
		method : 'POST',
		body   : new FormData(event.target)
	}).then(res => res.text()).then(result => {
		alert(result);
	});
});