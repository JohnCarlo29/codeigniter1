$(document).ready(function(){
	var baseurl = 'http://localhost/ci_praktis/'
	var url = location.href;
	var body = document.getElementsByTagName('body')[0];
	var script = document.createElement('script');

	console.log(url);

	switch(url){
		case baseurl+'requests':
			script.src = 'assets/js/requested.js';
			script.type = 'text/javascript';
			body.appendChild(script);
			break;
		case baseurl+'violations':
			script.src = 'assets/js/violations.js';
			script.type = 'text/javascript';
			body.appendChild(script);
			break;
		case baseurl+'violation_history':
			script.src = 'assets/js/violations.js';
			script.type = 'text/javascript';
			body.appendChild(script);
			break;
		case baseurl+'charts':
			script.src = 'assets/js/charts.js';
			script.type = 'text/javascript';
			body.appendChild(script);
			break;
		case baseurl+'users':
			script.src = 'assets/js/users.js';
			script.type = 'text/javascript';
			body.appendChild(script);
			break;
	}
});