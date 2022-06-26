$(document).ready(function () {
	$("#generalTable").DataTable({
		paging: true,
		lengthChange: false,
		searching: false,
		ordering: true,
		info: true,
		autoWidth: false,
		responsive: true,
	});
});

function deleteItem(endpoint) {
	Swal.fire({
		title: "Warning!",
		text: "Are you sure to delete this item ? Deleted item will never be retrieve again.",
		icon: "warning",
		showCancelButton: true,
	}).then(({ isConfirmed }) => {
		if (isConfirmed) {
			$.post(endpoint).done(function (response) {
				response = JSON.parse(response);

				if (response.status === "success") {
					Swal.fire("Success!", response.message, "success").then(() => {
						window.location.reload();
					});
				} else {
					Swal.fire("Error!", response.message, "error").then(() => {
						window.location.reload();
					});
				}
			});
		}
	});
}
