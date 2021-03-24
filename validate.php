<?php
    require("assets/PHPMailer-master/src/PHPMailer.php");
    require("assets/PHPMailer-master/src/SMTP.php");
    function keep_auth_chars($type,$chain){
        $auth_chars = "";
        $result_chain = "";
        $auth_le = "abcdefghijklmnopqrstuvwxyz"; // letters minuscule
        $auth_Le = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // letters majuscule
        $auth_na = "-'"; // names special chars
        $auth_af = "éèêëàâîïôù"; // accentués français
        $auth_nu = "0123456789"; // numbers
        $auth_em = "@!#$%&'*+-/=?^_`{|}~."; // email special chars
        if($chain!=""){
            switch($type){
                case "name_en": $auth_chars .= $auth_le.$auth_Le.$auth_na; break;
                case "email": $auth_chars .= $auth_le.$auth_Le.$auth_nu.$auth_em; break; 
            }
            $array_letters = str_split($chain);
            foreach($array_letters as $letter){
                $pos = strpos($auth_chars,$letter);
                if(($pos !== false)&&($pos > -1)){$result_chain .= $letter;}
            }
        }
        return $result_chain;
    }
    if(isset($_POST["support_submit"])){
        //======================
        //   Form submitted
        //======================
        $err_messages = ["","","","","","","",""];
        $name = keep_auth_chars("name_en",filter_var($_POST["name"],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW));
        $lastname = keep_auth_chars("name_en",filter_var($_POST["lastname"],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW));
        $email = keep_auth_chars("email",filter_var($_POST["email"],FILTER_SANITIZE_EMAIL));
        $gender = $_POST["gender"];
        $country = $_POST["country"];
        $subject = $_POST["subject"];
        $subjects = ["","","",""];
        $pos = array_search($subject,["none","info","replace","refund"]);
        $subjects[$pos] = "selected";
        $message = filter_var($_POST["message"],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);  
        $valid_fields = true;
        //======================
        //   Validation fields
        //======================
        //=== NAME
            if($name != ""){
                $auth_msg_name = "Authorized chars : letters + ['-]";
                if($name != $_POST["name"]){$valid_fields = false; $err_messages[0] = "Invalid chars";$name = $_POST["name"];}
            }else{
                $valid_fields = false;
                if($_POST["name"]!=""){$err_messages[0] = "Invalid chars";}else{$err_messages[0] = "Name missing";}                
            }
        //=== LASTNAME
            if($lastname != ""){
                $auth_msg_lastname = "Authorized chars : letters + ['-]";
                if($lastname != $_POST["lastname"]){$valid_fields = false; $err_messages[1] = "Invalid chars"; $lastname = $_POST["lastname"];}
            }else{
                $valid_fields = false;
                if($_POST["lastname"]!=""){$err_messages[1] = "Invalid chars";}else{$err_messages[1] = "Last name missing";}    
            }
        //=== EMAIL
            if($email != ""){
                if($email != $_POST["email"]){$valid_fields = false; $err_messages[2] = "Invalid chars";}
            }else{
                $valid_fields = false;
                $err_messages[2] ="Email missing"; 
            }
        //=== GENDER
            if($gender != ""){
                if($gender == "female"){
                    $gender_female = "checked";
                    $gender_male = "";
                }else{
                    $gender_female = "";
                    $gender_male = "checked";
                }
            }else{
                $valid_fields = false;
                $err_messages[3] ="Gender missing"; 
            }
        //=== COUNTRY
            if($country != "none"){

            }else{
                $valid_fields = false;
                $err_messages[4] ="Country not selected"; 
            }
        //=== SUBJECT
            if($subject != "none"){
                $subject_mail = "";
                switch($subject){
                    case "info":$subject_mail = "asking for information"; break;
                    case "replace":$subject_mail = "replacement - repair"; break;
                    case "refund":$subject_mail = "refund"; break;
                }
            }else{
                $valid_fields = false;
                $err_messages[5] ="Subject not selected"; 
            }
        //=== MESSAGE
            if($message != ""){

            }else{
                $valid_fields = false;
                $err_messages[6] ="Message missing"; 
            }
        //=== HONEYPOT
            if($_POST["honeypot"] != ""){
                $valid_fields = false;
                $err_messages[7] = "Hello Mr Bot!";
            }
        //======================
        //   Sending email
        //======================
            $thanks_msg = "Thanks for your feedback!\r\n";
            $thanks_msg .= "Our support team will follow up and get back to you within 48 hours.\n";
            $thanks_msg .= "Here is a copy of your message : <br>";
            $thanks_msg .= "Subject: ".$subject_mail."\n\n";
            $thanks_msg .= "Message: \n\n";
            if($valid_fields == true){
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mail->Host = "mail.infomaniak.com";
                $mail->Port = 465; 
                $mail->IsHTML(true);

                $mail->SetFrom("contact@stephaneenglebert.be");
                $mail->Subject = "Contact support Hackers-Poulette";
                $mail->Body = $thanks_msg.$message;
                $mail->AddAddress($email);
                if(!$mail->Send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }else{
                    header("location:thanks.php");
                }
            }
    }else{
        //======================
        //   First time init
        //======================
        $err_messages = ["","","","","","","",""];
        $name = "";
        $lastname = "";
        $email = "";
        $gender_female = "";
        $gender_male = "";
        $country = "";
        $subjects = ["selected","","",""];
        $message = "";
    }
?>
