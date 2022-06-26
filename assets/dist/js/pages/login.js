function doLogin() {
	let config = {
		url: baseUrl + "api/auth/login",
		type: "POST",
		data: $("#f-login").serialize(),
		dataType: "json",
		headers: { "X-Requested-With": "XMLHttpRequest" },
	};

	$.ajax(config)
		.done(function (response) {
			console.log(response);
		})
		.fail(function ({ responseJSON }) {
			toastr.error(responseJSON.message, "Oops!");
		});
}
