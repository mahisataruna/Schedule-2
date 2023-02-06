<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_m extends CI_Model
{
    public function getSchedule()
    {
        $query = "SELECT * FROM `schedule`
                --   JOIN `user`
		        --   ON `user`.`id` = `schedule`.`id_member`
                ORDER BY `id` ASC
		";
		return $this->db->query($query)->result_array();
    }

    public function getNotes($getNotes_data=null)
    {
        $query  = "SELECT * FROM `notes`
                   JOIN `user`
                   ON `user`.`id` = `notes`.`id_user`
                   WHERE `user`.`id` = $getNotes_data
                  ";
        return $this->db->query($query)->result_array();          
    }
}