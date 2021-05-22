
<?php
/*
 * Template Name: Form
 * description:  Page template without sidebar
 */
 get_header();

 if(isset($_POST['submit'])){
     $username = $_POST['username'];
     $useremail = $_POST['useremail'];
     $useremail = $_POST['useremail'];
     $userlocation = $_POST['userlocation'];
     $userphone = $_POST['userphone'];
     $usercompany = $_POST['usercompany'];
     $usersite = $_POST['usersite'];
     $usermessage = $_POST['usermessage'];
     $to = 'sdevaleem@gmail.com';
     $subject  = "thanks for contacting us";
    //  $message  = "The following signup was submitted: \r\n";
     $message .= "UserName:" . $username . "\r\n";
     $message .= "UserEmail:" .$useremail . "\r\n";
     $message .= "Userlocation:".$userlocation. "\r\n";
     $message .= "Userphone:".$userphone. "\r\n";
     $message .= "Usercompany:".$usercompany. "\r\n";
     $message .= "Usersite:".$usersite. "\r\n";
     $message .= "UserMessage: ".$usermessage. "\r\n";

    //  echo $message ;
    //  die();
     $success_message = mail( $to, $subject, $message );
    //  var_dump($success_message);
 }




?>
   <section class="mt-5">

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <form  method="POST">
                <div class="field">
                    <label class="white-text">Name <span class=""> *</span></label>
                    <input type="text" name="username" id="" required="required">
                </div>
                <div class="field">
                    <label class="white-text">Email <span class=""> *</span></label>
                    <input type="email" name="useremail" id="" required="required">
                </div>
                <div class="field">
                    <label class="white-text">Location <span class=""></span></label>
                    <input type="text" name="userlocation" id="">
                </div>
                <div class="field">
                    <label class="white-text">Phone<span class=""> *</span></label>
                    <input type="number" name="userphone" id="phone" required="required">
                </div>
                <div class="field">
                    <label class="white-text">Company</label>
                    <input type="text" name="usercompany" id="company">
                </div>
                <div class="field">
                    <label class="white-text">Website</label>
                    <input type="text" name="usersite" id="site">
                </div>
                <div class="field textarea">
                    <label class="white-text">Message</label>
                    <textarea rows="6" name="usermessage" id="message" placeholder="write short message"></textarea>
                </div>
                <input type="submit" name="submit" class="shoptheme_submit" value="Send Now!">

            </form>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 contct_wrap_map">
            <h1>get in touch with us</h1>
            <p class="contct_details">See how your business can get benefits with  <span class="clr_clr">OXO</span> <span class="jet-bck">Packaging</span> as Your team.</p>
            <div class="row no-gutters">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="contct_icn text-center">
                        <div class="contct_phoneicn">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contct_icn_detals">
                            <a href="#">
                                (510) 500-9533
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="contct_icn text-center">
                        <div class="contct_phoneicn">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contct_icn_detals">
                            <a href="#">
                                sales@oxopackaging.com
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="contct_icn text-center">
                        <div class="contct_phoneicn">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contct_icn_detals">
                            <a href="#" class="contct_location" data-toggle="tooltip" data-placement="top" title="39899 Balentine Drive Suite 200, Newark, CA 94560">
                                39899 Balentine Drive Suite 200, Newark, CA 94560
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php



 get_footer();