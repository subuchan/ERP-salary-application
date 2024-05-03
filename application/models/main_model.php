<?php
class Main_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function datainsert($data){
        $this->load->database();
        return $this->db->insert('user_table',$data);
        
    }
    public function dataget(){
        $this->load->database();
        $this->db->select('*');
        return $this->db->get('user_table')->result();
    }
  
    public function checkdata($username,$password){
        $this->load->database();
        $this->db->where('userid', $username);
        $query = $this->db->get('user_table');
        $user = $query->row();

        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        

        return false;
    }
    public function emp_data($data2){
        $this->load->database();
        return $this->db->insert('employee_table',$data2);
        
    }
    public function salary_add($data4){
        $this->load->database();
        return $this->db->insert('employee_salary',$data4);
    }
    public function attend($data5){
        $this->load->database();
        return $this->db->insert('employee_attendance',$data5);
    }
    // public function getdata(){
    //     $this->load->database();
    //     $this->db->select('*');
    //     return $this->db->get('user_table')->result();
    // }
    public function getdata(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('employee_table');
        $this->db->join('employee_salary','employee_salary.emp_id = employee_table.emp_id');
        $this->db->join('employee_attendance','employee_attendance.emp_id = employee_table.emp_id');
        return $this->db->get()->result();
    }
    public function getviewdata(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('employee_table');
        $this->db->join('employee_salary','employee_salary.emp_id = employee_table.emp_id');
        $this->db->join('employee_attendance','employee_attendance.emp_id = employee_table.emp_id');
        return $this->db->get()->result();

    } 
    public function getpdfdata(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('employee_table');
        $this->db->join('employee_salary','employee_salary.emp_id = employee_table.emp_id');
        $this->db->join('employee_attendance','employee_attendance.emp_id = employee_table.emp_id');
        return $this->db->get()->result();
    }
    public function getviewdata2($emp_id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('employee_table');
        $this->db->where('employee_table.emp_id', $emp_id);
        $this->db->join('employee_salary','employee_salary.emp_id = employee_table.emp_id');
        $this->db->join('employee_attendance','employee_attendance.emp_id = employee_table.emp_id');
        return $this->db->get()->row_array();
       
    }
}

?>