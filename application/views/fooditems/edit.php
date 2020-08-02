<div class="container col-md-8 col-md-offset-2">
	<h2>Update form</h2>
	<form method="post" action="<?php echo base_url('fooditems/update/'.$fooditem->id); ?>" >
		<div class="form-group">
			<label for="Fooditem">Food Item:</label>
			<input type="text" name="fooditem" class="form-control" value="<?php echo $fooditem->Food_Item; ?>">
		</div>
		<div class="form-group">
			<label for="Description">Description:</label>
			<textarea name="description" class="form-control"><?php echo $fooditem->Description; ?></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>