<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Generate PDF report from MySQL database using Codeigniter</title>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width:
			100%;
		}
		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}
		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>
<body>
	<div style="margin: 10px 0 0 10px;width: 600px">
		<h3>Sales Information</h3>

		<?php
			echo anchor('sale/generate_pdf', 'Generate PDF Report');
	
	        echo '<p/>';		
			$this->table->set_heading('Food Id','Name', 'Price', 'Sale Price', 'Sales Count', 'Sale Date');
			
			foreach ($salesinfo as $sf):
				$this->table->add_row($sf->id,$sf->name, $sf->price, $sf->sales_price, $sf->sales_count, $sf->sales_date);
			endforeach;
			
			echo $this->table->generate();
		?>
		
	</div>
</body>
</html>