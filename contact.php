<?php

        $message = $_POST['message'];
        $headers = "Mail : ".$_POST['email']."";
        $to = "alessio.bovolenta@ynov.com";
        $subject = "De : ".$_POST['name']." ";


      mail($to,$headers,$subject,$message);
        header('location: index.php');

   