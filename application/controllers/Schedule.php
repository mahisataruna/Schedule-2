<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Schedule';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        // Ambil data schedule
        $this->load->model('Jadwal_m', 'jadwal');
        $data['scheduleMember'] = $this->jadwal->getSchedule($data['user']['id']);
        // Form validation
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        
        if ($this->form_validation->run() == false) {
            // Tampilkan halaman schedule
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('schedule/index', $data);
            $this->load->view('templates/footer');
        }  else {
            $data = [
                'user_id' => $this->input->post('user_id'),
				'tanggal' => $this->input->post('tanggal'),
				'lokasi' => $this->input->post('lokasi'),
				'kegiatan' => $this->input->post('kegiatan'),
                'pemasukan' => $this->input->post('pemasukan'),
                'pengeluaran' => $this->input->post('pengeluaran'),
				'status' => $this->input->post('status') 
			];
			$this->db->insert('schedule', $data);
            // Set flashdata
			$this->session->set_flashdata('message', 
                        '
                        <div class="col-lg col-sm col-md mb-3">
                            <div class="bs-toast toast toast toast-placement-ex m-2 fade top-0 start-50 translate-middle-x show bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                            <div class="toast-header">
                                <i class="bx bx-bell bx-tada me-2"></i>
                                <div class="me-auto fw-semibold">
                                Yay, success!
                                </div>
                                <small>Now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                You success added new schedule!
                            </div>
                            </div>
                        </div>
                        '
                        );
			redirect('schedule');
        }  
        
    }
    // Controller notes
    public function notes()
    {
        $data['title']  = 'My Notes';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        // Ambil query db berdasar user session login (id)
        $this->load->model('Jadwal_m', 'jadwal');
        $data['notesMember'] = $this->jadwal->getNotes($data['user']['id']);
        // Form validation
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {

            // Tampil views
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('schedule/notes', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'user_id' => $this->input->post('user_id'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'notes_created' => time() 
			];
			$this->db->insert('notes', $data);
            // Set flashdata
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
                            You success added new notes!
                        </div>
                    </div>
                </div>
                '
                );
			redirect('schedule/notes');
        }
    }
    // Calendar
    public function calendar()
    {
        $data['title']  = 'My Calendar';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        // Load modals calendar
        $this->load->model('Jadwal_m', 'evnt');
        $data['detailEvents'] = $this->evnt->getEventDtl($data['user']['id']);
        // form validation
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == false) {

            // Tampil
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('schedule/calendar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

				'user_id'       => $this->input->post('user_id'),
				'description'   => $this->input->post('description'),
				'start'         => $this->input->post('start'),
				'end'           => $this->input->post('end')
			];
			$this->db->insert('events', $data);
            // Set flashdata
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
                            You success added new events!
                        </div>
                    </div>
                </div>
                '
                );
			redirect('schedule/calendar');
        }
    }
}