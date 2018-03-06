<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->setting->changeLang();
    }

    public function index($id=NULL){
        //$data['langId']        = FALSE ;
        $data['method']        = "Welcome" ;
        $data['Title']         = "عن التطبيق" ;
        if(isset($id) =='en'){
            $this->load->view('web/pages/en/index');
        }else{
            $this->load->view('web/pages/welcome_index');
        }

    }

    public function send($id=NULL){

        if(isset($id) =='en'){
            $visitor = $_POST['name'];
            $visitormail = $_POST['email'];
            $message = $_POST['message'];
            $mailto = "info@isqeni.com";

            if(!$visitormail == "" && (!strstr($visitormail,"@") || !strstr($visitormail,".")))
            {
                echo "<center><img src='img/error_email.png' /></center>";
                die();
            }

            if(empty($visitor) || empty($visitormail) || empty($message)) {
                echo "<center><img src='img/error_empty.png' /></center>";
                die();
            }

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            // Additional headers
            $headers .= 'To: <info@isqeni.com>' . "\r\n";
            $headers .= 'From:'. $visitormail . "\r\n";


            $todayis = date("l, F j, Y, g:i a");
            $subject = "A message from the website";
            $message = stripcslashes($message);
            $message = "<p><b></b> : $todayis EST <br /><br />
            <b>Name :</b> $visitor <br /><br />
            <b>Message :</b> $message <br /><br />
            ================================<br />
            Isqeni<br />
            <a href='http://isqeni.com/' target='_blank'>www.isqeni.com</a>
            </p>";

                        mail($mailto, $subject, $message, $headers);

                        echo "<center><img src='img/confirm.png' /></center>";

                        echo '<meta http-equiv="Refresh" Content="2; URL=index.html">';
        }else{
            $visitor = $_POST['name'];
            $visitormail = $_POST['email'];
            $message = $_POST['message'];
            $mailto = "info@isqeni.com";

            if(!$visitormail == "" && (!strstr($visitormail,"@") || !strstr($visitormail,".")))
            {
                echo "<center><img src='img/error_email.png' /></center>";
                die();
            }

            if(empty($visitor) || empty($visitormail) || empty($message)) {
                echo "<center><img src='img/error_empty.png' /></center>";
                die();
            }

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            // Additional headers
            $headers .= 'To: <info@isqeni.com>' . "\r\n";
            $headers .= 'From:'. $visitormail . "\r\n";


            $todayis = date("l, F j, Y, g:i a");
            $subject = "رسالة من موقع تطبيق اسقني";
            $message = stripcslashes($message);
            $message = "<p><b></b> : $todayis EST <br /><br />
            <b>الاسم :</b> $visitor <br /><br />
            <b>الرسالة :</b> $message <br /><br />
            ================================<br />
            تطبيق اسقني<br />
            <a href='http://isqeni.com/' target='_blank'>www.isqeni.com</a>
            </p>";

            mail($mailto, $subject, $message, $headers);

            echo "<center><img src='img/confirm.png' /></center>";

            echo '<meta http-equiv="Refresh" Content="2; URL=index.html">';
        }

    }


}

