<div class="container col-md-8 col-md-offset-2">
	<h2>Create form</h2>
	<form method="post" action="<?php echo base_url('fooditemsCreate'); ?>" >
		<div class="form-group">
			<label for="Fooditem">Food Item:</label>
			<input type="text" name="fooditem" class="form-control">
		</div>
		<div class="form-group">
			<label for="Description">Description:</label>
			<textarea name="description" class="form-control"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>