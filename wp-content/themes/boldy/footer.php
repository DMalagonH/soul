 <script type="text/javascript">
    jQuery(document).ready(function($){
	$('form#quickContactForm').submit(function() {
		$('.errormsg').remove();
		var hasError = false;
		$('.requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
				$(this).parent().before('<p class="errormsg">Please enter your name, a message and a valid email address.</p>');
				hasError = true;
			} else if($(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim($(this).val()))) {
					var labelText = $(this).prev('label').text();
					$(this).parent().before('<p class="errormsg">Please enter your name, a message and a valid email address.</p>');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			$('form#quickContactForm .button').fadeOut('normal', function() {

			});
			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				$('form#quickContactForm').slideUp("fast", function() {
					$(this).before('<p class="successmsg">Your email has been sent! Thank you!</p>');
				});
			});
            return true;
		}
        else {
		return false;
        }
	});
});
 </script>

  <?php  if(isset($_POST['submitted'])) {
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
			$msg .= "User IP : ".$_SERVER["REMOTE_ADDR"]."\r\n"; //Sender's IP
			$msg .= "Browser Info : ".$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
			$msg .= "User Come From : ".$_SERVER["HTTP_REFERER"]; //Referrer

			$emailTo = ''.of_get_option('boldy_contact_email').'';
			$subject = 'Contact Form Submission from '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments \n\n $msg";
			$headers = 'From: '.of_get_option('name').' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

			if(mail($emailTo, $subject, $body, $headers)) $emailSent = true;

	}

}?>

 </div>
		   <!-- END CONTENT -->
	</div>
    <!-- END WRAPPER -->

	<!-- BEGIN FOOTER -->
	<footer>
	<?php if(of_get_option('boldy_footer_actions')!="no") {?>
		<div style="width:960px; margin: 0 auto; position:relative;">
			<a href="#" id="showHide" <?php if(of_get_option('boldy_actions_hide')=="hidden"){echo 'style="background-position:0 -16px"';}?>>Show/Hide Footer Actions</a>
		</div>

		<div id="footerActions" <?php if(of_get_option('boldy_actions_hide')=="hidden"){echo 'style="display:none"';}?>>
			<div id="footerActionsInner">
			<?php if(of_get_option('boldy_twitter_user')!="" && of_get_option('boldy_latest_tweet')!="no"){ ?>
				<div id="twitter">
					<a href="http://twitter.com/<?php echo of_get_option('boldy_twitter_user'); ?>" class="action">Follow Us!</a>
					<div id="latest">
						<div id="tweet">
							<div id="twitter_update_list"></div>
						</div>
						<div id="tweetBottom"></div>
					</div>
				</div>
				<?php } ?>
				<script src="http://twitter.com/javascripts/blogger.js" type="text/javascript"></script>
				<script src="http://api.twitter.com/1/statuses/user_timeline.json?screen_name=<?php echo of_get_option('boldy_twitter_user'); ?>&amp;include_rts=1&amp;callback=twitterCallback2&amp;count=<?php  if(of_get_option('boldy_number_tweets')!=""){ echo of_get_option('boldy_number_tweets'); }else{ echo "1"; } ?>" type="text/javascript"></script>
				<div id="quickContact">
				<?php if(isset($emailSent) && $emailSent == true) { ?>
					<p id="success" class="successmsg"><?php _e("Your email has been sent! Thank you!", "site5framework"); ?></p>
				    <?php } else { ?>
                    <?php
                        if(!isset($hasError) and isset($emailSent)) {
                    ?>
                        <div class="errors">
                        <p id="badserver" class="errormsg"><?php _e("Your email failed. Try again later.", "site5framework"); ?></p>
                    <?php } elseif(isset($hasError) and !isset($emailSent)) { ?>
						<p id="bademail" class="errormsg" ><?php _e("Please enter your name, a message and a valid email address.", "site5framework"); ?></p>
                        </div>
					<?php } ?>
					<form id="quickContactForm" action="" method="POST">
					<div class="leftSide">
						<input type="text" value="<?php _e("your name", "site5framework"); ?>" id="quickName" name="contactName" class="requiredField" />
						<input type="text" value="<?php _e("your email", "site5framework"); ?>" id="quickEmail" name="email" class="requiredField email" />
						<input type="submit" name="submitted" id="submitinput" value="<?php _e("Send", "site5framework"); ?>"/>
					</div>
					<div class="rightSide">
						<textarea id="quickComment" name="comments" class="requiredField" ><?php _e("your message", "site5framework"); ?></textarea>
				</div>
					</form>
                    <?php } ?>
				</div>
			</div>
		</div>
		<?php }?>
		<div id="footerWidgets">
			<div id="footerWidgetsInner">
				<!-- BEGIN FOOTER WIDGET -->
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-1' ); ?>
                <?php endif; ?>
				<!-- END FOOTER WIDGETS -->
				<!-- BEGIN COPYRIGHT -->
				<div id="copyright">
                    <div id="owners">
					<?php if (of_get_option('boldy_footer_copyright') <> ""){
						echo stripslashes(stripslashes(of_get_option('boldy_footer_copyright')));
						}else{
							_e("Just go to Theme Options Page and edit copyright text.", "site5framework");
						}?>
                    </div>
                    <div id="site5bottom">Created by <a href="http://www.s5themes.com/">Site5 WordPress Themes</a>. Experts in <a href="http://gk.site5.com/t/542">WordPress Hosting</a>.</div>
				</div>
				<!-- END COPYRIGHT -->
				</div>

		</div>
	</footer>
	<!-- END FOOTER -->
</div>
<!-- END MAINWRAPPER -->
<?php wp_footer(); ?>
</body>
</html>


