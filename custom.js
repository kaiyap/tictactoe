var moves;

$(document).ready(function() {
	$("#status").text("Ready! Your move");
	moves = "";
});

$("#grid").on("click", function (event) {
	var lastMove = event.target.id;
	
	// Clear errors
	$(".alert-warning").removeClass("alert alert-warning");
	$(".alert-danger").removeClass("alert alert-danger");
	
	if (moves.includes(lastMove)) {
		$("#status").text("Already taken, try again");
		$("#"+event.target.id).addClass("alert alert-danger").hide().fadeIn("slow");
	} else {
		$("#"+lastMove).text("X");
		if (moves=="") {
			moves = lastMove;
		} else {
			moves = moves + "," + lastMove;
		}

		$.ajax({
			url: 'api.php?moves='+moves,
			dataType: "json",
			success: function(response) {
				if (response.http_code == 200) {
					$("#status").text(response.message).hide().fadeIn("slow");
					if (response.status_code == "PLAYON") {
						$("#"+response.move).text(response.symbol).addClass("alert alert-warning").hide().fadeIn("slow");
						moves = moves + "," + response.move;
					} else if (response.status_code == "END") {
						$("#"+response.move).text(response.symbol);
						$("#status").text(response.message).hide().fadeIn("slow");
						// Color the winning boxes
						for (var i=0; i<response.highlight.length; i++) {
							$("#"+response.highlight[i]).toggleClass("alert alert-success").hide().fadeIn("slow");
						}
						$("#status").append('<p><button type="button" class="btn btn-primary btn-lg" onClick="window.location.reload();">Play again</button></p>');
						$("#grid").off('click');
					}
				} else {
					$("#status").text(response.message).addClass("alert alert-danger");
				}
			}
		});
	};
});
