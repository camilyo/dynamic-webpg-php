<?php include 'includes/config.php'?>
<?php get_header()?>
<?php
    
   if(isset($_POST['Name'])){//show data
       //data is submitted show it
       
    
       
$to      = 'de.o.santos@seattlecentral.edu';
$subject = 'Clean Contact Pages';
//$message = 'hello from ' . $_POST['Name'];
$message = process_post();

$replyTo = 'oliveira.br26@gmail.com';

$headers = 'From: noreply@camchr5.com' . PHP_EOL .
    'Reply-To: ' . $replyTo . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

    echo '<p>Thanks for contacting us!</p>
            <p><a href="">BACK</a></p>';
       
    
}else{//show form
    echo '
    <form action="" method="post" name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="Name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="Email" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div>	
		      <label>How Did You Hear About Us?:<br />
			     <select name="How_Did_You_Hear_About_Us?" required="required" title="How You Heard is required" tabindex="30">
                <option value="">Choose How You Heard</option>
				<option value="Store visit">Magazine</option>
				<option value="Other">Friend</option>
                </select>
		      </label>
	       </div>
           <div>	
		      <fieldset>
			     <legend>What Services Are You Interested In?</legend>
			     <input type="checkbox" name="Interested_In[]" value="Buying one of our daily coffee" tabindex="40" /> Buying one of our daily coffee <br />
			     <input type="checkbox" name="Interested_In[]" value="Getting info to open your store" /> Getting info to open your store <br />
			     <input type="checkbox" name="Interested_In[]" value="Had nothing to do and came here to check it out" /> Had nothing to do and came here to check it out <br />
			     <input type="checkbox" name="Interested_In[]" value="Other" /> Other <br />
		      </fieldset>
	       </div>
           <div>	
		      <fieldset>
                <legend>Would you like to join our mailing list?</legend>
                <input type="radio" name="Join_Mailing_List?" value="Yes" 
                required="required" title="Mailing list is required" tabindex="50"  
                /> Yes <br />
                <input type="radio" name="Join_Mailing_List?" value="No" /> No <br />
            </fieldset>
	       </div>
	       <div>	
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" name="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <br>
            <div id="success"></div>
            
            <div class="g-recaptcha" data-sitekey="6LdSVncUAAAAAI3Q-ZCroK2k8SH0Q3ZGz7ljfIrG"></div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>    
          </form> 
    ';
} 
?>

<?php 

get_footer();

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}


?>

