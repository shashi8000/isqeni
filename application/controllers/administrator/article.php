<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

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
      $data['langId']        = $this->session->userdata('admin_lang') ;
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $checks = $this->input->post('check');

        if($checks !== FALSE)
        {
           foreach($checks AS $check)
           {
             $slid = $this->data->get("article",$this->session->userdata('admin_lang'),array("id"=>$check)) ;
		     $path = "./download/article/".$slid['photo'];
           /*  $ph = explode(".",$slid['photo']) ;
              $count = count($ph) ;

              $ph[$count-2] = $ph[$count-2]."_thumb";
              $path2 = "./download/article/".implode(".",$ph) ;  */
             if(is_file($path)){unlink($path) ; }
          //   if(is_file($path2)){unlink($path2) ; }
             if(! ($this->data->delete("article",$check)))
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

      $data['data']        = $this->data->get("article",$data['langId'],array("method"=>"services"),FALSE,TRUE) ;

     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/article_table',$data);
     $this->load->view('administrator/global/footer');
   }
   public function add()
   {
      $data['langId']        = $this->session->userdata('admin_lang') ;
      if($this->uri->segment(4))
      {
        $data['data']          = $this->data->get("article",$data['langId'],array("id"=>$this->uri->segment(4))) ;
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
    	'title'=>lang("Title"),
    	'desc'=>lang("Desc"),
    	'text2'=>lang("Text")

    	);

    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("LCform[".$key."]", $value, 'required');
    	}

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
    		$Trans        = $this->input->post('LCform');
            $data['data']['title']  = $Trans['title'];
            $data['data']['desc']  = $Trans['desc'];
            $data['data']['text2']  = $Trans['text2'];
    	}else
    	{
    		if($this->data->save())
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("article",$data['langId'],array("id"=>$this->uri->segment(4))) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-error">'.lang("UploadError").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
    		$Trans        = $this->input->post('LCform');
            $data['data']['title']  = $Trans['title'];
            $data['data']['desc']  = $Trans['desc'];
            $data['data']['text2']  = $Trans['text2'];
            }

    	}
      }

       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/article2_form',$data);
       $this->load->view('administrator/global/footer');
   }


//*****************************************************************
   public function delete($slug)
	{
		if($slug > 0)
		{
            $slid = $this->data->get("article",$this->session->userdata('admin_lang'),array("id"=>$slug)) ;
		     $path = "./download/article/".$slid['photo'];
             $ph = explode(".",$slid['photo']) ;
              $count = count($ph) ;

              $ph[$count-2] = $ph[$count-2]."_thumb";
              $path2 = "./download/article/".implode(".",$ph) ;
             if(is_file($path)){unlink($path) ; }
             if(is_file($path2)){unlink($path2) ; }
		  	$this->data->delete("article",$slug);
		}
    	redirect('administrator/article', 'refresh');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */