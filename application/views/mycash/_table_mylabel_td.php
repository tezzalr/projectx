<?php foreach ($allmylabel as $mylabel){?>
	<tr><td>
		<?php 
			$persentase = $mylabel['amount']/$mylabel['max-aloc']*100;
			$progbar = 'success';
			if($persentase>75 && $persentase <= 100){$progbar = 'warning';}
			elseif ($persentase>100){
				$tot = $mylabel['amount']+$mylabel['max-aloc'];
				$suc_pers = $mylabel['max-aloc']/$mylabel['amount']*100;
				$dgr_pers = ($mylabel['amount']-$mylabel['max-aloc'])/$mylabel['amount']*100;
			}
		?>
		<div>
			<strong><span><?php echo $mylabel['name']?></span>
			<span style="float:right"><?php echo "Rp ".number_format($mylabel['amount'],2,',','.');?></span></strong>
		</div>
		<div>
			<span style="float:right" class="aloc"><?php echo "Rp ".number_format($mylabel['max-aloc'],2,',','.');?></span>
			<span style="float:right; margin-right:20px;" class="aloc">Allocation: </span>
		</div><div style="clear:both;"></div>
		<div class="progress" style="margin-bottom:-22px">
		  	<?php if($persentase <= 100){?>
		  		<div class="progress-bar progress-bar-<?php echo $progbar?>" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $persentase?>%">
		  		</div>
		  	<?php }elseif($persentase>100){?>
		  		<div class="progress-bar progress-bar-success" style="width: <?php echo $suc_pers?>%">
					<span class="sr-only">35% Complete (success)</span>
				</div>
				<div class="progress-bar progress-bar-danger" style="width: <?php echo $dgr_pers?>%">
					<span class="sr-only">10% Complete (danger)</span>
				</div>
		  	<?php }?>
		</div>
		<div style="padding: 0 5px 0 5px;">
			<?php if($persentase <= 100){?>
		  		<span class="aloc"><?php echo "Rp ".number_format($mylabel['amount'],2,',','.');?></span>
		  	<?php }elseif($persentase>100){?>
		  		<span class="aloc"><?php echo "Rp ".number_format($mylabel['max-aloc'],2,',','.');?></span>
		  		<span style="float:right; margin-top:2px;" class="aloc"><?php echo "Rp ".number_format(($mylabel['amount']-$mylabel['max-aloc']),2,',','.');?></span>
		  		
		  	<?php }?>
		</div>
	</td></tr>
<?php }?>