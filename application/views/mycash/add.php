<div id="" class="container">
	<div class="col-xs-12 col-md-7 left_col">
		<div class="form-signin">
			<h3 class="form-signin-heading">My Cash</h3>
			<p class="desc_login_form"></p>
			<form class="form-horizontal" action="<?php echo base_url();?>mycash/submit_new" method ="post" id="form_addmycash" role="form">
			
				<div class="form-group">
					<div class="col-sm-12">
						<select class="form-control input-sm" id="kind" name="kind">
							<option value="Expense">Expense</option>
							<option value="Incomes">Income</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Date</label>
					<div class="col-sm-10">
						<input type="text" class="form-control input-sm" id="date" name="date" value="<?php echo date('d/m/Y')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Label</label>
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
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-10">
						<input type="text" class="form-control input-sm" id="new_label" name="new_label" placeholder="New Label" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Amount</label>
					<div class="col-sm-10">
						<input type="number" step="any" class="form-control input-sm" id="amount" name="amount" placeholder="Amount">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Merchant</label>
					<div class="col-sm-10">
						<select class="form-control input-sm" id="merchant" name="merchant">
							<?php foreach($merchants as $merchant){?>
								<option value=<?php echo $merchant->id?>><?php echo $merchant->name?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Detail</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="detail" name="detail" placeholder="Detail" rows=3></textarea>
					</div>
				</div><hr>
				<div class="form-group">
					<label class="col-sm-2 control-label">From Account</label>
					<div class="col-sm-10">
						<select class="form-control" id="akun" name="akun">
							<option value="English">Cash</option>
							<option value="Indonesia">Mandiri - Debit</option>
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