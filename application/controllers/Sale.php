<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sale extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('sale_model');
	}
	
	public function index() {
		$data['salesinfo'] = $this->sale_model->get_salesinfo();
		$this->load->view('salesinfo', $data);
	}

	public function generate_pdf() {
	$this->load->library('Pdf');
	
	$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('https://www.roytuts.com');
	$pdf->SetTitle('Sales Information for FoodItems');
	$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
	$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	
	$pdf->SetFont('times', 'BI', 12);
	
	
	$template = array(
		'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
	);

	$this->table->set_template($template);

	$this->table->set_heading('Food Id', 'Price', 'Sale Price', 'Sales Count', 'Sale Date');
	
	$salesinfo = $this->sale_model->get_salesinfo();
		
	foreach ($salesinfo as $sf):
		$this->table->add_row($sf->id, $sf->price, $sf->sales_price, $sf->sales_count, $sf->sales_date);
	endforeach;
	
	$html = $this->table->generate();
	
	$pdf->AddPage();
	
	$pdf->writeHTML($html, true, false, true, false, '');
	
	$pdf->lastPage();

	$pdf->Output(md5(time()).'.pdf', 'D');
}
	
}

