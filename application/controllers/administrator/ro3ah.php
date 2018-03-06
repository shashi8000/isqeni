<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ro3ah extends CI_Controller {

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
          if(!in_array("3",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }
	}
   public function index()
   {
      $data['langId']        = FALSE ;

        $data['data']          = $this->data->get("article",$data['langId'],array("method"=>"ro3ah")) ;
        $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
        $data['method']        = "ro3ah" ;
        $data['Title']         = "الرعاه" ;


      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'title'=>lang("Title"),
    	'text2'=>lang("Text")

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
               $data['data']          = $this->data->get("article",$data['langId'],array("method"=>"ro3ah")) ;
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
       $this->load->view('administrator/pages/article_form',$data);
       $this->load->view('administrator/global/footer');
   }


//*****************************************************************

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */