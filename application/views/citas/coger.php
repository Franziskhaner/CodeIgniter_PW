<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title>Coger cita</title>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href='<?php echo base_url(); ?>fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='<?php echo base_url(); ?>fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url(); ?>fullcalendar/lib/moment.min.js'></script>
<script src='<?php echo base_url(); ?>fullcalendar/lib/jquery.min.js'></script>
<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.min.js'></script>
<script src='<?php echo base_url(); ?>fullcalendar/locale/es.js'></script>
<script>
	function ultimoDiaMes($mes, $anno) {		
		return (new Date($anno, $mes, 0)).getDate();
	}
	function existecita(citas, hora, minuto, dia, mes, anno) {
		for (var i = 0; i < citas.length; i++) {
			if(citas[i][0] == hora && citas[i][1] == minuto && citas[i][2] == dia && citas[i][3] == mes && citas[i][4] == anno) return true;
		}
		return false;
	}
$(document).ready(function() {
	var anterior = null;
    $('#calendar').fullCalendar({

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },

      defaultDate: <?php echo "'".date("Y-m-d")."'"; ?>,
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      eventClick: function(calEvent, jsEvent, view){
      	document.getElementById('dia').value=calEvent.start._d.getDate();
      	document.getElementById('mes').value=calEvent.start._d.getMonth()+1;
      	document.getElementById('anno').value=calEvent.start._d.getFullYear();
      	document.getElementById('hora').value=calEvent.start._d.getHours()-1;
      	document.getElementById('minuto').value=calEvent.start._d.getMinutes();
      	$(this).select();
      	if(anterior != null) {
      		anterior.css('border-color', 'transparent');
      	}
      	$(this).css('border-color', 'red');
      	anterior = $(this);
      },
      events: function(start, end, timezone, callback) {
      	document.getElementById('dia').value='';
      	document.getElementById('mes').value='';
      	document.getElementById('anno').value='';
      	document.getElementById('hora').value='';
      	document.getElementById('minuto').value='';
      	var dat = $('#calendar').fullCalendar('getDate');
      	var fechaactual = new Date();
      	fechaactual = new Date(fechaactual.getFullYear()+"-"+(fechaactual.getMonth()+1)+"-"+fechaactual.getDate());
       // alert(dat.format("M"));
        //alert(start.format("D")+"-"+start.format("M"));
        //alert(end.format("D")+"-"+end.format("M"));

        //alert(ultimoDiaMes(dat.format("M"), dat.format("Y")));
       	//alert(view.intervalStart.format("YYYY-MM-DD"));
        //alert(intervalEnd.format("YYYY-MM-DD"));
        var event = [];
        //MES
        var citascog = [<?php for($i=0; $i < count($citastotal); $i++){
        	echo "[".$citastotal[$i]['hora'].",".$citastotal[$i]['minuto'].",".$citastotal[$i]['dia'].",".$citastotal[$i]['mes'].",".$citastotal[$i]['anno']."]";
        	if($i != count($citastotal)-1){
        		echo ",";
        	}
        }?>];
        var anno =dat.format("Y");
        var mes = dat.format("M");
        if(mes < 10) mes = "0"+mes;
        var j, k;
        var fecha;
		for (var i = 1; i <= ultimoDiaMes(dat.format("M"), dat.format("Y")); i++) {
			if(new Date(dat.format("Y")+"-"+dat.format("M")+"-"+i)>=fechaactual){
				if(i < 10) j = "0"+i; else j=i;
		    	fecha = new moment(anno+'-'+mes+'-'+j);
		    	if(fecha.day() != 0) {
		    		for (var k = 10; k < 14; k++) {
		        		if(k < 10) p = "0"+k; else p=k;
		        		if(!existecita(citascog,k,00,j,mes,anno)){
		        			event.push({
							title: 'Cita disponible',
								start: anno+'-'+mes+'-'+j+'T'+p+':00:00',
								end: anno+'-'+mes+'-'+j+'T'+p+':29:00'
							});
		        		}
		        		if(!existecita(citascog,k,30,j,mes,anno)){
		        			event.push({
							title: 'Cita disponible',
								start: anno+'-'+mes+'-'+j+'T'+p+':30:00',
								end: anno+'-'+mes+'-'+j+'T'+p+':59:00'
							});
		        		}
		        	}
		        	if(fecha.day() != 6){
		        		for (var k = 17; k < 20; k++) {
			        		if(k < 10) p = "0"+k; else p=k;
			        		if(!existecita(citascog,k,00,j,mes,anno)){
			        			event.push({
								title: 'Cita disponible',
									start: anno+'-'+mes+'-'+j+'T'+p+':00:00',
									end: anno+'-'+mes+'-'+j+'T'+p+':29:00'
								});
			        		}
			        		if(!existecita(citascog,k,30,j,mes,anno)){
			        			event.push({
								title: 'Cita disponible',
									start: anno+'-'+mes+'-'+j+'T'+p+':30:00',
									end: anno+'-'+mes+'-'+j+'T'+p+':59:00'
								});
			        		}
			        	}
		        	}
		    	}
			}
        	
        	
          //$('#calendar').fullCalendar('renderEvent', eventData, true);
        }
        //MES SIGUIENTE
        
        callback(event);
      }
    });

  });

</script>
<style>

/*  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }
*/
  #calendar {
    max-width: 900px;
    margin: 0 auto;
    padding:10px;
  }

</style>
</head>
<body>
	<?php if(!empty($validationError)) echo '<script>alert("Seleccione Mascota y cita.");</script>';?>
	<?php if(!empty($status)) echo '<script>alert("Error al programar cita, intentelo de nuevo.");</script>';?>	
	<div>
	<!--<h2>Citas</h2>
	<div>
		<?php
			if(empty($citas)) {
				echo "No tiene citas asignadas";
			}else{
				foreach ($citas as $key => $value) {
					echo "Fecha: ".str_pad($value['dia'],2,"0", STR_PAD_LEFT)."/".str_pad($value['mes'],2,"0", STR_PAD_LEFT)."/".$value['anno']." Hora: ".str_pad($value['hora'],2,"0", STR_PAD_LEFT).":".str_pad($value['minuto'],2,"0", STR_PAD_LEFT)."<br>";
				}
			}
		?>
	</div>-->
	<h2 style='text-align: center;'><b>Solicitar cita</b></h2>
	<form method="post" >
		<div>
			<center>
			<table border=0 id="tabla1">
				<!--<tr>
					<div>
						<td>Especialidad:</td>
						<td><select name="especialidad" style="width:235px">
							<?php
									foreach ($especialidad as $key => $value) {
										echo "<option value='".$value['id']."'> ".$value['especialidad']."</option>";
									}
								?>
						</select></td>
					</div>
				</tr>-->
				<tr>
					<td colspan=6><div id='calendar'></div></td>
				</tr>
				<tr id="centrar">
					<div>
						<td style="width: 8%"> Nombre: </td>
						<td style="width: 25%"> <?php echo $cliente['nombre']." ".$cliente['apellidos']; ?></td>
						<td style="text-align: right;">Mascota: </td>
						<td style="width: 25%">
							<select id='boto' name="mascota" style="width: 90%;">
								<?php
									foreach ($mascota as $key => $value) {
										echo "<option value='".$value['id']."'> ".$value['nombre']."</option>";
									}
								?>
							</select>
						</td>
						<td style="width: 13%">
							<a href="<?php echo base_url(); ?>mascotas/registro"> Añadir mascota</a>
						</td>
						<td style="width: 20%">
							<input id='boto' type="submit" name="cogercitaSubmit" value="Pedir Cita">
						</td>
					</div>
				</tr>
			</table>
			</center>	
		<input type="hidden" id="dia" name="dia">
		<input type="hidden" id="mes" name="mes">
		<input type="hidden" id="anno" name="anno">
		<input type="hidden" id="hora" name="hora">
		<input type="hidden" id="minuto" name="minuto">
	</form>
	</body>
</html>
