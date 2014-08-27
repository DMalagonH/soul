<?php
/*
Template Name: Contact
*/
if(isset($_POST['c_submitted'])) {
		//Check to make sure that the name field is not empty
		if(trim($_POST['c_contactName']) === '') {
			$nameError = __("You forgot to enter your name.", "site5framework");
			$c_hasError = true;
		} else {
			$name = trim($_POST['c_contactName']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['c_email']) === '')  {
			$emailError = __("You forgot to enter your email address.", "site5framework");
			$c_hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['c_email']))) {
			$emailError = __("You entered an invalid email address.", "site5framework");
			$c_hasError = true;
		} else {
			$email = trim($_POST['c_email']);
		}

		//Check to make sure comments were entered
		if(trim($_POST['c_comments']) === '') {
			$commentError = __("You forgot to enter your comments.", "site5framework");
			$c_hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['c_comments']));
			} else {
				$comments = trim($_POST['c_comments']);
			}
		}

		//If there is no error, send the email
		if(!isset($c_hasError)) {
			$msg .= "------------User informations------------ \r\n"; //Title
			$msg .= "User IP: ".$_SERVER["REMOTE_ADDR"]."\r\n"; //Sender's IP
			$msg .= "Browser Info: ".$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
			$msg .= "Referrer: ".$_SERVER["HTTP_REFERER"]; //Referrer

			$emailTo = ''.of_get_option('boldy_contact_email').'';
			$subject = 'Contact Form Submission from '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments \n\n $msg";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			if(mail($emailTo, $subject, $body, $headers)) $c_emailSent = true;

	}

}

get_header(); ?>
<!-- begin colLeft -->
	<section>

			<h1><?php _e('Contact Us', 'site5framework'); ?></h1>
            <p><?php echo stripslashes(stripslashes(of_get_option('boldy_contact_text')))?></p>
            <?php
                if(of_get_option('boldy_contact_map')!="") {
            ?>
                <div id="contact-map">
                    <?php echo of_get_option('boldy_contact_map'); ?>
                </div>
            <?php } ?>

            <div id="contact-form">




			<?php if(isset($hasError)) { ?>
						<p class="error"><?php _e('There was an error submitting the form.', 'site5framework'); ?><p>
					<?php } ?>

					<form id="contact" method="POST">
                    <div>
					<label for="nameinput"><?php _e('Your name', 'site5framework'); ?></label>
						<input type="text" id="nameinput" name="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField"/>
                    <?php if($nameError != '') { ?>
						  <span class="error"><?=$nameError;?></span>
						  <?php } ?>
                    </div>
                    <div>
					<label for="emailinput"><?php _e('Your email', 'site5framework'); ?></label>
						<input type="text" id="emailinput" name="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email"/>
                        <?php if($emailError != '') { ?>
						  <span class="error"><?=$emailError;?></span>
						  <?php } ?>
                    </div>
                    <div>
					<label for="commentinput"><?php _e('Your message', 'site5framework'); ?></label>
						<textarea cols="20" rows="7" id="commentinput" name="comments" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                        <?php if($commentError != '') { ?>
						  <span class="error"><?=$commentError;?></span><?php } ?>
                    </div><br />
                    <input type="hidden" name="submitted" id="submitted" value="true" />
					<button type="submit" id="submitbutton" class="submitbutton"><?php _e(' &nbsp;SEND MESSAGE&nbsp; ', 'site5framework'); ?></button>

					</form>
            </div>

            <div id="contact-data">
                    <?php
                        if(of_get_option('boldy_contact_address')!="") {
                    ?>	<p>
                        <span class="contact-data-field"><?php _e("Address", "site5framework"); ?>:</span>
                        <span class="contact-data-info"><?php echo of_get_option('boldy_contact_address'); ?></span>
                        </p>
                    <?php } ?>
                    <?php
                        if(of_get_option('boldy_contact_phone')!="") {
                    ?>	<p>
                        <span class="contact-data-field"><?php _e("Phone", "site5framework"); ?>:</span>
                        <span class="contact-data-info"><?php echo of_get_option('boldy_contact_phone'); ?></span>
                        </p>
                    <?php } ?>
                    <?php
                        if(of_get_option('boldy_contact_fax')!="") {
                    ?>	<p>
                        <span class="contact-data-field"><?php _e("Fax", "site5framework"); ?>:</span>
                        <span class="contact-data-info"><?php echo of_get_option('boldy_contact_fax'); ?></span>
                        </p>
                    <?php } ?>
            </div>

	</section>
	<!-- end colleft -->

			<?php get_sidebar(); ?>

<?php get_footer(); ?>


