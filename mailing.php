<?php
    if (isset($_POST['submit'])) {
        $mailFrom = $_POST['email'];
        $message = $_POST['message'];

        // $mailTo = "info@th3doctorsreport.co.ke";
        // $headers = "From: ".$mailFrom;
        // $txt = "You have received an e-mail from ".".\n\n".$message;

        // mail($mailTo, $subject, $txt, $header);
        // header("Location: index.php");

        $to = "info@th3doctorsreport.co.ke";
        $subject = "This is subject";
        
        $message = "<b>This is part of the message.</b>";
        $message .= "<h1>".$message."</h1>";
        
        $header = "From:".$mailFrom." \r\n";
        $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail ($to,$subject,$message,$header);
        
        if( $retval == true ) {
           echo "Message sent successfully...";
        }else {
           echo "Message could not be sent...";
        }




    }
?>
