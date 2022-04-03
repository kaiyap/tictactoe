<?php
// Config
$GRID_SIZE = 3;
$RANDOM_MOVE = true;

// Constants
$ALL_SQUARES = range(1, pow($GRID_SIZE,2));
$PLAYER_1_SYMBOL = "X";
$PLAYER_2_SYMBOL = "O";

if (isset($_GET['moves'])) {
	$moves = explode(",", $_GET['moves']);
	checkGameOver($moves, NULL);

	// Make a move
	$move = 0;
	if ($RANDOM_MOVE) {
		// Make random move
		$availableSquares = array_diff($ALL_SQUARES, $moves);
		$move = $availableSquares[array_rand($availableSquares, 1)];
	} else {
		// Make best move
		// ...
	}
	checkGameOver($moves, $move);
	global $PLAYER_2_SYMBOL;
	sendResponse(200, "PLAYON", "Square #".$move.". Your turn...", $move, $PLAYER_2_SYMBOL, NULL);
} else {
	sendResponse(400, NULL, "Invalid Request", NULL, NULL, NULL);
}

function sendResponse($http_code, $status_code, $message, $move, $symbol, $highlight) {
	$response['http_code'] = $http_code;
	$response['status_code'] = $status_code;
	$response['message'] = $message;
	$response['move'] = $move;
	$response['symbol'] = $symbol;
	$response['highlight'] = $highlight;
	
	$json_response = json_encode($response);
	echo $json_response;
}

function checkGameOver($moves, $player2move) {
	$lastMove = $playerSymbol = $msg = NULL;
	$playerMoves = $player1moves = $player2moves = array();
	
	for ($i=0; $i<sizeof($moves); $i++) {
		if ($i%2==0) {
			array_push($player1moves, $moves[$i]);
		} else {
			array_push($player2moves, $moves[$i]);
		}
	}
	if ($player2move == NULL) {
		$lastMove = NULL;
		$playerMoves = $player1moves;
		global $PLAYER_1_SYMBOL;
		$playerSymbol = $PLAYER_1_SYMBOL;
		$msg = "You win!";
	} else {
		array_push($moves, $player2move);
		array_push($player2moves, $player2move);
		$lastMove = $player2move;
		$playerMoves = $player2moves;
		global $PLAYER_2_SYMBOL;
		$playerSymbol = $PLAYER_2_SYMBOL;
		$msg = "You lose!";
	}

	// Check win
	$highlight = hasWon($playerMoves);
	if ($highlight != null) {
		sendResponse(200, "END", $msg, $lastMove, $playerSymbol, $highlight);
		exit;
	}
	
	// Check draw
	if (hasDrawn($moves)) {
		sendResponse(200, "END", "It's a draw", $lastMove, $playerSymbol, array());
		exit;
	}
}

// Returns true if draw else false
function hasDrawn($moves) {
	global $GRID_SIZE;
	if (sizeof($moves) == pow($GRID_SIZE, 2)) {
		return true;
	} else {
		return false;
	}
}

// Returns array of numbers that have won else null
function hasWon($moves) {
	$winningPatterns = array(	
		array(7, 8, 9),
		array(4, 5, 6),
		array(1, 2, 3),
		array(1, 4, 7),
		array(2, 5, 8),
		array(3, 6, 9),
		array(1, 5, 9),
		array(3, 5, 7)
	);
	
	foreach($winningPatterns as $pattern) {
		if (!array_diff($pattern, $moves)) {
			return $pattern;
		}
	}
	return NULL;
}
?>
