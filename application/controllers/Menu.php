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
                '
                <div class="col-lg col-sm col-md mb-3">
                    <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <i class="bx bx-bell bx-tada me-2"></i>
                            <div class="me-auto fw-semibold">Yay, success!</div>
                            <small>Now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            You success added new menu!
                        </div>
                    </div>
                </div>
                '
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
                '
                <div class="col-lg col-sm col-md mb-3">
                    <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <i class="bx bx-bell bx-tada me-2"></i>
                            <div class="me-auto fw-semibold">Yay, success!</div>
                            <small>Now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            You success update menu!
                        </div>
                    </div>
                </div>
                '
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
                '
                <div class="col-lg col-sm col-md mb-3">
                    <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <i class="bx bx-bell bx-tada me-2"></i>
                            <div class="me-auto fw-semibold">Menu delete!</div>
                            <small>Now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            You success delete this menu!
                        </div>
                    </div>
                </div>
                '
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
                '
                <div class="col-lg col-sm col-md mb-3">
                    <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <i class="bx bx-bell bx-tada me-2"></i>
                            <div class="me-auto fw-semibold">Yay, success!</div>
                            <small>Now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            You success added new submenu!
                        </div>
                    </div>
                </div>
                '
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
                '
                <div class="col-lg col-sm col-md mb-3">
                    <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <i class="bx bx-bell bx-tada me-2"></i>
                            <div class="me-auto fw-semibold">Yay, success!</div>
                            <small>Now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            You success update submenu!
                        </div>
                    </div>
                </div>
                '
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
                '
                <div class="col-lg col-sm col-md mb-3">
                    <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <i class="bx bx-bell bx-tada me-2"></i>
                            <div class="me-auto fw-semibold">Notes!</div>
                            <small>Now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            You success delete submenu!
                        </div>
                    </div>
                </div>
                '
                );
			redirect(site_url('menu/submenu'));
		}	
	}
	//End
}