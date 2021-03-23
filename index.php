<?php include "validate.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackers-Poulette Contact support</title>
    <style>
        .err_msg{color:red;}
    </style>
</head>
<body>
    <header>
        <a href="#"><img id="logo" src="assets/img/logo.png" width="100" height="100" alt="Logo hackers-poulette"></a>
        <nav>
            <ol>
                <li><a href="#">Home</a></li>
                <li><a href="#">xxx</a></li>
                <li><a href="#">Support</a></li>
            </ol>
        </nav>
    </header>
    <main>
        <section>
            <img src="" alt="raspberry pi illustration">
            <h2>Contact support</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum hic distinctio porro 
            repellat, architecto voluptatem minima culpa voluptatum in nam ea et possimus. 
            Dolore perferendis magni quae ut minus vitae.</p>
            <form id="form_support" name="form_support" action="index.php" method="post">
                <!--  NAME -->
                <label for="form_name">Name</label>
                <input id="form_name" name="name" type="text" placeholder="Your name" value="<?php echo $name;?>">
                <div id="err_msg_name" class="err_msg"><?php echo $err_messages[0];?></div>
                <br>
                <!--  LASTNAME -->
                <label for="form_lastname">Last name</label>
                <input id="form_lastname" name="lastname" type="text" placeholder="Your last name" value="<?php echo $lastname;?>">
                <div id="err_msg_lastname" class="err_msg"><?php echo $err_messages[1];?></div>
                <br>
                <!--  EMAIL -->
                <label for="form_email">Email</label>
                <input id="form_email" name="email" type="email" placeholder="Your email" value="<?php echo $email;?>">
                <div id="err_msg_email" class="err_msg"><?php echo $err_messages[2];?></div>
                <br>
                <!--  GENDER -->
                <input id="form_gender_female" name="gender" type="radio" value="female" <?php echo $gender_female;?>>
                <label for="form_gender_female">Female</label>
                <input id="form_gender_male" name="gender" type="radio" value="male" <?php echo $gender_male;?>>
                <label for="form_gender_male">Male</label>
                <div id="err_msg_gender" class="err_msg"><?php echo $err_messages[3];?></div>
                <br>
                <!--  COUNTRY -->
                <select id="form_country" name="country">
                    <option value="none">Select your country</option>
                    <?php include "assets/countries.html";?>
                </select>
                <?php 
                    if($country!="none"){
                        echo "<script>";
                        echo "  let items = Array.from(document.getElementById('form_country').childNodes);";
                        echo "  let children = items.filter(item => item.nodeName.toLowerCase() == 'option');";
                        echo "  let choosenCountry = '".$country."';
                                children.forEach(country => {
                                    if(country.value == choosenCountry){country.selected = true;}
                                });"; 
                        echo "</script>";
                    }
                ?>
                <div id="err_msg_country" class="err_msg"><?php echo $err_messages[4];?></div>
                <br>
                <!--  SUBJECT -->
                <select id="form_subject" name="subject">
                    <option value="none" <?php echo $subjects[0];?>>Please choose a subject</option>
                    <option value="info" <?php echo $subjects[1];?>>Asking for information</option>
                    <option value="replace" <?php echo $subjects[2];?>>Replacement - repair</option>
                    <option value="refund" <?php echo $subjects[3];?>>Refund</option>
                </select>
                <div id="err_msg_subject" class="err_msg"><?php echo $err_messages[5];?></div>
                <br>
                <!--  MESSAGE -->
                <label for="form_message">Message</label>
                <textarea id="form_message" name="message" cols="30" rows="10"><?php echo $message; ?></textarea>
                <div id="err_msg_message" class="err_msg"><?php echo $err_messages[6];?></div>
                <br>
                <input id="btn_submit" name="support_submit" type="submit" value="Send">
                <br>
                <div id="err_msg_message" class="err_msg"><?php echo $err_messages[7];?></div>
                <input id="form_honeypot" name="honeypot" type="text" value="">
            </form>

        </section>
    </main>
    <footer>
        <section>
            © 2021 Hackers-Poulette
        </section>
    </footer>
</body>
</html>