<div class="container table-responsive">
	<div class="row">
	<div class="col-lg-12">
		<h2><b>FoodItems </b></h2>
		<div class="pull-right">
			<a class="btn btn-primary" href="<?php echo base_url('fooditems/create'); ?>">Create</a>
		</div>
	</div>
</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Food Item</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $d) { ?>
				<tr>
					<td><?php echo $d->Food_Item; ?></td>
					<td><?php echo $d->Description; ?></td>
					<td>
						<form method="DELETE" action="<?php echo base_url('fooditems/delete/'.$d->id); ?>">
							<a href="<?php echo base_url('fooditems/edit/'.$d->id); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
							<button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
						</form>

					</td>
				</tr>
				
			<?php } ?>
		</tbody>
	</table>
</div>