 $(
	function(){
		$('#test').hover(
			function(){
				$(this).addClass('bounce');
			},
			function(){
				$(this).removeClass('bounce');
			});
	}
);