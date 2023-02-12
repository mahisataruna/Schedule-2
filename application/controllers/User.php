<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function index()
    {
        $data['title']  = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        // Tampil view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title']  = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        // Tampil view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    }

    public function connection()
    {
        $data['title']  = 'Edit Connection';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        // Tampil view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('user/connection', $data);
        $this->load->view('templates/footer');
    }

    // ChangePassword
    public function changePassword()
    {
        $data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password','Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');
		
		if ($this->form_validation->run() ==false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', 
                '
                <div class="col-lg col-sm col-md mb-3">
                    <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <i class="bx bx-bell bx-tada me-2"></i>
                            <div class="me-auto fw-semibold">Upps!</div>
                            <small>Now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            You current password wrong!
                        </div>
                    </div>
                </div>
                '
                );
				redirect('user/changepassword');
			} else {
				if($current_password == $new_password) {
					$this->session->set_flashdata('message', 
                '
                <div class="col-lg col-sm col-md mb-3">
                    <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <i class="bx bx-bell bx-tada me-2"></i>
                            <div class="me-auto fw-semibold">Upps!</div>
                            <small>Now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Your password cannot change, dont match to current password!
                        </div>
                    </div>
                </div>
                '
                );
					redirect('user/changepassword');
				} else {
					//rules untuk password yang benar
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
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
                            You success changes new password!
                        </div>
                    </div>
                </div>
                '
                );
					redirect('user/changepassword');
				}
			}
		}
    }
}