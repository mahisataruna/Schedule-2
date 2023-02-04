<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

        // Query menu
        $data['menu'] = $this->db->get('user_menu')->result_array();
        // Tampil Menu 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer'); 
    }
}