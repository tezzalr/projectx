<div id="" class="container no_pad">
	<div class="col-xs-12 col-md-7 no_pad">
		<div>
		<button type="button" class="btn btn-link right_col" onclick="toggle_visibility('add_new_aloc');"><span class="ion-plus-round"></span></button>
		<text class="text-primary" style="font-size:20px; padding-left:5px;">Daftar Budgeting</text>
		</div>
		<div id="add_new_aloc" style="display:none; margin:10px 0 0 0; background-color: #f5f5f5;">
			<form style="padding:10px 5px 0 5px;" class="form-horizontal" action="<?php echo base_url();?>myplan/submit_new_rab" method ="post" id="form_addmyplan" role="form">
				<text class="text-primary" style="font-size:20px; padding-left:5px;">RAB Baru: </text><br><br>
				
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" class="form-control input-sm" id="month" name="month" placeholder="month">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" class="form-control input-sm" id="year" name="year" placeholder="Year">
					</div>
				</div>
				<button class="btn btn-sm btn-primary btn-block" type="submit">Tambah</button><br>
			</form>
		</div>
		<table class="table">
 			<tbody id="tablemyplantddiv" ><?php echo $rab_td?></tbody>
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
		$('#tablemyplantddiv').load(config.base+'myplan/load_all_rab');
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