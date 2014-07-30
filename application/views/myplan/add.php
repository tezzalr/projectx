<div id="" class="container no_pad">
	<div class="col-xs-12 col-md-7 no_pad">
		<div>
		<button type="button" class="btn btn-link right_col" onclick="toggle_visibility('add_new_aloc');"><span class="ion-plus-round"></span></button>
		<text class="text-primary" style="font-size:20px; padding-left:5px;">Alokasi <strong>
		<?php $timestamp = mktime(0, 0, 0, $rab->month, 1, 2005);
    	echo date("M", $timestamp);?> <?php echo $rab->year;?></strong></text>
		</div>
		<div id="add_new_aloc" style="display:none; margin:10px 0 0 0; background-color: #f5f5f5;">
			<form style="padding:10px 5px 0 5px;" class="form-horizontal" action="<?php echo base_url();?>myplan/submit_new/<?php echo $rab->id?>" method ="post" id="form_addmyplan" role="form">
				<text class="text-primary" style="font-size:20px; padding-left:5px;">Alokasi Baru: </text><br><br>
				<div class="form-group">
					<div class="col-sm-10">
						<select class="form-control input-sm" id="label" name="label" onchange="if_ask_for_new();">
							<option value="0">choose label!!!</option>
							<option value="new" style="color:red">--make new label--</option>
							<?php foreach($labels as $label){?>
								<option value=<?php echo $label->id?>><?php echo $label->name?></option>
							<?php }?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" class="form-control input-sm" id="new_label" name="new_label" placeholder="New Label" disabled>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="number" step="any" class="form-control input-sm" id="amount" name="amount" placeholder="Amount">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<textarea class="form-control input-sm" id="detail" name="detail" placeholder="Detail" rows=3></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<select class="form-control input-sm" id="repeat" name="repeat">
							<option value="0">Repeat Allocation</option>
							<option value="never" style="color:red">Never</option>
							<option value="yes" style="color:red">Monthly</option>
						</select>
					</div>
				</div>
				<button class="btn btn-sm btn-primary btn-block" type="submit">Tambah</button><br>
			</form>
		</div>
		<table class="table">
 			<tbody id="tablemyplantddiv" ><?php echo $myplans_td?></tbody>
		</table>
	</div>
</div>

<script>
$("#form_addmyplan").ajaxForm({	
	dataType: 'json',
	success: function(resp) 
	{
		toggle_visibility('add_new_aloc');
		$("#form_addmyplan")[0].reset();
		$('#tablemyplantddiv').load(config.base+"myplan/load_all_my_plan/<?php echo $rab->id?>");
	},
});  
		
		
$('#date').datepicker({format: 'dd/mm/yyyy'});
function if_ask_for_new(){
	if($('#label').val()=='new'){
		$('#new_label').removeAttr('disabled');
	}else{
		$('#new_label').val('');
		$('#new_label').attr('disabled', 'disabled');
	}
}
</script>