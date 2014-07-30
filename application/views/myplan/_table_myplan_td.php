<?php
	$tot = 0;
 	foreach ($myplans as $myplan){?>
	<tr><td>
		<span style="font-size:14px;"><?php echo $myplan->name?></span>
		<span style="float:right; font-size:14px;"><?php echo "Rp ".number_format($myplan->max_amount,2,',','.');?></span>
	</td></tr>
	<?php $tot= $tot + $myplan->max_amount;?>
<?php }?>
<tr><td>
<span style="font-size:20px;"><b>Total</b></span>
<span style="float:right; font-size:16px;"><b><?php echo "Rp ".number_format($tot,2,',','.');?></b></span>
</td></tr>