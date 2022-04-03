<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<!-- Custom -->
	<link href="custom.css" rel="stylesheet" />
	
    <title>#tictactoe</title>
  </head>
  <body>
	<div class="container">
		<h1>#tictactoe</h1>
		
		<div class="card text-center bg-light m-3">
			<div class="card-body">
				<span id="status" class="lead font-weight-bold">Loading...</span>
			</div>
		</div>
		
		<div class="square">
			<table id="grid" class="table table-bordered text-center h-100 tictactoe" style="border-style: hidden">
				<tbody>
					<tr>
						<td id="7" class="align-middle">&nbsp;</td>
						<td id="8" class="align-middle">&nbsp;</td>
						<td id="9" class="align-middle">&nbsp;</td>
					</tr>
					<tr>
						<td id="4" class="align-middle">&nbsp;</td>
						<td id="5" class="align-middle">&nbsp;</td>
						<td id="6" class="align-middle">&nbsp;</td>
					</tr>
					<tr>
						<td id="1" class="align-middle">&nbsp;</td>
						<td id="2" class="align-middle">&nbsp;</td>
						<td id="3" class="align-middle">&nbsp;</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script-->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
	<script src="custom.js"></script>

  </body>
</html>