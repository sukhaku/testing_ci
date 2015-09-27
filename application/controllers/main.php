<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends MY_Controller {

    public function index(){
        $this->session->set_flashdata('message', 'Successfully Added.');
        $this->render_pages('home');
    }
 
    public function cat_news($cat_news){
		$this->load->model('mnews');
    	$data['cat'] = $this->mnews->get_news($cat_news);
    	$this->render_pages('cat_news',$data);
    }
 
    public function news($id_news){
    	$this->load->model('mnews');
        if($this->mnews->news($id_news)->num_rows > 0){
    	   $data['news'] = $this->mnews->news($id_news)->row();
           $this->render_pages('news',$data);
        }else{
            error_reporting(0);
            $this->render_pages('news');
        }
    }


    public function login(){
        if($this->session->userdata('islogin')==FALSE){    		
    	   $this->render_pages('login');
        }else{
            redirect(base_url());
        }     
    }

    public function act_login(){
            $this->load->model('mnews');
            $username = $this->input->post('username');
       		$password = $this->input->post('password');
                $cek = $this->mnews->get_user($username,$password)->num_rows(); 
                if($cek>=1){
                    $data = $this->mnews->get_user($username,$password)->row();
                    $this->session->set_userdata('islogin',TRUE);
                    $this->session->set_userdata('username',$data->username);
                    $this->session->set_userdata('password',$data->password);
                    $this->session->set_userdata('level',$data->name_level);
                    if($this->session->userdata('level')=='administrator'){
                        redirect('main/admin');   
                    }else{
                        redirect('main/');
                    }        
                }else{
                    $data['keterangan'] = 'User is not Registered';    
                    $this->render_pages('login',$data);      
                }
    }

    function admin(){
        $this->render_pages('admin');
    }

    function user(){
        $this->load->model('mnews');
        $data['user'] = $this->mnews->select_user()->result();
        $data['level'] = $this->mnews->select_level()->result();
        $data['position'] = $this->mnews->select_position()->result();
        
        $this->render_pages('add_user',$data);
    }

    function add_user(){
        $this->load->model('mnews');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $position = $this->input->post('position');
        $level = $this->input->post('level');

        $data = array("username"=>$username,
            "password"=>$password,"level"=>$level,"position"=>$position,"status"=>'1');
        $input = $this->mnews->insert_user($data);
        redirect(base_url('main/user'));
    }


    public function logout(){
        $this->session->sess_destroy();
    	redirect(base_url());
    }

    function cek_kirim(){
      $this->render_pages('cek_input');
    }

}