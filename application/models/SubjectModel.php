<?php

class SubjectModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_subjects_can_chose_user($id){
        $this->db->query(
            "SELECT sub.* FROM subjects sub 
                LEFT JOIN subjects_by_student ss ON sub.id = ss.subject_id 
                LEFT JOIN student s ON s.id = ss.student_id 
                WHERE sub.id NOT IN (
                    SELECT sub.id FROM subjects sub 
                        INNER JOIN subjects_by_student ss ON sub.id = ss.subject_id 
                        INNER JOIN student s ON s.id = ss.student_id where s.id =$id ) "
        );
        $query = $this->db->get();

        if ($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_subjects_chosen_user($id){
        $this->db->query(
            "SELECT sub.* FROM subjects sub 
                        INNER JOIN subjects_by_student ss ON sub.id = ss.subject_id 
                        INNER JOIN student s ON s.id = ss.student_id where s.id =$id"
        );
        $query = $this->db->get();

        if ($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }
}
