<?php include "validate.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackers-Poulette Contact support</title>
    <link rel="stylesheet" href="assets/Skeleton-2.0.4/css/normalize.css">
    <link rel="stylesheet" href="assets/Skeleton-2.0.4/css/skeleton.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <style>
        .err_msg{color:red;}
    </style>
</head>
<body>
    <header class="container">
        <div class="row">
            <div class="three columns">
                <a href="#"><img id="logo" src="assets/img/logo.png" width="200" height="150" alt="Logo hackers-poulette"></a>
            </div>
            <div class="nine columns title">
                <h1>Hackers Poulette</h1>
            </div>            
        </div>
        <div class="row">
            <div class="three columns">
                 .
            </div>
            <div class="nine columns">
                <nav>
                    <ul>                        
                        <li class="u-pull-right"><a href="#" class="linkMenu">Support</a></li>
                        <li class="u-pull-right"><a href="#">Home</a></li>
                    </ul>
                </nav>  
            </div>          
        </div>
    </header>
    <main class="container">
        <div class="row">
            <div class="four columns">
                <img id="rasp" class="u-full-width" src="assets/img/raspberry.JPG" alt="raspberry pi illustration">
            </div>
            <div class="eight columns">
                <h2>Contact support</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum hic distinctio porro 
                repellat, architecto voluptatem minima culpa voluptatum in nam ea et possimus. 
                Dolore perferendis magni quae ut minus vitae.</p>
                <form id="form_support" name="form_support" action="index.php" method="post">
                    <div class="row">
                        <div class="six columns">
                            <!--  NAME -->
                            <label for="form_name">Name</label>
                            <input id="form_name" name="name" class="u-full-width" type="text" placeholder="Your name" value="<?php echo $name;?>">
                            <div id="err_msg_name" class="err_msg"><?php echo $err_messages[0];?></div>
                        </div>
                        <div class="six columns">
                            <!--  LASTNAME -->
                            <label for="form_lastname">Last name</label>
                            <input id="form_lastname" name="lastname" class="u-full-width" type="text" placeholder="Your last name" value="<?php echo $lastname;?>">
                            <div id="err_msg_lastname" class="err_msg"><?php echo $err_messages[1];?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="twelve columns">
                            <!--  EMAIL -->
                            <label for="form_email">Email</label>
                            <input id="form_email" name="email" class="u-full-width" type="email" placeholder="Your email" value="<?php echo $email;?>">
                            <div id="err_msg_email" class="err_msg"><?php echo $err_messages[2];?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="four columns">
                            <label>Gender</label>
                            <!--  GENDER -->
                            <div class="row">
                                <input id="form_gender_female" name="gender" class="four columns" type="radio" value="female" <?php echo $gender_female;?>>
                                <label class="eight columns" for="form_gender_female">Female</label>
                            </div>
                            <div class="row">
                                <input id="form_gender_male" name="gender" class="four columns" type="radio" value="male" <?php echo $gender_male;?>>
                                <label class="eight columns" for="form_gender_male">Male</label>
                            </div>
                            <div id="err_msg_gender" class="err_msg"><?php echo $err_messages[3];?></div>
                        </div>
                        <div class="eight columns">
                            <!--  COUNTRY -->
                            <label for="form_country">Country</label>
                            <select id="form_country" name="country" class="u-full-width">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="twelve columns">
                            <!--  SUBJECT -->
                            <label for="form_subject">Subject</label>
                            <select id="form_subject" name="subject" class="u-full-width">
                                <option value="none" <?php echo $subjects[0];?>>Please choose a subject</option>
                                <option value="info" <?php echo $subjects[1];?>>Asking for information</option>
                                <option value="replace" <?php echo $subjects[2];?>>Replacement - repair</option>
                                <option value="refund" <?php echo $subjects[3];?>>Refund</option>
                            </select>
                            <div id="err_msg_subject" class="err_msg"><?php echo $err_messages[5];?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="twelve columns">
                            <!--  MESSAGE -->
                            <label for="form_message">Message</label>
                            <textarea id="form_message" name="message" cols="30" rows="30" class="u-full-width"><?php echo $message; ?></textarea>
                            <div id="err_msg_message" class="err_msg"><?php echo $err_messages[6];?></div>
                        </div>
                    </div>
                    <div class="row">
                        <input id="btn_submit" name="support_submit" type="submit" value="Send">
                        <div id="err_msg_message" class="err_msg"><?php echo $err_messages[7];?></div>
                    </div>
                    <input id="form_honeypot" name="honeypot" type="text" style="display:none;" value="">
                </form>
            </div>
        </div>
    </main>
    <footer class="container">
        <div class="row">
            © 2021 Hackers-Poulette
        </div>
    </footer>
</body>
</html>