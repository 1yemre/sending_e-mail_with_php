<?php 

     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;
     
     require 'PHPMailer/src/Exception.php';
     require 'PHPMailer/src/PHPMailer.php';
     require 'PHPMailer/src/SMTP.php';
     require 'Config.php';
     


   if(!empty($_POST))
   {  
        $subject=$_POST["subject"];
        $Message=$_POST["Message"];

         $mail= new PHPMailer(true);

          try{
              $mail->isSMTP();
              $mail->SMTPAuth=true;
              $mail->SMTPSecure="tls"; //ssl
              $mail->Port=$port;
              $mail->Host=$host;
              $mail->Username=$username;
              $mail->Password=$password;

              $mail->Subject=$subject;
              $mail->Body=$Message;
              $mail->isHTML(true);
              $mail->addAddress("info@emreenesyenen.com");
              $mail->send();
               echo "email sent";


          }catch(Exception $e)
          {
               echo "mailler Erorr!".$mail->ErrorInfo;
          }

   }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="conatiner my-5">

          <form method="post">
                 <div class="mb-3">
                               <label for="subject" class="form-label">Konu</label>
                                <input type="text" name="subject" id="subject" class="form-control">

                 </div>
                 <div class="mb-3">
                               <label for="Message" class="form-label">Mesaj</label>
                                <textarea type="text" name="Message" class="form-control"></textarea>

                 </div>
                 <div>
                         <button type="submit" name="send-email" class="btn btn-primary">Gönder</button>
                 </div>
   
           
          </form>



</div>



    
</body>
</html>