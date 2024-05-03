<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

class Maincont extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->helper('url');
        $this->load->model('main_model');

    }
    public function index(){
        $this->load->view('index');
    }
    public function logpage(){
        $this->load->view('signin');
    }
    public function dashboard(){
        if($this->session->userdata('user')){
        $this->load->view('dashboard');
        }
        else{
            echo 'login to go dashboard page';
            redirect(base_url('maincont/logpage'));
        }
    }
    public function login(){
        extract($_POST);
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        
        // $hashedpassword=$row['password'];
        // if(!password_verify($password,$hashedpassword)){

        // }
        $this->load->model('main_model');
        $result=$this->main_model->checkdata($username,$password);

        if($result == true){
            $this->session->set_userdata('user',$result);
            redirect(base_url('maincont/dashboard'));
        }
        else{
           
            $this->session->set_flashdata('error', 'Invalid Username Password');
        redirect(base_url('maincont/logpage'));
        }
    }
    public function logout(){
        $this->session->unset_userdata('user');
        redirect(base_url('maincont/logpage'));
    }
    public function formdata(){
        extract($_POST);
        $hasedpassword= password_hash($password,PASSWORD_BCRYPT);
        $data=[
            'userid'=> $userid,
            'password'=> $hasedpassword,
            'mobile'=> $number,
            'email'=> $email,
        ];
        
     $this->load->model('main_model');
     $result=$this->main_model->datainsert($data);
     $this->load->library('session');
     
     if($result == true){
        $this->session->set_flashdata('success', ' Added Successfully');
        redirect(base_url('maincont/index'));
    }else{
       
        $this->session->set_flashdata('error', 'user Id Already exists. Please try again!');
    redirect(base_url('maincont/index'));
    }
    }
    public function viewdata(){
        if($this->session->userdata('user')){
        $this->load->model('main_model');
        $return['data1']=$this->main_model->dataget();
        $this->load->view('record',$return);
        }
        else {
            echo 'signin to view data';
        }
    }
    public function new_empform(){
       if($this->session->userdata('user')){
       $this->load->view('employee_entry');
       }
       else {
        echo 'signin to go session not active';
       }
    }
    public function employeedetails(){
        extract($_POST);
        $data2=[
            'emp_id'=>$empid,
            'emp_name'=>$empname,
            'emp_gender'=>$empgender,
            'emp_designation'=>$empdesignation,
            'emp_number'=>$empmobile,
            'emp_email'=>$empemail,
        ];
        $this->load->model('main_model');
        $result = $this->main_model->emp_data($data2);
        if($result == true){
            $this->session->set_flashdata('success', 'New Employee Added Successfully');
            redirect(base_url('maincont/new_empform'));
        }else{
           
            $this->session->set_flashdata('error', 'Employee Id Already exists. Please try again!');
        redirect(base_url('maincont/new_empform'));
        }
    }
    
    public function empdetails(){
        if($this->session->userdata('user')){
        $this->load->view('employeedata');
        }
        else {
            echo 'no user found login to view data';
        }
    }
    public function empsalary_update(){
        if($this->session->userdata('user')){
        $this->load->view('insertsalary');
        
        }
    }
    public function empsalary(){
        extract($_POST); 
        $percentage1=60; 
        $percentage2=40; 
        // $percentage1=$this->input->post('percentage1');
        $basic=$gross*$percentage1/100;
        // $percentage2=$this->input->post('percentage2');
        $hra=$basic*$percentage2/100;
        $allowance=$gross-$basic-$hra;
        $total=$basic+$hra+$allowance;
        $data4=array(
            'emp_id'=>$empid,
            'gross'=>$gross,
            'basic'=>$basic,
            'hra'=>$hra,
            'allowance'=>$allowance,
            'total'=>$total,
        );
        $this->load->model('main_model');
        $result=$this->main_model->salary_add($data4);

        if($result == true){
            $this->session->set_flashdata('success', 'Salary Added Successfully');
            redirect(base_url('maincont/empsalary_update'));
        }else{
           
            $this->session->set_flashdata('error', 'Employee Id Not Found. Please try again!');
        redirect(base_url('maincont/empsalary_update'));
        }
    }
    public function attendance_page(){
        if($this->session->userdata('user')){
            $this->load->view('attendance');
            }
    }
    public function attendance(){
        extract($_POST);
        $data5=[
            'emp_id'=>$empid,
            'daypresent'=>$daypresent,
        ];
        $daypresent=$this->input->post('daypresent');
        $paid=$daypresent*$percentage2/100;
        $this->load->model('main_model');
        $result=$this->main_model->attend($data5);
        if($result == true){
            $this->session->set_flashdata('success', 'Attendance Added Successfully');
            redirect(base_url('maincont/attendance_page'));
        }else{
           
            $this->session->set_flashdata('error', 'Employee Id Not Found. Please try again!');
        redirect(base_url('maincont/attendance_page'));
        }
    }
    public function employee_data(){
        if($this->session->userdata('user')){
            $data['data5']=$this->main_model->getviewdata();
            $this->load->view('view_data',$data);
            
            }
    }
    // public function excel_import(){
    //     $this->load->model('main_model');
    //     $data['data']=$this->main_model->getdata();
    //     $this->load->view('exportdata',$data);
    // }
    public function excel_import(){
        $this->load->model('main_model');
        $data['data']=$this->main_model->getdata();
        $this->load->view('exportdata',$data);
    }
    public function salaryslip(){
        $this->load->model('main_model');
        if($this->session->userdata('user')){
        $data['data']=$this->main_model->getviewdata();
        $this->load->view('receiptpdf',$data);
        }
    }
    public function emppdfid($emp_id){
        $this->load->model('main_model');
        $employeedata=$this->main_model->getviewdata2($emp_id);
        $empname= $employeedata['emp_name'];
        $empid= $employeedata['emp_id'];
        $daypresent= $employeedata['daypresent'];
        $fixedgross =$employeedata['gross'];
        $fixedbasic =$employeedata['basic'];
        $fixedhra =$employeedata['hra'];
        $fixedallowance =$employeedata['allowance'];
        $percentage1=60; 
        $percentage2=40;
        $totaldays=30;
        $gross =$employeedata['gross'] / $totaldays * $employeedata['daypresent'];
        $basic=$gross * $percentage1 / 100;
        $hra=$basic*$percentage2/100;
        $allowance=$gross -$basic-$hra;
        $total=$basic+$hra+$allowance;
        $newsalary= array(
            'new_id'=> $empid,
            'new_name'=> $empname,
            'fixed_gross'=>$fixedgross,
            'fixed_basic'=>$fixedbasic,
            'fixed_hra'=>$fixedhra,
            'fixed_allowance'=>$fixedallowance,
            'new_gross'=>$gross,
            'total_days'=>$totaldays,
            'new_daypresent'=>$daypresent,
            'new_basic'=> $basic,
            'new_hra' => $hra,
            'new_allowance'=>$allowance,
            'new_total'=>$total,
        );
        $newdata['newsalary']=$newsalary;
        $this->load->view('employeesingledata',$newdata);
        $html=$this->load->view('employeesingledata',$newdata,true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
            'margin_top'=>10,
            'margin_right'=>5,
            'margin_left'=>5,
            'margin_bottom'=>10,
        ]);
        $pdfFilePath = "employeesalary.pdf";
        $mpdf->WriteHTML($html);
        $mpdf->Output($pdfFilePath,'D');
    }

    public function pdfget(){
        $this->load->model('main_model');
        $data['data']=$this->main_model->getpdfdata();
        
        $this->load->view('receiptpdf',$data);
        $html=$this->load->view('receiptpdf',$data,true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
            'margin_top'=>10,
            'margin_right'=>5,
            'margin_left'=>5,
            'margin_bottom'=>10,
        ]);
        $pdfFilePath = "download.pdf";
        $mpdf->WriteHTML($html);
        $mpdf->Output($pdfFilePath,'D');
    }
}

?>