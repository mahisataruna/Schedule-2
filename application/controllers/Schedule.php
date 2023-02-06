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
        $data['scheduleMember'] = $this->jadwal->getSchedule();
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

				'tanggal' => $this->input->post('tanggal'),
				'lokasi' => $this->input->post('lokasi'),
				'kegiatan' => $this->input->post('kegiatan'),
				'status' => $this->input->post('status') 
			];
			$this->db->insert('schedule', $data);
            // Set flashdata
			$this->session->set_flashdata('message', 
                        '<div class="alert alert-primary alert-dismissible" role="alert">
                            <i class="bx bx-fw bxs-bell bx-tada"></i> Your schedule added! 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
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
				'date_created' => time() 
			];
			$this->db->insert('notes', $data);
            // Set flashdata
			$this->session->set_flashdata('message', 
                        '<div class="alert alert-primary alert-dismissible" role="alert">
                            <i class="bx bx-fw bxs-bell bx-tada"></i> Your notes is added! 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                        );
			redirect('schedule/notes');
        }
    }
}