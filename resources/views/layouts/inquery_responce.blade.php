<!-- Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
	$(function () {
	
		function changeTitle() {
			console.log("送信完了しました");
			$("#inquery_btn").click();
			$("#contactModalLabel").html("送信完了しました");
		};
	
		@if($inqueryComplete)		
		changeTitle();
		@endif

	});
</script>