				
                <h1 align="center">DATA KEHADIRAN PEGAWAI</h1>
                
                	Tanggal : 
					<?php echo $tanggal ?>
					<?php echo form_open('index_absensi'); ?>
					<?php
					$dropdown = array();
					foreach($rows_tanggal as $item) 
					{
					$dropdown[$item->tanggal_absensi] = $item->tanggal_absensi;
					}

					echo form_dropdown('date', $dropdown, 'CURRENT_TIMESTAMP'); 
					?>

					<?php echo form_submit('submit', 'cari'); ?> 
					<?php echo form_close(); ?>	
					<br><br><br>
					

				<!--  start product-table ..................................................................................... -->
				<h3><b><u>ABSENSI</u></b></h3>
				<h4>@ DATA ASLI</h4>
                <form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					
					
					<th class="table-header-repeat line-left"><a href="">Nama</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">NIP</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Masuk</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Keluar</a></th>
					
				</tr>
				
				<?php foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					
					<td><? echo $item->nama_person ?></td>
                    <td><? echo $item->no_induk ?></td>
					<td><? echo $item->waktu_masuk ?></td>
					<td><? echo $item->waktu_keluar ?></td>
					
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>
                
                <h4>@ DATA EDIT</h4>
                <form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					
					
					<th class="table-header-repeat line-left"><a href="">Nama</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">NIP</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Masuk</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Keluar</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
				<?php foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					
					<td><? echo $item->nama_person ?></td>
                    <td><? echo $item->no_induk ?></td>
					<td><? echo $item->waktu_masuk ?></td>
					<td><? echo $item->waktu_keluar ?></td>
					<td>
					<?
					$tgl = date("Ymd",strtotime($item->tanggal_absensi));
					$now = date("Ymd");
					if ($tgl == $now)
					{
					echo "<a href='".base_url()."c_absensi/editAbsensi/$item->no_absensi' title='Edit' class='icon-1 info-tooltip'>";
					}
					?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>