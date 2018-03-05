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
		.column{
			display: flex;
			flex-direction: column;

		}
		div[class*='col']{
			padding: 0;}
		.content{
			/*position: relative;*/
			box-sizing: border-box;

			/*
			border: solid 0.1px;
			height: 30px;
			width:60px;
			*/
		}


	</style>
<script type="text/javascript">

	var granularity=15;
	var common_widthsize=60;
	var common_heightsize=30;
	var columnquantity=12;
	var linequantity=5;
	var start_h=7;

	$(document).ready(function(){


		$("#limitation").css({
			width:common_widthsize * columnquantity + 'px',
			height:common_heightsize * (linequantity+1) + 'px'
		});



		var current_h=start_h;
		for(var col=0; col<columnquantity;col++){

			$('#limitation').append('<div class="column" id= "col'+col+'"></div>');
			$('#col'+col).append('<div class="header" id="cell'+col+'">'+current_h+'h-'+(current_h+1)+'h</div>');
			current_h++;
			for(var lin=0;lin<linequantity;lin++){
				$('#col'+col).append('<div class="content" id="cell'+col+lin+'"></div>');

			}

			GetCssParams()

		}



		GetMousePosition();

		$(".content").click(function () {


			if(this.childElementCount>0){
				/*TODO Ouvrir une instance (modale)
				1 chopper l'id de l'instance
				2 Afficher modale avec les infos déja présentes
				3 modifier/enregistrer
				* **/


				console.log('sur instance')

			}else {
			var current_instance_id=('Child_'+ this.id);
				console.log(this.id);
				$('#'+this.id).append('<div class="child" id="'+current_instance_id+'" style="width: inherit; height: inherit; background-color: #2aabd2 "></div>')
				GetChildParams()
				//Enregistrer en BDD l'instance
				/*TODO Ouvrir une instance (modale)
				1 chopper l'id de l'instance
				2 Afficher modale avec les infos déja présentes (si existantes)
				3 modifier/enregistrer
				* **/
			}

		});

	});

	//Functions
	function GetMousePosition() {


	}


	function GetCssParams() {
		/*TODO : a factoriser
		* **/
		$(".header").css({
			width:common_widthsize + 'px',
			height:common_heightsize + 'px',
			padding:'0px',
			border: '0.1px solid',
			margin: '0px'
			//border:  '#f47441 inset'
		});
		$(".content").css({
			width:common_widthsize + 'px',
			height:common_heightsize + 'px',
			padding:'0px',
			border: '0.1px solid',
			margin: '0px'

		});
		/*
		*/



	}

	function GetChildParams() {
		$('.child').resizable().draggable();

		$('.child')
			.resizable({
				snap : true,
				grid : [granularity , granularity],
				animate : true,
				animateDuration: "fast",
				//axis:'x',//Aucun effet
				maxHeight:common_heightsize,
				minHeight:common_heightsize,

				start: function(e, ui) {
					//alert('resizing started');
				},
				resize: function(e, ui) {
					var that=this;
					var offset = $(this).offset();
					DisplayPositionAndSize(offset, that)


				},
				stop: function(e, ui) {
					//alert('resizing stopped');
				}
			});

		$('.child')
			.draggable({
				axis:'x',
				containment:"#limitation",
				snap : true,
				grid : [granularity , granularity],
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
					/**e choppe les évènements
					 * ui: helper, offset, originalposition position
					 * */

					console.log("drag");
					var offset = $(this).offset();
					var that=this;
					DisplayPositionAndSize(offset, that)
				}


			});

	}

	function DisplayPositionAndSize(offset, that) {
		console.log('ClientTop : '+ that.clientTop);
		console.log('ClientLeft : '+ that.clientLeft);
		console.log('clientWidth : '+ that.clientWidth);

		//.jQuery33100311395638735232352.uiDraggable.offset.parent.left

		var duree = ConvMnHours(that.clientWidth);
		var debut=ConvMnHours(that.offsetLeft+start_h*60);
		var fin=ConvMnHours(that.offsetLeft+that.clientWidth+start_h*60);

		$('#posX').text('début : ' +debut);
		$('#posY').text('fin : ' + fin);
		$('#long').text('durée: ' + duree);


	}

	function ConvMnHours(mn) {
		var hours=Math.floor(mn/60);
		var minutes=mn%60;
		var message;
		if (minutes != 0){
			message=hours + "h" + minutes;

		}else {
			message=hours + "h";
		}
		return message;
	}

	function OpenInstance(id) {

	}


</script>

		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-2">
					<p>Planning</p>
				</div>

				<div class="col-lg-8">

					<div class="col-lg-12" style="background-color:#bff442" id="limitation">
<!--

						<div class="column">
							<div class="head">8-9h</div>
							<div class="contenu"></div>
							<div class="contenu"></div>
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
							<div class="contenu"></div>
							<div class="contenu">
								<div class="enfant" style="width: inherit; height: inherit; background-color: #2aabd2 "></div>
							</div>
							<div class="contenu"></div>
						</div>

-->
					</div>
				</div>
				<div class="col-lg-2">
					<div>
						<p id="posX"></p>
						<p id="posY"></p>
						<p id="long"></p>
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
