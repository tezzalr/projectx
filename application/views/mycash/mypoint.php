<div id="" class="container no_pad">
	<div class="col-xs-12 col-md-7 no_pad">
		<div style="font-size:20px; padding-bottom:20px;"><center><?php echo "Point = <b>".number_format($mypoint,0,',','.')."</b>";?></center></div>
		<div class="col-xs-12" style="padding:0;">
			<div style="border-right: 1px solid"><center><a href="#" onclick="">Merchant</a></center></div>
			<div style="height: 5px;" class="tab_active" id="tab_trans"></div>
		</div>
		<div class="col-xs-6" style="padding:0; display:none;">
			<div><center><a href="#" onclick="">Label</a></center></div>
			<div id="tab_label" style="height: 5px;"></div>
		</div>
		<table class="table">
 			<tbody id="tablemycashtddiv" >
 				<?php echo $promo_point_td;?>
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