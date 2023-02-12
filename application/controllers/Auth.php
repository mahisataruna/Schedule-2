<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

	// Controller auth
	public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required');
        // Validasi login
        if($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // Jika validasi success
            $this->_login();
        }
    }

	// Private function _login
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password1');
        // Buat query ke database
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Cek jika ada user 
        if ($user) {
            // Cek jika user active 
            if ($user['is_active'] == 1) {
                // Jika active cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
                    // Redirect berdasarkan role_id
                    if ($user['role_id'] == 1 ) {
                        $this->session->set_flashdata('message', 
                        '
                        <div class="col-lg col-sm col-md mb-3">
                            <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                            <div class="toast-header">
                                <i class="bx bx-bell bx-tada me-2"></i>
                                <div class="me-auto fw-semibold">
                                Welcome Admin!
                                </div>
                                <small>Now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Check new update from this schedule app!
                            </div>
                            </div>
                        </div>
                        '
                        );
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('message', 
                        '
                        <div class="col-lg col-sm col-md mb-3">
                            <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                            <div class="toast-header">
                                <i class="bx bx-bell bx-tada me-2"></i>
                                <div class="me-auto fw-semibold">
                                Welcome user!
                                </div>
                                <small>Now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Here, you can get some fitur with schedule app. Enjoy!
                            </div>
                            </div>
                        </div>
                        '
                        );
                        redirect('home');
                    }
                    
                } else {
                    // Jika password salah
                    $this->session->set_flashdata('message', 
                        '
                        <div class="col-lg col-sm col-md mb-3">
                            <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                            <div class="toast-header">
                                <i class="bx bx-bell bx-tada me-2"></i>
                                <div class="me-auto fw-semibold">
                                Upps!
                                </div>
                                <small>Now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Password wrong. Check your password!
                            </div>
                            </div>
                        </div>
                        '
                        );
                    redirect('auth');
                }
            } else {
                // Jika belum active
                $this->session->set_flashdata('message', 
                        '
                        <div class="col-lg col-sm col-md mb-3">
                            <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                            <div class="toast-header">
                                <i class="bx bx-bell bx-tada me-2"></i>
                                <div class="me-auto fw-semibold">
                                Upps!
                                </div>
                                <small>Now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Your account not active, active your account first!
                            </div>
                            </div>
                        </div>
                        '
                        );
			    redirect('auth');
            }
        } else {
            // Gagalkan login jika user tidak ada
            $this->session->set_flashdata('message', 
                        '
                        <div class="col-lg col-sm col-md mb-3">
                            <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                            <div class="toast-header">
                                <i class="bx bx-bell bx-tada me-2"></i>
                                <div class="me-auto fw-semibold">
                                Upps!
                                </div>
                                <small>Now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Your email not registed, register first!
                            </div>
                            </div>
                        </div>
                        '
                        );
            redirect('auth');
        }
    }

	// Controller Registration
	public function registration()
	{
		// Form validation rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',
			[
				'is_unique' => 'Your mail has been record!'
				//is_unique dapat ditambah agar email tidak ada yang sama
			]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        // Jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Account';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'       => 2,
                'is_active'     => 1,
                'date_created'  => time()
            ];
            // insert ke database
            $this->db->insert('user', $data);
            // Success registered account
		    $this->session->set_flashdata('message', 
            '
            <div class="col-lg col-sm col-md mb-3">
                <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                    <div class="toast-header">
                        <i class="bx bx-bell bx-tada me-2"></i>
                        <div class="me-auto fw-semibold">
                            Registration Success!
                        </div>
                        <small>Now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Your has been registerd. Please login.
                    </div>
                </div>
            </div>
            '
            );
            redirect('auth');
        }
	}

	// Logout
    public function logout()
    {
        $this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
        // Success and flashdata and redirect
		$this->session->set_flashdata('message', 
            '
            <div class="col-lg col-sm col-md mb-3">
                <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                    <div class="toast-header">
                        <i class="bx bx-bell bx-tada me-2"></i>
                        <div class="me-auto fw-semibold">
                            Logout Success!
                        </div>
                        <small>Now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Your has been logout.
                    </div>
                </div>
            </div>
            '
        );
		redirect('auth');
    }
}