<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	private $_table = "user_menu";
	
    public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
		FROM `user_sub_menu`JOIN `user_menu`
		ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
		";
		return $this->db->query($query)->result_array();
	}

	// Edit menu
	public function editmenu($id,$data)
	{
		$id = $this->input->post('id');
		$data = array(
			'menu'  => $this->input->post('menu')
		);
		$this->db->where('id',$id);
		$this->db->update('user_menu', $data);
		return TRUE;
	}
	// Delete menu
	public function deletemenu($id)
	{
		return $this->db->delete($this->_table, array("id" => $id));
	}
    // END
}