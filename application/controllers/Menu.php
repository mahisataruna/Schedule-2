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
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if($this->form_validation->run() == false) {

            // Tampil Menu 
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer'); 
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-primary alert-dismissible" role="alert">
                <i class="bx bx-fw bxs-bell bx-tada"></i> New menu added! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>'
            );
            redirect('menu');
        }
    }
    
    // Edit menu controller
    public function edit_menu()
	{
		$this->load->model('Menu_model');
		$this->Menu_model->editmenu($data,$id);
		$this->session->set_flashdata('message', 
            '<div class="alert alert-primary alert-dismissible" role="alert">
                <i class="bx bx-fw bxs-bell bx-tada"></i> Edit menu success! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>'
            );
		redirect('menu');
	}
    // Delete menu
    public function delete_menu($id=null)
	{
		if (!isset($id)) show_404();
		$this->load->model('Menu_model');
		if ($this->Menu_model->deletemenu($id)) {
			$this->session->set_flashdata('message', 
            '<div class="alert alert-primary alert-dismissible" role="alert">
                <i class="bx bx-fw bxs-bell bx-tada"></i> Success delete menu! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>'
            );
			redirect(site_url('menu'));
		}
	}
    // SubMenu controller
    public function subMenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();
        // Query Menu 
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();    
        // Form validation
        $this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {

            // Tampil SubMenu 
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active') 
			];
			$this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-primary alert-dismissible" role="alert">
                <i class="bx bx-fw bxs-bell bx-tada"></i> New Submenu added! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>'
            );
            redirect('menu/submenu');
        }
    }
    // Edit SubMenu
    public function edit_submenu()
	{
		$id = $this->input->post('id');
		$this->load->model('Menu_model');
		$this->Menu_model->editsubmenu($id,$data);
		$this->session->set_flashdata('message', 
            '<div class="alert alert-primary alert-dismissible" role="alert">
                <i class="bx bx-fw bxs-bell bx-tada"></i> Your Submenu has been update! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>'
            );
		redirect('menu/submenu');
	}
    // Delete submenu
    public function delete_submenu($id=null)
	{
		if (!isset($id)) show_404();
		$this->load->model('Menu_model');
		if ($this->Menu_model->deletesubmenu($id)) {
			$this->session->set_flashdata('message', 
            '<div class="alert alert-primary alert-dismissible" role="alert">
                <i class="bx bx-fw bxs-bell bx-tada"></i> Your Submenu has been delete! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>'
            );
			redirect(site_url('menu/submenu'));
		}	
	}
	//End
}