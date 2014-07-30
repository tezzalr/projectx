<?php foreach ($allrab as $rab){?>
	<tr><td><a href="<?php echo base_url()?>myplan/add_new/<?php echo $rab->id?>">
		<span style=""><?php 
		$timestamp = mktime(0, 0, 0, $rab->month, 1, 2005);
    	echo date("M", $timestamp);?></span>
		<span style="float:right;"><?php echo $rab->year;?></span>
	</a></td></tr>
<?php }?>