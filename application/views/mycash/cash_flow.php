<style>
	.aloc{
		font-size:13px;
	}
</style>
<div id="" class="container no_pad">
	<div class="col-xs-12 col-md-7 no_pad">
		<div style="font-size:20px; padding-bottom:20px;"><center><?php echo "Rp ".number_format($sumallmycash,2,',','.');?></center></div>
		<div class="col-xs-6" style="padding:0;">
			<div style="border-right: 1px solid"><center><a href="#" onclick="by_label()">Label</a></center></div>
			<div id="tab_label" class="tab_active" style="height: 5px;"></div>
		</div>
		<div class="col-xs-6" style="padding:0;">
			<div><center><a href="#" onclick="by_cash()">Transaksi</a></center></div>
			<div style="height: 5px;" id="tab_trans"></div>
		</div>
		<table class="table">
 			<tbody id="tablemycashtddiv" >
 				<?php echo $mylabelflow_td;?>
 			</tbody>
		</table>
	</div>
</div>

<script>
function by_label(){
	$('#tablemycashtddiv').load(config.base+'mycash/load_label_flow');
	$('#tab_trans').removeClass('tab_active');
	$('#tab_label').addClass('tab_active');
}
function by_cash(){
	$('#tablemycashtddiv').load(config.base+'mycash/load_cash_flow');
	$('#tab_label').removeClass('tab_active');
	$('#tab_trans').addClass('tab_active');
} 
</script>

<style>
	.tab_active{
		background-color: yellow;
	}
</style>