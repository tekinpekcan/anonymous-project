				
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Kode Pelajaran</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Pelajaran</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					<td><? echo $item->kode_pelajaran ?></td>
					<td><? echo $item->nama_pelajaran ?></td>
					<td>
					<?="<a href='" . base_url() . "c_master_data/edit_pelajaran/$item->kode_pelajaran' title='Edit' class='icon-1 info-tooltip'>"?></a>
					<?="<a href='" . base_url() . "c_master_data/delete_pelajaran/$item->kode_pelajaran' title='Delete' class='icon-2 info-tooltip'>";?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>				
				
				
				<div id="actions-box">
					<a href="" class="action-slider"></a>
					<div id="actions-box-slider">
						<a href="/school/c_master_data/tambah_pelajaran" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>