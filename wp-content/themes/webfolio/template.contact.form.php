<?php
/*
Template Name: Contact
*/
if(isset($_POST['submitted'])) {
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = __("Olvidó ingresar su nombre.", "site5framework");
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = __("Olvidó ingresar su correo electrónico.", "site5framework");
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = __("Ingresó una direccion de correo inválida.", "site5framework");
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure comments were entered
		if(trim($_POST['comments']) === '') {
			$commentError = __("Olvidó ingresar su mensaje.", "site5framework");
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

			$emailTo = ''.get_option('webfolio_contact_email').'';
			$subject = 'Contact Form Submission from '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments \n\n $msg";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

			if(mail($emailTo, $subject, $body, $headers)) $emailSent = true;

	}

}
get_header(); ?>

<!-- begin colLeft -->

			<section class="clearfix">

			<h1><?php _e('Cont&aacute;ctenos', 'site5framework'); ?></h1>
            <p><?php echo stripslashes(stripslashes(of_get_option('webfolio_contact_text')))?></p>
            <?php
                if(of_get_option('webfolio_contact_map')!="") {
            ?>
                <div id="contact-map">
                    <?php echo of_get_option('webfolio_contact_map'); ?>
                </div>
            <?php
                }
            ?>

			 <div id="contact-form">

			<?php if(isset($hasError)) { ?>
						<p class="error"><?php _e('Ocurrió un error al enviar el formulario.', 'site5framework'); ?><p>
					<?php } ?>

					<form id="contactForm" action="<?php the_permalink(); ?>" method="POST">
                    <div>
					<label for="nameinput"><?php _e('Nombre', 'site5framework'); ?></label>
						<input type="text" id="nameinput" name="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField"/>
                    <?php if($nameError != '') { ?>
						  <span class="error"><?=$nameError;?></span>
						  <?php } ?>
                    </div>
                    <div>
					<label for="emailinput"><?php _e('Email', 'site5framework'); ?></label>
						<input type="text" id="emailinput" name="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email"/>
                        <?php if($emailError != '') { ?>
						  <span class="error"><?=$emailError;?></span>
						  <?php } ?>
                    </div>
                    <div>
					<label for="commentinput"><?php _e('Mensaje', 'site5framework'); ?></label>
						<textarea cols="20" rows="7" id="commentinput" name="comments" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                        <?php if($commentError != '') { ?>
						  <span class="error"><?=$commentError;?></span><?php } ?>
                    </div><br />
                    <input type="hidden" name="submitted" id="submitted" value="true" />
					<button type="submit" id="submitbutton" class="submitbutton"><?php _e("Enviar", "site5framework"); ?></button>

					</form>

			</div>

            <div id="contact-data">
                    <?php
                        if(of_get_option('webfolio_contact_email')!="") {
                    ?>	<p>
                        <span class="contact-data-field"><?php _e("Email", "site5framework"); ?>:</span>
                        <span class="contact-data-info"><?php echo of_get_option('webfolio_contact_email'); ?></span>
                        </p>
                    <?php } ?>
					<?php
                        if(of_get_option('webfolio_contact_phone')!="") {
                    ?>	<p>
                        <span class="contact-data-field"><?php _e("Celular", "site5framework"); ?>:</span>
                        <span class="contact-data-info"><?php echo of_get_option('webfolio_contact_phone'); ?></span>
                        </p>
                    <?php } ?>
					<?php
                        if(of_get_option('webfolio_contact_address')!="") {
                    ?>	<p>
                        <span class="contact-data-field"><?php _e("Ubicaci&oacute;n", "site5framework"); ?>:</span>
                        <span class="contact-data-info"><?php echo of_get_option('webfolio_contact_address'); ?></span>
                        </p>
                    <?php } ?>
                    <?php
                        if(of_get_option('webfolio_contact_fax')!="") {
                    ?>	<p>
                        <span class="contact-data-field"><?php _e("Fax", "site5framework"); ?>:</span>
                        <span class="contact-data-info"><?php echo of_get_option('webfolio_contact_fax'); ?></span>
                        </p>
                    <?php } ?>
            </div>



			</section>

<!-- end section -->

<?php //get_sidebar(); ?>

<?php get_footer(); ?>