<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cats extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
         $this->setting->changeAdminLang();
         $setting = $this->setting->get();
         $this->load->model('administrator/data');
         $this->load->helper('administrator/lang');
         $this->load->helper('administrator/get');
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
          if(!in_array("4",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }
	}
   public function index()
   {
      $data['langId']        = FALSE ;
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $checks = $this->input->post('check');
        if($checks !== FALSE)
        {
           foreach($checks AS $check)
           {
             if(! ($this->data->delete("cats",$check)))
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
      $data['data']        = $this->data->get("cats",$data['langId'],array("parent"=>0),FALSE,TRUE,array("id"=>"asc")) ;
     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/cats_table',$data);
     $this->load->view('administrator/global/footer');
   }
   public function sub()
   {
      $data['langId']        = FALSE ;
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $checks = $this->input->post('check');
        if($checks !== FALSE)
        {
           foreach($checks AS $check)
           {
             if(! ($this->data->delete("cats",$check)))
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
      $data['data']        = $this->data->get("cats",$data['langId'],array("parent >"=>0),FALSE,TRUE,array("id"=>"asc")) ;
     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/cats2_table',$data);
     $this->load->view('administrator/global/footer');
   }
   public function add()
   {
      $data['langId']          = FALSE ;
      if($this->uri->segment(4)) {
        $data['data']          = $this->data->get("cats",$data['langId'],array("id"=>$this->uri->segment(4))) ;
        $data['id']            = $this->uri->segment(4) ;
      } else {
        $data['id'] = 0 ;
      }
      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
      	'name'=>"الاسم بالعربي",
        'name_en'=>"الاسم بالانجليزي",
        'password'=>"كلمة المرور",
      	'username'=>"اسم المستخدم",
      	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
    	}
      $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
      if ($this->form_validation->run() === FALSE) {
  		  $data['data'] = $this->input->post('Cform');
     }else {
    		if($this->data->save()) {
          $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
          $data['data']          = $this->data->get("cats",$data['langId'],array("id"=>$this->uri->segment(4))) ;
        }else {
          $data['message'] = '<div class="alert alert-error">'.lang("UploadError").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
          $data['data'] = $this->input->post('Cform');
        }
    	}
      }
      $data['cities'] = $this->data->g_data("city_master");
      
              
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/cats_form',$data);
       $this->load->view('administrator/global/footer');
   }
   public function add2()
   {
      $data['langId']        = FALSE ;
      if($this->uri->segment(4))
      {
        $data['data']          = $this->data->get("cats",$data['langId'],array("id"=>$this->uri->segment(4))) ;
        $data['id']            = $this->uri->segment(4) ;
      }
      else
      {
        $data['id'] = 0 ;
      }
      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'name'=>"الاسم بالعربي",
    	'name_en'=>"الاسم بالانجليزي",
    	'parent'=>"القسم الرئيسي"
    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
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
               $data['data']          = $this->data->get("cats",$data['langId'],array("id"=>$this->uri->segment(4))) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-error">'.lang("UploadError").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
            }
    	}
      }
      $data['cats'] = $this->data->get("cats",FALSE,array("parent"=>0),FALSE,TRUE);
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/cats2_form',$data);
       $this->load->view('administrator/global/footer');
   }
//*****************************************************************
   public function delete($slug)
	{
		if($slug > 0)
		{
		  	$this->data->delete("cats",$slug);
		}
    	redirect('administrator/cats', 'refresh');
	}
    public function delete2($slug)
	{
		if($slug > 0)
		{
		  	$this->data->delete("cats",$slug);
		}
    	redirect('administrator/cats/sub', 'refresh');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */