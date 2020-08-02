<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FoodItems extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('FoodItemsModel');
	}
	public function index()
	{
		$fooditems = new FoodItemsModel;
		$data['data'] = $fooditems->get_fooditems();
		$this->load->view('includes/header');
		$this->load->view('fooditems/list',$data);
		$this->load->view('includes/footer');
	}
	public function store()
	{
		$fooditems = new FoodItemsModel;
		$fooditems->insert_fooditem();
		redirect(base_url('fooditems'));
	}
	public function create()
	{
		$this->load->view('includes/header');
		$this->load->view('fooditems/create');
		$this->load->view('includes/footer');
	}
	public function edit($id)
	{
		$fooditem = $this->db->get_where('fooditem',array('id' => $id))->row();
		$this->load->view('includes/header');
		$this->load->view('fooditems/edit',array('fooditem' => $fooditem));
		$this->load->view('includes/footer');

	}
	public function update($id)
	{
		$fooditems = new fooditemsModel;
		$fooditems->udpate_fooditem($id);
		redirect(base_url('fooditems'));
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('fooditem');
		redirect(base_url('fooditems'));

	}
}
