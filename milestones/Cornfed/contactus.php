<?php 
    include('includes/header.inc.php');
?>
						<form id="contact" class="group" name="contact" method="post" action="contactusformprocess.php">
							<br/>
							<br/>
							<h2>We would love to hear from you! </h2>
							<br/>
							<span id="formerror" class="error"></span>
							
							<label>First, Last Name*
							<input name="name" type="text" class="required" id="name" title="Please enter your first name" autofocus  required placeholder="First Last Name"/>
							</label>
							
							<label>Email Address*
    
							<input name="email" required type="email" class="required" id="email" title = "Please enter your email address" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Your Email address"/>
	
							</label>
								
							<label>Phone Number*
    
							<input name="phone" required type="tel" class="required" id="tel" pattern="\d{3}[\-]\d{3}[\-]\d{4}" placeholder="xxx-xxx-xxxx"/>
							</label>
							
							<label>Comments*
	
							<textarea name="comments" required type="text" class="required" id="comments" pattern="[a-zA-Z0-9]+" placeholder="Please add additional comments here..."></textarea>
							</label>
							<input type="submit" value="submit"/>
							<br />
							</form>
							<script src="script.js"></script>
<?php 
    include('includes/nav.inc.php');
    include('includes/footer.inc.php');
?>