		<?php
			$kode_pelajaran = $rows[0]->kode_pelajaran;
			$nama_pelajaran = $rows[0]->nama_pelajaran;
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/update_pelajaran' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>
			<th valign="top">ID Pelajaran:</th>
			<td><input name='kode_pelajaran' type="text" class="inp-form" readonly="readonly" value="<?=$kode_pelajaran?>" /></td>
		</tr>
		<tr>
			<th valign="top">Nama Pelajaran:</th>
			<td><input name='nama_pelajaran' type="text" class="inp-form" value="<?=$nama_pelajaran?>" /></td>
		</tr>
		
		<table>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
				<input type="reset" value="" class="form-reset"  />
			</td>
			<td></td>
		</tr>
		</table>
		</form>
		<!-- end id-form  -->
		
