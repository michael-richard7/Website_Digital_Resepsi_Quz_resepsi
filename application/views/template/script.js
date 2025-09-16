$(document).ready(function () {
	$(".nav-link").on("click", "a", function () {
		$(".nav-link a.active").removeClass("active");
		$this().addClass("active");
	});
});
