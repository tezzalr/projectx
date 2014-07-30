<?php foreach ($allpromo as $promo){
?>
	<tr><td>
		<div class="col-xs-2" style="padding: 0 5px 0 5px;"><img src="<?php echo base_url();?>assets/img/merchant/<?php echo $promo->logo?>" width="100%" alt="" class="img-square"></div>
		<div class="col-xs-10" style="padding-left: 5px;"><span><strong><?php echo $promo->title_promo?></strong></span>
			<span style="float:right; font-size:13px"><?php echo number_format($promo->sum_point,0,',','.')." point";?></span><br>
			<span style="font-size:12px;"><?php echo $promo->detail_promo?></span><br><br>
			<span class style="float:right; font-size:13px">
				<a href="<?php echo base_url()?>mycash/redeem_point/<?php echo $promo->sum_point?>"><button type="button" class="btn btn-xs btn-success">Redeem Point</button></span>
		</div>
	</td></tr>
<?php }?>