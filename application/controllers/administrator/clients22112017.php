<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Clients extends CI_Controller {
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
            if(!in_array("6",$this->session->userdata('permi')))
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
               if(! ($this->data->delete("clients",$check)))
             {
                 echo "<script>alert('".lang("NonDelete")."');</script>";
             }
           }
        }else if(isset($_POST['couponcodeSelId'])){
        }
        else
        {
            echo "<script>alert('".lang("NonSelect")."');</script>";
        }
      }
       //

        //$data['data'] = $this->data->get("products", FALSE, array("id >" => 0,"customer_del ="=> 1, 'cat_id' => $sessiondata['id']), FALSE, TRUE, array("id" => "asc"), array($data['setting']['data_in_page'] => $page));
        if(isset($_POST['couponcodeSelId'])){
            $data['data']= $this->data->get("clients",FALSE,array("user_type"=>$_POST['couponcodeSelId'])) ;
        }else{
            $data['data']= $this->data->get("clients",FALSE,array("user_type"=> 1,"user_type !="=> '')) ;
            //$data['data']= $this->data->get("clients");
        }

       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/user/clients_table',$data);
       $this->load->view('administrator/global/footer');
    }
    public function add()
    {
        if($this->uri->segment(4))
      {
          $data['data']        = $this->data->get("clients",FALSE,array("id"=>$this->uri->segment(4))) ;
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
            if(!isset($data['data']['mobile']) || $data['data']['mobile'] !=$_POST['Cform']['mobile'])
            {
      		$this->form_validation->set_rules("Cform[mobile]",lang("Mobile"), 'required|min_length[3]|is_unique[clients.mobile]');
            }
            else{
                $this->form_validation->set_rules("Cform[mobile]",lang("Mobile"), 'required|min_length[3]');
            }
    		if($this->input->post('id') == 0 || ! empty($_POST['Cform']['password'])) {
                $this->form_validation->set_rules("Cform[password]",lang("Password"), 'required|matches[password]|MD5');
    		  $this->form_validation->set_rules("password",lang("ConfPassword"), 'required');
            }
            else
            {
                $_POST['Cform']['password'] = $data['data']['password']   ;
            }
            if(!isset($data['data']['email']) || $data['data']['email'] !=$_POST['Cform']['email'])
            {
      			$this->form_validation->set_rules("Cform[email]",lang("Email"), 'required|valid_email|is_unique[clients.email]');
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
               $data['data']        = $this->data->get("clients",FALSE,array("id"=>$this->uri->segment(4)))  ;
            }
    	}
      }
       $data['groups']  = $this->data->get("users_group");
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/user/clients_form',$data);
       $this->load->view('administrator/global/footer');
    }

    public function notAprove($id=NULL){
        $data=array('verified'=>'0');
        $this->db->where('id',$id);
        $this->db->update('clients',$data);
        redirect('administrator/clients', 'refresh');
    }

    public function aprove($id=NULL){
        $data=array('verified'=>'1');
        $this->db->where('id',$id);
        $this->db->update('clients',$data);
        redirect('administrator/clients', 'refresh');
    }


    public function status($table,$slug,$status)
	{
  		if($this->data->setStatus($table,$status,$slug,"active"))
		{
            redirect('administrator/clients', 'refresh');
		}
	}

  public function addNotify()
  {
     if ($this->input->post('msg') )
     {
       $this->db->insert('notifications',
       [
         'client_id' => $this->input->post('client_id'),
         'text2'     => $this->input->post('msg'),
         'ndate'     => date('Y-m-d H:i:s'),
       ]);
     }
  }


    public function delete($slug)
	{
  		if($slug > 0)
		{
  			$this->data->delete("clients",$slug);
		}
    	redirect('administrator/clients', 'refresh');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */