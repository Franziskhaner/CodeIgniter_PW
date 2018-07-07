<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<div>
		<?php
			if(!empty($validationError)) echo '<script>alert("Rellene todos los campos.");</script>';
			if(!empty($status)) {
				if($status) echo '<script>alert("Histora actualizada.");</script>';
				else echo '<script>alert("Error al actualizar la histora. Intentelo de nuevo.");</script>'; 
			} 
			echo "<h2>Historia: <b>".$mascota['nombre']."</b></h2>";
			echo "<p>Animal: ".$mascota['tipo']."</p>";
			echo "<p>Raza: ".$mascota['raza']."</p>";
			echo "<p>Fecha nacimiento: ".$mascota['fnacimiento']."</p>";
			echo "<p>Sexo: ".$mascota['sexo']."</p>";
			echo "<form method='post'>";
			echo "<p>Peso: <input type='text' name='peso' id='peso'></p>";
			echo "<table>";
			echo "<tr><td><b>Prevención</b></td><td>Al dia</td><td>Realizada hoy</td><td>Falta</td></tr>";
			echo "<tr><td>Identificacion: chip y pasaporte</td><td align='center'><input type='radio' name='identificacion' id='identificacion0' value='0'></td><td align='center'><input type='radio' name='identificacion' id='identificacion1' value='1'></td><td align='center'><input type='radio' name='identificacion' id='identificacion2' value='2'></td></tr>";
			echo "<tr><td>Vacunas:</td></tr>";
			echo "<tr><td><li>Polivalente</li></td><td align='center'><input type='radio' name='polivalente' id='polivalente0' value='0'></td><td align='center'><input type='radio' name='polivalente' id='polivalente1' value='1'></td><td align='center'><input type='radio' name='polivalente' id='polivalente2' value='2'></td></tr>";
			echo "<tr><td><li>Rabia</li></td><td align='center'><input type='radio' name='rabia' id='rabia0' value='0'></td><td align='center'><input type='radio' name='rabia' id='rabia1' value='1'></td><td align='center'><input type='radio' name='rabia' id='rabia2' value='2'></td></tr>";
			echo "<tr><td>Desparasitación interna</td><td align='center'><input type='radio' name='despint' id='despint0' value='0'></td><td align='center'><input type='radio' name='despint' id='despint1' value='1'></td><td align='center'><input type='radio' name='despint' id='despint2' value='2'></td></tr>";
			echo "<tr><td>Desparasitación externa</td><td align='center'><input type='radio' name='despext' id='despext0' value='0'></td><td align='center'><input type='radio' name='despext' id='despext1' value='1'></td><td align='center'><input type='radio' name='despext' id='despext2' value='2'></td></tr>";
			echo "<tr><td>Prevención Leishmania</td><td align='center'><input type='radio' name='leishmania' id='leishmania0' value='0'></td><td align='center'><input type='radio' name='leishmania' id='leishmania1' value='1'></td><td align='center'><input type='radio' name='leishmania' id='leishmania2' value='2'></td></tr>";
			echo "<tr><td>Prevención Dirofilaria</td><td align='center'><input type='radio' name='dirofilaria' id='dirofilaria0' value='0'></td><td align='center'><input type='radio' name='dirofilaria' id='dirofilaria1' value='1'></td><td align='center'><input type='radio' name='dirofilaria' id='dirofilaria2' value='2'></td></tr>";
			echo "</table><br><table>";
			echo "<tr><td><b>Anamnesis</b></td></tr>";
			echo "<tr><td>Alimentación</td><td align='right'>Premium <input type='radio' name='alimentacion' id='alimentacion0' value='0'></td><td align='right'>Medio <input type='radio' name='alimentacion' id='alimentacion1' value='1'></td><td align='right'>Básico <input type='radio' name='alimentacion' id='alimentacion2' value='2'></td></tr>";
			echo "<tr><td>Apetito</td><td align='right'>Normal <input type='radio' name='apetito' id='apetito0' value='0'></td><td align='right'>Alterado <input type='radio' name='apetito' id='apetito1' value='1'></td></tr>";
			echo "<tr><td>Comportamiento</td><td align='right'>Normal <input type='radio' name='comportamiento' id='comportamiento0' value='0'></td><td align='right'>Alterado <input type='radio' name='comportamiento' id='comportamiento1' value='1'></td></tr>";
			echo "<tr><td>Estado anímico</td><td align='right'>Normal <input type='radio' name='animo' id='animo0' value='0'></td><td align='right'>Alterado <input type='radio' name='animo' id='animo1' value='1'></td></tr>";
			echo "<tr><td>Orina</td><td align='right'>Normal <input type='radio' name='orina' id='orina0' value='0'></td><td align='right'>Alterado <input type='radio' name='orina' id='orina1' value='1'></td></tr>";
			echo "<tr><td>Vómito</td><td align='right'>Si <input type='radio' name='vomito' id='vomito0' value='0'></td><td align='right'>No <input type='radio' name='vomito' id='vomito1' value='1'></td></tr>";
			echo "<tr><td>Tos</td><td align='right'>Si <input type='radio' name='tos' id='tos0' value='0'></td><td align='right'>No <input type='radio' name='tos' id='tos1' value='1'></td></tr>";
			echo "<tr><td>Estreñimiento</td><td align='right'>Si <input type='radio' name='estrenimiento' id='estrenimiento0' value='0'></td><td align='right'>No <input type='radio' name='estrenimiento' id='estrenimiento1' value='1'></td></tr>";
			echo "<tr><td>Diarrea</td><td align='right'>Si <input type='radio' name='diarrea' id='diarrea0' value='0'></td><td align='right'>No <input type='radio' name='diarrea' id='diarrea1' value='1'></td></tr>";
			echo "<tr><td>Cojera</td><td align='right'>Si <input type='radio' name='cojera' id='cojera0' value='0'></td><td align='right'>No <input type='radio' name='cojera' id='cojera1' value='1'></td></tr>";
			echo "<tr><td>Alergias</td><td align='left' colspan=3><input type='text' name='alergias' id='alergias' value=''></td></tr>";
			echo "</table><br><table>";
			echo "<tr><td><b>Exploración</b></td></tr>";
			echo "<tr><td>Boca</td><td align='right'>Normal <input type='radio' name='boca' id='boca0' value='0'></td><td align='right'>Alterado <input type='radio' name='boca' id='boca1' value='1'></td></tr>";
			echo "<tr><td>Ojos</td><td align='right'>Normal <input type='radio' name='ojos' id='ojos0' value='0'></td><td align='right'>Alterado <input type='radio' name='ojos' id='ojos1' value='1'></td></tr>";
			echo "<tr><td>Oído</td><td align='right'>Normal <input type='radio' name='oido' id='oido0' value='0'></td><td align='right'>Alterado <input type='radio' name='oido' id='oido1' value='1'></td></tr>";
			echo "<tr><td>Pelo</td><td align='right'>Normal <input type='radio' name='pelo' id='pelo0' value='0'></td><td align='right'>Alterado <input type='radio' name='pelo' id='pelo1' value='1'></td></tr>";
			echo "<tr><td>Piel</td><td align='right'>Normal <input type='radio' name='piel' id='piel0' value='0'></td><td align='right'>Alterado <input type='radio' name='piel' id='piel1' value='1'></td></tr>";
			echo "<tr><td>Abdomen</td><td align='right'>Normal <input type='radio' name='abdomen' id='abdomen0' value='0'></td><td align='right'>Alterado <input type='radio' name='abdomen' id='abdomen1' value='1'></td></tr>";
			echo "<tr><td>Auscultación</td><td align='right'>Normal <input type='radio' name='auscultacion' id='auscultacion0' value='0'></td><td align='right'>Alterado <input type='radio' name='auscultacion' id='auscultacion1' value='1'></td></tr>";
			echo "<tr><td>Ap. Urogenital</td><td align='right'>Normal <input type='radio' name='urogenital' id='urogenital0' value='0'></td><td align='right'>Alterado <input type='radio' name='urogenital' id='urogenital1' value='1'></td></tr>";
			echo "<tr><td>Glándulas mamarias</td><td align='right'>Normal <input type='radio' name='mamas' id='mamas0' value='0'></td><td align='right'>Alterado <input type='radio' name='mamas' id='mamas1' value='1'></td></tr>";
			echo "<tr><td>Ganglios</td><td align='right'>Normal <input type='radio' name='ganglios' id='ganglios0' value='0'></td><td align='right'>Alterado <input type='radio' name='ganglios' id='ganglios1' value='1'></td></tr>";
			echo "<tr><td>Locomotor</td><td align='right'>Normal <input type='radio' name='locomotor' id='locomotor0' value='0'></td><td align='right'>Alterado <input type='radio' name='locomotor' id='locomotor1' value='1'></td></tr>";
			echo "<tr><td>Peso</td><td align='right'>Normal <input type='radio' name='pesoo' id='pesoo0' value='0'></td><td align='right'>Alterado <input type='radio' name='pesoo' id='pesoo1' value='1'></td></tr>";
			echo "<input type='hidden' name='fecha' value='".Date("d/m/Y")."'>";
			if(empty($historia)) echo "</table><br><input type='submit' name='nuevasubmit'></form>";
			else echo "</table><br><input type='submit' name='actualizarsubmit' value='Actualizar'></form>";
			if(!empty($historia)) $fecha = $historia['fecha'];
			else $fecha = Date("d/m/Y");
			echo "<p>Fecha: $fecha";
			if(!empty($historia)){ ?>
				<script>
				document.getElementById("peso").value = "<?php echo $historia['peso']; ?>";
				document.getElementById("identificacion<?php echo $historia['identificacion']; ?>").checked = true;
				document.getElementById("polivalente<?php echo $historia['polivalente']; ?>").checked = true;
				document.getElementById("rabia<?php echo $historia['rabia']; ?>").checked = true;
				document.getElementById("despint<?php echo $historia['despint']; ?>").checked = true;
				document.getElementById("despext<?php echo $historia['despext']; ?>").checked = true;
				document.getElementById("leishmania<?php echo $historia['leishmania']; ?>").checked = true;
				document.getElementById("dirofilaria<?php echo $historia['dirofilaria']; ?>").checked = true;
				document.getElementById("alimentacion<?php echo $historia['alimentacion']; ?>").checked = true;
				document.getElementById("apetito<?php echo $historia['apetito']; ?>").checked = true;
				document.getElementById("comportamiento<?php echo $historia['comportamiento']; ?>").checked = true;
				document.getElementById("animo<?php echo $historia['animo']; ?>").checked = true;
				document.getElementById("orina<?php echo $historia['orina']; ?>").checked = true;
				document.getElementById("vomito<?php echo $historia['vomito']; ?>").checked = true;
				document.getElementById("tos<?php echo $historia['tos']; ?>").checked = true;
				document.getElementById("estrenimiento<?php echo $historia['estrenimiento']; ?>").checked = true;
				document.getElementById("diarrea<?php echo $historia['diarrea']; ?>").checked = true;
				document.getElementById("cojera<?php echo $historia['cojera']; ?>").checked = true;
				document.getElementById("alergias").value = "<?php echo $historia['alergias']; ?>";
				document.getElementById("boca<?php echo $historia['boca']; ?>").checked = true;
				document.getElementById("ojos<?php echo $historia['ojos']; ?>").checked = true;
				document.getElementById("oido<?php echo $historia['oido']; ?>").checked = true;
				document.getElementById("pelo<?php echo $historia['pelo']; ?>").checked = true;
				document.getElementById("piel<?php echo $historia['piel']; ?>").checked = true;
				document.getElementById("abdomen<?php echo $historia['abdomen']; ?>").checked = true;
				document.getElementById("auscultacion<?php echo $historia['auscultacion']; ?>").checked = true;
				document.getElementById("urogenital<?php echo $historia['urogenital']; ?>").checked = true;
				document.getElementById("mamas<?php echo $historia['mamas']; ?>").checked = true;
				document.getElementById("ganglios<?php echo $historia['ganglios']; ?>").checked = true;
				document.getElementById("locomotor<?php echo $historia['locomotor']; ?>").checked = true;
				document.getElementById("pesoo<?php echo $historia['pesoo']; ?>").checked = true;
				</script>
			<?php }
		?>
	</div>
</body>