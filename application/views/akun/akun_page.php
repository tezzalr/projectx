<style>
	.child{
		padding-left:10px;
		font-size:14px;
	}
</style>
<div id="" class="container no_pad">
	<div class="col-xs-12 col-md-7 no_pad">
		<div style="padding-left:10px">
			<a href="<?php echo base_url()?>akun/add_akun"><button type="button" class="btn btn-danger btn-xs">Add New Acoount</button></a>
		</div><br>
		<div>
			<table class="table">
 			<tbody id="tablemycashtddiv" >
 				<?php foreach ($accounts as $akun){?>
 				<tr><td>
 					<span><strong><?php echo $akun['akun']->name?></strong></span>
					<span style="float:right; font-size:13px;"><?php echo "Rp ".number_format($akun['total'],2,',','.');?></span><br>
					<?php if($akun['akun']->note){?><span style="font-size:12px;"><?php echo $akun['akun']->note?></span><br><?php }?>
					<?php if($akun['child']){?>
						<span class="child"><?php echo $akun['akun']->name?></span>
						<span style="float:right; font-size:11px;  padding-right:0px;"><?php echo "Rp ".number_format($akun['akun']->amount,2,',','.');?></span><br>
						<?php if($akun['akun']->note){?><span style="font-size:12px;"><?php echo $akun['akun']->note?></span><br><?php }?>
							<?php foreach ($akun['child'] as $child){?>
								<span class="child"><?php echo $child->name?></span>
								<span style="float:right; font-size:11px; padding-right:0px;"><?php echo "Rp ".number_format($child->amount,2,',','.');?></span><br>
							<?php }?>
					<?php }?>
				</tr></td>
 				<?php }?>
 			</tbody>
		</table>
		</div>
	</div>
</div>