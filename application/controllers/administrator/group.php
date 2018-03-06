<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {

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
          if(!in_array("8",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }

	}
   public function index()
   {
      $data['langId']        = getLang($this->session->userdata('admin_lang')) ;
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $checks = $this->input->post('check');
        if($checks !== FALSE)
        {
           foreach($checks AS $check)
           {
             $slid = $this->data->get("users_group",FALSE,array("id"=>$check)) ;
		    /* $path = "./download/city/".$slid['photo'];
             if(is_file($path)){unlink($path) ; }*/
             if(! ($this->data->delete("users_group",$check)))
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
     $data['data']        = $this->data->get("users_group") ;
     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/user/group_table',$data);
     $this->load->view('administrator/global/footer');
   }

   public function add()
   {
      $data['langId']        = getLang($this->session->userdata('admin_lang')) ;
      if($this->uri->segment(4))
      {
        $data['data']          = $this->data->get("users_group",FALSE,array("id"=>$this->uri->segment(4))) ;
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
    	'name'=>'اسم المجموعة '
    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("permission", "تصريحات المجموعة", 'required');
    	}
        $this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
            $permission = $this->input->post('permission');
    	  	if($permission != FALSE){$data['data']["permission"] = implode(",",$permission);}
    	}else
    	{
    		if($this->data->save())
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("users_group",FALSE,array("id"=>$this->uri->segment(4))) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-danger">حدث خطأ .. لم يتم الحفظ .. ربما بسبب خطأ فى التحميل<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
              $permission = $this->input->post('permission');
    	  	  if($permission != FALSE){$data['data']["permission"] = implode(",",$permission);}
            }

    	}
      }
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/user/group_form',$data);
       $this->load->view('administrator/global/footer');
   }

   public function delete($slug)
	{
		if($slug > 0)
		{
             $this->data->delete("users_group",$slug);

		}
    	redirect('administrator/group', 'refresh');

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */