<?php
    include("path.php");
    if (isset($_POST['submit'])) {
        $mailFrom = $_POST['email'];
        $message = $_POST['message'];

        $mailTo = "info@th3doctorsreport.co.ke";
        $headers = "From:".$mailFrom;
        $txt = "You have received an e-mail from ".".\n\n".$message;

        if (mail($mailTo, $subject, $txt, $header)) {
            header("Location: index.php?mailsend");
        }else{
            echo "Failed";
        }
        
    }
?>  