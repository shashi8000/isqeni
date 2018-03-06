<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ad extends CI_Controller {

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
	}
   public function index()
   {
      $data['langId']        = $this->session->userdata('admin_lang') ;
     if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $checks = $this->input->post('check');
        if($checks !== FALSE)
        {
           foreach($checks AS $check)
           {
               if($check > 0)
		        {
             $slid = $this->data->get("ads",FALSE,array("id"=>$check)) ;
		     $path = $slid['photo'];
             if(is_file($path)){unlink($path) ; }
             if(! ($this->data->delete("ads",$check)))
             {
               echo "<script>alert('".lang("NonDelete")."');</script>";
             }
             }
           }
        }
        else
        {
          echo "<script>alert('".lang("NonSelect")."');</script>";
        }
      }
     $data['data']        = $this->data->get("ads",FALSE,array("atype"=>0),FALSE,TRUE) ;
     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/ads_table',$data);
     $this->load->view('administrator/global/footer');
   }

   public function add()
   {
      $data['langId']        = $this->session->userdata('admin_lang');
      if($this->uri->segment(4))
      {
        $data['data']          = $this->data->get("ads",FALSE,array("id"=>$this->uri->segment(4))) ;
        $data['id']            = $this->uri->segment(4) ;
      }
      else
      {
        $data['id'] = 0 ;
      }

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        if((isset($_FILES['photo_to_up']['name']) && empty($_FILES['photo_to_up']['name'])) &&  empty($data['data']['photo']))
        {
           $this->form_validation->set_rules("photo", "الصوره", 'required');
        }
        $this->form_validation->set_rules("Cform[name]", "اسم الإعلان", 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
    	}else
    	{

    		if($this->data->save())
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("ads",FALSE,array("id"=>$this->uri->segment(4))) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-error">'.lang("UploadError").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
            }

    	}
      }
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/ads_form',$data);
       $this->load->view('administrator/global/footer');
   }

   public function delete($slug)
	{
		if($slug > 0)
		{
		    $slid = $this->data->get("ads",FALSE,array("id"=>$slug)) ;
		    $path = $slid['photo'];
            if(is_file($path)){unlink($path) ; }
		  	$this->data->delete("ads",$slug);
		}
    	redirect('administrator/ad', 'refresh');

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */