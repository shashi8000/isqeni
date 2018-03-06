<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
        $this->setting->changeAdminLang();
         $setting = $this->setting->get();
         $this->load->model('administrator/data');
         $this->load->helper('administrator/lang');
         $this->load->helper('administrator/get');
         $this->load->helper('string');
         if($this->session->userdata('admin_lang') == FALSE)
         {
           $data['admin_lang'] = $setting['admin_lang'] ;
           $this->session->set_userdata($data);
         }
          $this->lang->load("admin",$this->setting->getLang($this->session->userdata('admin_lang')))  ;
          $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
         if($this->session->userdata('logged_in_admin') != TRUE )
        {
          redirect(site_url("administrator/login"));
        }
        if (!in_array("1",$this->session->userdata('permi')))
        {
          if(!in_array("8",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }
	}
    public function index()
    {

      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $checks = $this->input->post('check');
        if($checks !== FALSE)
        {
           foreach($checks AS $check)
           {
             if(! ($this->data->delete("users",$check)))
             {
               echo "<script>alert('".lang("NonDelete")."');</script>";
             }
           }
        }
        else
        {
          echo "<script>alert('".lang("NonSelect")."');</script>";
        }
      }
       $data['data']        = $this->data->get("users") ;
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/user/users_table',$data);
       $this->load->view('administrator/global/footer');
    }
    public function add()
    {

      if($this->uri->segment(4))
      {
        $data['data']        = $this->data->get("users",FALSE,array("id"=>$this->uri->segment(4))) ;
        $data['id']          = $this->uri->segment(4) ;
      }
      else
      {
        $data['id'] = 0 ;
      }
      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0)
      {

    		//echo $key . "***".$value ."<br/>";
    		$this->form_validation->set_rules("Cform[name]",lang("Name"),'required');
    		$this->form_validation->set_rules("Cform[group_id]",lang("Group"),'required');
            if(!isset($data['data']['username']) || $data['data']['username'] !=$_POST['Cform']['username'])
            {
    		$this->form_validation->set_rules("Cform[username]",lang("UserName"), 'required|min_length[3]|is_unique[users.username]');
            }
            else{
              $this->form_validation->set_rules("Cform[username]",lang("UserName"), 'required|min_length[3]');
            }
    		if($this->input->post('id') == 0 || ! empty($_POST['Cform']['password'])) {
              $this->form_validation->set_rules("Cform[password]",lang("Password"), 'required|matches[password]|MD5');
    		  $this->form_validation->set_rules("password",lang("ConfPassword"), 'required');
            }
            else
            {
              $_POST['Cform']['password'] = $data['data']['password']   ;
            }
            if(!isset($data['data']['username']) || $data['data']['email'] !=$_POST['Cform']['email'])
            {
    			$this->form_validation->set_rules("Cform[email]",lang("Email"), 'required|valid_email|is_unique[users.email]');
            }
            else{
              $this->form_validation->set_rules("Cform[email]",lang("Email"), 'required|valid_email');
            }

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
    	}else
    	{
    		if($this->data->save())
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']        = $this->data->get("users",FALSE,array("id"=>$this->uri->segment(4)))  ;
            }

    	}
      }

       $data['groups']  = $this->data->get("users_group");
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/user/users_form',$data);
       $this->load->view('administrator/global/footer');
    }
    public function status($table,$slug,$status)
	{

		if($this->data->setStatus($table,$status,$slug))
		{
          redirect('administrator/users', 'refresh');
		}


	}

    public function delete($slug)
	{

		if($slug > 0)
		{
			$this->data->delete("users",$slug);
		}
    	redirect('administrator/users', 'refresh');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */