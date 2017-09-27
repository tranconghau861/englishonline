var $states = $(".js-source-states");
var statesOptions = $states.html();
$states.remove();
$(".js-states").append(statesOptions);

$.fn.select2.amd.require([],
    function () {
		var $basicMultiple = $(".js-example-basic-multiple");  
		$basicMultiple.select2();  
	}
);