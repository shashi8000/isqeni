<?php
$visitor = $_POST['name'];
$phone = $_POST['phone'];
$visitormail = $_POST['email'];
$address = $_POST['address'];
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
$subject = "طلب الانضمام لفريق تطبيق اسقني";
$message = "<p><b></b> : $todayis EST <br /><br />
<b>Company Name :</b> $visitor <br /><br />
<b>Mobile :</b> $phone <br /><br />
<b>E-mail :</b> $visitormail <br /><br />
<b>Address :</b> $address <br /><br />
================================<br />
Isqeni<br />
<a href='http://isqeni.com/' target='_blank'>www.isqeni.com</a>
</p>";

mail($mailto, $subject, $message, $headers);

echo "<center><img src='img/confirm.png' /></center>";

echo '<meta http-equiv="Refresh" Content="2; URL=index.html">';
?>