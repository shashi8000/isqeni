<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Times extends CI_Controller {

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
          if(!in_array("9",$this->session->userdata('permi')))
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
             if(! ($this->data->delete("companies",$check)))
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

      $data['data']        = $this->data->get("times",FALSE,FALSE,FALSE,TRUE) ;

     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/times_table',$data);
     $this->load->view('administrator/global/footer');
   }
   public function add()
   {
      $data['langId']        = FALSE ;
      if($this->uri->segment(4))
      {
        $data['data']          = $this->data->get("times",$data['langId'],array("id"=>$this->uri->segment(4))) ;
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
    	'ctime1'=>"من",
    	'ctime2'=>"الي",
    	'branch_id'=>"الفرع",
    	'weeknum'=>"اليوم"
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
               $data['data']          = $this->data->get("times",$data['langId'],array("id"=>$this->uri->segment(4))) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-error">'.lang("UploadError").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
            }

    	}
      }
       $data['branchs']     = $this->data->get("branchs",FALSE,array("id >"=>0),FALSE,TRUE) ;

       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/times_form',$data);
       $this->load->view('administrator/global/footer');
   }


//*****************************************************************
   public function delete($slug)
	{
		if($slug > 0)
		{
		  	$this->data->delete("times",$slug);
		}
    	redirect('administrator/times', 'refresh');

	}

    public function accept($slug)
	{
    		if($slug > 0)
    		{
    		  	$this->data->setStatus("companies",0,$slug,"active");
                $this->data->update("companies",array("rdate"=>date('Y-m-d')),"id",$slug);
                $comp = $this->data->get("companies",FALSE,array("id"=>$slug));
                $client = $this->data->get("clients",FALSE,array("id"=>$comp['client_id']));
                $path = site_url("home/sendNotiToDevice3/".$client['device_token']);
                $myvars = 'msg=' . "تم تفعيل شركتك من قبل الإدارة";

                $ch = curl_init( $path );
                curl_setopt( $ch, CURLOPT_POST, 1);
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
               // curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt( $ch, CURLOPT_HEADER, 0);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

                $response = curl_exec( $ch );
               curl_close($ch);
           }

    	redirect('administrator/companies/watting', 'refresh');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */