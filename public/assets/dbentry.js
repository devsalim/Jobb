$("#submit1").click(function() {

		$.post($("myindividual").attr("action"),
		$("#myindividual :input").serializeArray(),
		function(info){
			$("#msg").empty();
			$("#msg").html(info);
		});
		
		$("#myindividual").submit(function() {
			return false;
		});
});