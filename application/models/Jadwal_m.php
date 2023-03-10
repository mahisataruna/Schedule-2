<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_m extends CI_Model
{
    // Priv Table
    private $_table = "schedule";
    public function getSchedule($getSchedule_data=null)
    {
        $query = "SELECT * FROM `schedule`
                  JOIN `user`
		          ON `user`.`id` = `schedule`.`user_id`
                  WHERE `schedule`.`user_id` = $getSchedule_data
                  
		";
		return $this->db->query($query)->result_array();
    }
    public function editschedule($id_schedule,$data)
    {
        $id_schedule = $this->input->post('id_schedule');
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'tanggal' => $this->input->post('tanggal'),				
            'lokasi' => $this->input->post('lokasi'),
			'kegiatan' => $this->input->post('kegiatan'),
            'pemasukan' => $this->input->post('pemasukan'),
            'pengeluaran' => $this->input->post('pengeluaran'),
			'status' => $this->input->post('status') 
		);
		$this->db->where('id_schedule', $id_schedule);
		$this->db->update('schedule', $data);
		return TRUE;
    }
    public function deleteschedule($id_schedule)
    {
        return $this->db->delete($this->_table, array("id_schedule" => $id_schedule));
    }

    public function getNotes($getNotes_data=null)
    {
        $query  = "SELECT * FROM `notes`
                   JOIN `user`
                   ON `user`.`id` = `notes`.`user_id`
                   WHERE `user`.`id` = $getNotes_data
                  ";
        return $this->db->query($query)->result_array();          
    }

    public function getEventDtl($getEventDtl_data=null)
    {
        $query = "SELECT * FROM `events`
                  JOIN `user`
                  ON `user`.`id` = `events`.`user_id`
                  WHERE `user`.`id` = $getEventDtl_data
                 ";
        return $this->db->query($query)->result_array();         
    }
}