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

		#limitation{
			display: flex;
			flex-direction: row;



		}
		.colonne{
			display: flex;
			flex-direction: column;

		}


	</style>
<script type="text/javascript">
	var granularity=15;
	var common_widthsize=60;
	var common_heightsize=30;
	$(document).ready(function(){

		$('.enfant').resizable().draggable();

		$('.enfant')
			.resizable({
				axis:'x',
				snap : true,
				grid : [granularity , granularity],
				animate : false,
				animateDuration: "fast",
				start: function(e, ui) {
					//alert('resizing started');
				},
				resize: function(e, ui) {
					var that=this;
					var offset = $(this).offset();
					GetPosition(offset, that)
					//GetSize(that)

				},
				stop: function(e, ui) {
					//alert('resizing stopped');
				}
			});

		$('.enfant')
			.draggable({
				axis:'x',
				snap : true,
				grid : [common_heightsize , common_widthsize/2],
				start:function (e,ui) {
					console.log("start")

				},
				create:function (e,ui) {
					console.log("create")
				},
				stop:function (e,ui) {
					console.log("stop")
				},
				drag:function (e,ui) {

					console.log("drag");
					var offset = $(this).offset();
					var that=this;
					GetPosition(offset, that)
				}


			});



/*

		$('.contenu').draggable({
			axis:'x',
			snap : true,
			grid : [common_heightsize , common_widthsize/2],

			drag: function(){
				var offset = $(this).offset();
				var that=this;
				GetPosition(offset, that)
			/!*
				var xPos = offset.left;
				var yPos = offset.top;
				console.log(xPos + " " + yPos);
				$('#posX').text('x (left) : ' + xPos);
				$('#posY').text('y (top) : ' + yPos);
				GetSize(that=this)*!/

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

*/



		$(".contenu").css({
			width:common_widthsize + 'px',
			height:common_heightsize + 'px'
			//border:  '#f47441',




		});



		$("#limitation").css({
			width:common_widthsize * 12 + 'px',
			height:common_heightsize * 12 + 'px'

		});


/*
		$("#zone1").css({
			width:common_widthsize + 'px',
			height:common_heightsize + 'px'

		});
		$("#zone1").attr({
			width:common_widthsize + 'px',
			height:common_heightsize + 'px'

		});


		$('#drag').draggable();
		$('#not-drag').draggable();

		$('#drop').droppable({
		    accept : '#drag', // je n'accepte que le bloc ayant "drag" pour id
		    drop : function(){
		        alert('Action terminée !');
		    }
		});
*/

/*

		$('#resizeDiv')
			.draggable()
			.resizable();

		$('#resizeDiv')
			.resizable({
				start: function(e, ui) {
					//alert('resizing started');
				},
				resize: function(e, ui) {

				},
				stop: function(e, ui) {
					//alert('resizing stopped');
				}
			});

		$('#resizeDiv')
			.draggable({
				start:function (e,ui) {
					console.log("start")
				},
				create:function (e,ui) {
					console.log("create")
				},
				stop:function (e,ui) {
					console.log("stop")
				},
				drag:function (e,ui) {
					console.log("drag")
				}


			});

		$("#resizeDiv").css({
			width:common_widthsize + 'px',
			height:common_heightsize + 'px'
		})
*/


	});

	function GetPosition(offset, that) {
		console.log('ClientTop : '+ that.clientTop);
		console.log('ClientLeft : '+ that.clientLeft);
		console.log('clientWidth : '+ that.clientWidth);
		var xPos = offset.left;
		var yPos = offset.top;
		//console.log(xPos + " " + yPos);
		$('#posX').text('x (left) : ' + that.offsetLeft);
		$('#posY').text('y (top) : ' + yPos);
		$('#long').text('durée: ' + that.clientWidth + " mn");

		//GetSize(that)

	}

	function GetSize(that) {
		console.log($(that).width());
		$('#long').text('durée: ' + $(that).width() + " mn");

	}


</script>

	<!--
	<div id="resizeDiv" style="background-color:#bff442; width:30px; height:30px">ff</div>
-->

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
