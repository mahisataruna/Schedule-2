<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{	
	// Private table
	private $_table = "user_menu";
	private $_table2 = "user_sub_menu";
	
    public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
		FROM `user_sub_menu`JOIN `user_menu`
		ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
		";
		return $this->db->query($query)->result_array();
	}
	// Edit subMenu
	public function editsubmenu($id,$data)
	{
		$id = $this->input->post('id');
		$data = array(
			'menu_id' => $this->input->post('menu_id'),
			'title' => $this->input->post('title'),
			'url' => $this->input->post('url'),
			'icon' => $this->input->post('icon'),
			'is_active' => $this->input->post('is_active')
		);
		$this->db->where('id', $id);
		$this->db->update('user_sub_menu', $data);
		return TRUE;
	}
	// Delete subMenu
	public function deletesubmenu($id)
	{
		return $this->db->delete($this->_table2, array("id" => $id));	
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