$(function() {
	$('[data-toggle="tooltip"').tooltip();
});
$(function() {
	$(".sticky-content").sticky({
		topSpacing: 50,
		zIndex: 2,
		stopper: "#footer"
	});
});
