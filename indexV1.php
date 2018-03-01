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
	<style>
		table, tr,td{
			border:1px solid black;
			width: 30px;
			height: 30px;
		}
		#limitation{
			display: flex;
			flex-direction: row;


		}
		.colonne{
			display: flex;
			flex-direction: column;

		}
/*
		.contenu{
			width: 30px;
			height: 30px;
			border: #f47441 solid;
		}
*/



	</style>
<script type="text/javascript">
	var granularity=15;
	var common_widthsize=60;
	var common_heightsize=30;
	$(document).ready(function(){
		$('.contenu').draggable({
			axis:'x',
			snap : true,
			grid : [common_heightsize , common_widthsize/2],
			drag: function(that=this){
				var offset = $(this).offset();
				var that=this;
				GetPosition(offset, that)
			/*
				var xPos = offset.left;
				var yPos = offset.top;
				console.log(xPos + " " + yPos);
				$('#posX').text('x (left) : ' + xPos);
				$('#posY').text('y (top) : ' + yPos);
				GetSize(that=this)*/

			}

			//axis:'y'
			//containment : '#limitation'
		}).find('.enfant').resizable({
			axis:'x',
			snap : true,
			grid : [granularity , granularity],
			animate : false,
			animateDuration: "fast",
			resize:function(){
				GetSize(that=this)
			}


		});




		$(".contenu").css({
			width:common_widthsize + 'px',
			height:common_heightsize + 'px',
			border:  '#f47441 solid'


		});

		$("#zone1").css({
			width:common_widthsize + 'px',
			height:common_heightsize + 'px'

		});
		$("#zone1").attr({
			width:common_widthsize + 'px',
			height:common_heightsize + 'px'

		});


		$("#limitation").css({
			width:common_widthsize * 12 + 'px',
			height:common_heightsize * 12 + 'px'

		});


/*

		$('#drag').draggable();
		$('#not-drag').draggable();

		$('#drop').droppable({
		    accept : '#drag', // je n'accepte que le bloc ayant "drag" pour id
		    drop : function(){
		        alert('Action terminée !');
		    }
		});
*/

	});

	function GetPosition(offset, that) {
		//var offset = $(that).offset();
		var xPos = offset.left;
		var yPos = offset.top;
		console.log(xPos + " " + yPos);
		$('#posX').text('x (left) : ' + xPos);
		$('#posY').text('y (top) : ' + yPos);
		GetSize(that)

	}

	function GetSize(that) {
		console.log($(that).width());
		$('#long').text('durée: ' + $(that).width() + " mn");
		
	}


</script>

		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-2">
					<div>
						<p id="posX"></p>
						<p id="posY"></p>
						<p id="long"></p>
					</div>


					<!--

					<canvas id='zone1' width='+common_widthsize+' height='common_heightsize' style ='display:block;margin:auto; background:blue'>
<canvas id='zone1' width="60px" height="30px" style ='display:block;margin:auto; background:blue'></canvas>
					-->

				</div>
				<div class="col-lg-10">

					<div class="col-lg-12" style="background-color:#bff442" id="limitation">

							<div class="colonne">
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
							</div>
							<div class="colonne">
								<div class="contenu">
									<div class="enfant" style="width: inherit; height: inherit; background-color: #2aabd2 "></div>
								</div>
								<div class="contenu">

								</div>
								<div class="contenu">

									</div>
								<div class="contenu">

								</div>
								<div class="contenu">

								</div>
								<div class="contenu">

								</div>
								<div class="contenu">

								</div>
								<div class="contenu">

								</div>
								<div class="contenu">

								</div>
								<div class="contenu"></div>
								<div class="contenu">
									<div class="enfant" style="width: inherit; height: inherit; background-color: #2aabd2 "></div>
								</div>
								<div class="contenu"></div>
							</div>
							<div class="colonne">
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
							</div>
							<div class="colonne">
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
							</div>
							<div class="colonne">
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
							</div>
							<div class="colonne">
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
							</div>
							<div class="colonne">
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
							</div>
							<div class="colonne">
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
							</div>
							<div class="colonne">
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
							</div>
							<div class="colonne">
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
								<div class="contenu"></div>
							</div>

					</div>
				</div>

			</div>



		</div>
<!--
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

	-->


	</body>
</html>
