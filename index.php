<?php
/**
 * Created by IntelliJ IDEA.
 * User: eric.pennequin
 * Date: 28/02/2018
 * Time: 16:32
 */
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Test Drag&Drop</title>
		<link rel="stylesheet" href="ressources/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="ressources/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="ressources/jquery-ui.css">
		<script src="ressources/jquery-3.3.1.min.js" ></script>
		<script src="ressources/jquery-ui.min.js" ></script>


	</head>
	<body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#zone1').draggable({
			//axis:'x',
			//axis:'y'
			containment : '#limitation'
		});

		$('#drag').draggable();
		$('#not-drag').draggable();

		$('#drop').droppable({
		    accept : '#drag', // je n'accepte que le bloc ayant "drag" pour id
		    drop : function(){
		        alert('Action terminée !');
		    }
		});

	})

</script>

		<div class="row">
			<div class="col-lg-12" style="background-color: chartreuse; width:500px; height:500px" id="limitation">




				<canvas id='zone1' width='30' height='30' style ='display:block;margin:auto; background:blue'>
				</canvas>
				<table>
					<td>


					</td>
				</table>

			</div>
			<form>


			</form>
			<div id="drag">
    <p>Ceci est un élément valide</p>
</div>

<div id="not-drag">
    <p>Ceci n'est pas un élément valide</p>
</div>

<div id="drop">
    <p>Déposer ici</p>
</div>
		</div>

	</body>
</html>
