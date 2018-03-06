<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

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
          if(!in_array("5",$this->session->userdata('permi')))
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
             $slid = $this->data->get("news",FALSE,array("id"=>$check)) ;
		     $path = "./download/news/".$slid['photo'];
           /*  $ph = explode(".",$slid['photo']) ;
              $count = count($ph) ;

              $ph[$count-2] = $ph[$count-2]."_thumb";
              $path2 = "./download/article/".implode(".",$ph) ;  */
             if(is_file($path)){unlink($path) ; }
          //   if(is_file($path2)){unlink($path2) ; }
             if(! ($this->data->delete("news",$check)))
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

      $data['data']        = $this->data->get("news",$data['langId']) ;

     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/news_table',$data);
     $this->load->view('administrator/global/footer');
   }

   public function watting()
   {
      $data['langId']        = FALSE ;
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $checks = $this->input->post('check');

        if($checks !== FALSE)
        {
           foreach($checks AS $check)
           {
             if(! ($this->data->delete("addnews",$check)))
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

      $data['data']        = $this->data->get("addnews") ;

     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/news2_table',$data);
     $this->load->view('administrator/global/footer');
   }
   public function add()
   {
      $data['langId']        = FALSE ;
      if($this->uri->segment(4))
      {
        $data['data']          = $this->data->get("news",$data['langId'],array("id"=>$this->uri->segment(4))) ;
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
               $data['data']          = $this->data->get("news",$data['langId'],array("id"=>$this->uri->segment(4))) ;

               if($this->uri->segment(4))
               {

               }
               else
               {
                  $Message = "تم إضافة خبر : ".$_POST['Cform']['title'] ;
               $path = site_url("home/sendNotiToDevice/");
                $myvars = 'msg=' . $Message;

                $ch = curl_init( $path );
                curl_setopt( $ch, CURLOPT_POST, 1);
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
               // curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt( $ch, CURLOPT_HEADER, 0);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

                $response = curl_exec( $ch );
               curl_close($ch);
               }

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
       $this->load->view('administrator/pages/news_form',$data);
       $this->load->view('administrator/global/footer');
   }


//*****************************************************************
   public function delete($slug)
	{
		if($slug > 0)
		{
            $slid = $this->data->get("news",FALSE,array("id"=>$slug)) ;
		     $path = "./download/news/".$slid['photo'];

             if(is_file($path)){unlink($path) ; }
		  	$this->data->delete("news",$slug);
		}
    	redirect('administrator/news', 'refresh');
	}

    public function delete2($slug)
	{
		if($slug > 0)
		{
		  	$this->data->delete("addnews",$slug);
		}
    	redirect('administrator/news/watting', 'refresh');
	}

    public function active($slug)
	{
		if($slug > 0)
		{
		  	$n = $this->data->get("addnews",FALSE,array("id"=>$slug));

            $newRecord = array(
            "title"=>$n['title'],
            "desc"=>word_limiter($n['text2'],15),
            "text2"=>"<p><b> كتب : ".$n['name']."</b></p><p><b>".$n['text2']."</b></p>",
            "photo"=>$n['photo'],
            "ardate"=>date('Y-m-d'),
            "status"=>1
            );
            $this->data->insert("news",$newRecord);
            $this->data->update("addnews",array("active"=>1),"id",$slug);
		}
    	redirect('administrator/news/watting', 'refresh');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */