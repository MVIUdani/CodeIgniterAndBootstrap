<?php

class FoodItemsModel extends CI_Model
{
	
	public function get_fooditems()
	{
		$query = $this->db->get('fooditem');
		return $query->result();
	}
	public function insert_fooditem()
	{
		 $data = array('Food_Item' => $this->input->post('fooditem'),
		 'Description' => $this->input->post('description'));
		 return $this->db->insert('fooditem',$data);
	}
	public function udpate_fooditem($id)
	{
		 $data = array('Food_Item' => $this->input->post('fooditem'),
		 'Description' => $this->input->post('description'));
		 if ($id == 0) {
		 	 return $this->db->update('fooditem',$data);
		 
		 }
		 else {
		 	$this->db->where('id',$id);
		 	return $this->db->update('fooditem',$data);
		 
		 }
	
	}
	
    public function delete($id) {
    $this->db->delete('fooditem',array('id' => $id) );
    return;
 }

}