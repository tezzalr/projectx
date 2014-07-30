<?php $now_date = ''; foreach ($allmycash as $mycash){
	$date = date("d M Y",strtotime($mycash->date));
?>
	<?php if($mycash->date != $now_date){$now_date = $mycash->date;?><tr><td><b><span style="font-size:14px"><?php echo $date?></span>
	<?php $totday=0; foreach ($allmycash as $forcount){
		if($forcount->date == $now_date && $forcount->kind=='Expense'){$totday = $totday+$forcount->amount;}
	}?><span style="font-size:14px; float:right;"><?php echo "Rp ".number_format($totday,2,',','.')?></span>	
	</b></td></tr><?php }?>
	<tr><td>
		<div class="col-xs-2" style="padding: 0 5px 0 5px;"><img src="<?php echo base_url();?>assets/img/merchant/<?php echo $mycash->logo?>" width="100%" alt="" class="img-square"></div>
		<div class="col-xs-10" style="padding-left: 5px;">
			<span><strong><?php echo $mycash->label_name?></strong></span>
			<span style="float:right; font-size:13px;"><?php echo "Rp ".number_format($mycash->amount,2,',','.');?></span><br>
			<span style="font-size:12px;"><?php echo $mycash->detail?></span><br>
			<?php if($mycash->kind == 'Expense'){$color_kind = 'danger';}else{$color_kind = 'success';}?>
			<span class style="float:right; font-size:13px"><button type="button" class="btn btn-xs btn-<?php echo $color_kind;?>"><?php echo $mycash->kind;?></button></span><br>
		</div>
	</td></tr>
<?php }?>