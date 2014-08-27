<?php
/*
Template Name: Contact
*/
if(isset($_POST['submitted'])) {
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = __("You forgot to enter your name.", "site5framework");
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = __("You forgot to enter your email address.", "site5framework");
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = __("You entered an invalid email address.", "site5framework");
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure comments were entered
		if(trim($_POST['comments']) === '') {
			$commentError = __("You forgot to enter your comments.", "site5framework");
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//If there is no error, send the email
		if(!isset($hasError)) {
			$msg .= "------------User informations------------ \r\n"; //Title
			$msg .= "User IP: ".$_SERVER["REMOTE_ADDR"]."\r\n"; //Sender's IP
			$msg .= "Browser Info: ".$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
			$msg .= "Referrer: ".$_SERVER["HTTP_REFERER"]; //Referrer

			$emailTo = ''.get_option('wise_contact_email').'';
			$subject = 'Contact Form Submission from '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments \n\n $msg";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			if(mail($emailTo, $subject, $body, $headers)) $emailSent = true;

	}

}
get_header(); ?>



<div id="innerTop">

		<div class="innerTitle clearfix"><h1><?php the_title(); ?></h1></div>

		<?php $pagedesc = get_post_meta($post->ID, 'page_description', $single = true);?>

		<?php if($pagedesc !=''){?>

		<div class="innerDesc"><?php echo $pagedesc ?></div>

		<?php }?>

</div>



<!-- begin colLeft -->

			<div id="colLeft" class="clearfix">

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor

Lorem ipsum dolor sit amet, consectetur.</p>



                    <?php if(isset($hasError)) { ?>
						<p class="error"><?php _e('There was an error submitting the form.', 'site5framework'); ?><p>
					<?php } ?>

					<form id="contact" action="<?php the_permalink(); ?>" method="POST">
                    <div>
					<label for="nameinput">Name</label>
						<input type="text" id="nameinput" name="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField"/>
                    <?php if($nameError != '') { ?>
						  <span class="error"><?=$nameError;?></span>
						  <?php } ?>
                    </div>
                    <div>
					<label for="emailinput">Email</label>
						<input type="text" id="emailinput" name="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email"/>
                        <?php if($emailError != '') { ?>
						  <span class="error"><?=$emailError;?></span>
						  <?php } ?>
                    </div>
                    <div>
					<label for="commentinput">Message</label>
						<textarea cols="20" rows="7" id="commentinput" name="comments" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                        <?php if($commentError != '') { ?>
						  <span class="error"><?=$commentError;?></span><?php } ?>
                    </div><br />
                    <input type="hidden" name="submitted" id="submitted" value="true" />
					<button type="submit" id="submitbutton" class="submitbutton"><?php _e(' &nbsp;Send&nbsp; ', 'site5framework'); ?></button>

					</form>





			</div>

<!-- end colLeft -->



<?php get_sidebar(); ?>





<?php get_footer(); ?>





