<div id="" class="container">
	<div class="col-xs-12 col-md-7 left_col">
		<div class="form-signin">
			<h3 class="form-signin-heading">My Account</h3>
			<p class="desc_login_form"></p>
			<form class="form-horizontal" action="<?php echo base_url();?>akun/submit_new_akun" method ="post" id="form_addakun" role="form">
			
				<div class="form-group">
					<label class="col-sm-2 control-label">Account Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control input-sm" id="name" name="name" placeholder="Account Name">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Amount</label>
					<div class="col-sm-10">
						<input type="number" step="any" class="form-control input-sm" id="amount" name="amount" placeholder="Amount">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Detail</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="detail" name="detail" placeholder="Detail" rows=3></textarea>
					</div>
				</div><hr>
				<div class="form-group">
					<label class="col-sm-2 control-label">Real Source</label>
					<div class="col-sm-10">
						<select class="form-control input-sm" id="real_source" name="real_source">
							<option value=0>--Same as Account--</option>
							<?php foreach($parents as $pr){?>
								<option value=<?php echo $pr->id?>><?php echo $pr->name?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<hr>
				<button class="btn btn-sm btn-primary btn-block" type="submit">Tambah</button><br>
			</form><br>
		</div>
	</div>
</div>

<script>
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