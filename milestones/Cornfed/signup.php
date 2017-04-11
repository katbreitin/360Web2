<?php 
    include('includes/header.inc.php');
?>

						<form id="signup" class="group" name="signup" method="post" action="signupform_processing.php">
							<br/>
							<br/>
							<h2>Please fill out the form below!</h2>
							<br/>
							<span id="formerror" class="error"></span>
							
							<label>First Name*
							<input name="fname" type="text" class="required" id="fname" title="Please enter your first name" autofocus  required placeholder="First Name"/>
							</label>
							
							<label>Last Name*
							<input name="lname" type="text" class="required" id="lname" title="Please enter your last name" 
							required placeholder="Last Name"/>
							</label>
							
							<label>Email Address/ User ID*
							<input name="email" required type="email" class="required" id="email" title = "Please enter your email address" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Please enter your email address"/>
							</label>
							
							<label>Password*
							<input name="password" required type="password" class="required" id="password" title = "Please enter a password that contains six or more characters " pattern = ".{6,}" placeholder="Please enter a password that contains six or more characters "/>
							</label>
								
							<label>Phone Number*
							<input name="phone" required type="tel" class="required" id="tel" pattern="\d{3}[\-]\d{3}[\-]\d{4}" placeholder="xxx-xxx-xxxx"/>
							</label>
							
							<label>Date of Birth*
							<input name="dob" required type="date" class="required" id="dob" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" placeholder="YYYY-MM-DD"/>
							</label>
							
							<label>Work Status*
							<input name="workstatus" type="text" class="required" list="suggestions"/>
								<datalist id="suggestions">
									<option value = "Employed">
									<option value = "Student">
								</datalist>
							</label>
							
							<label>Company / Organization Name*
							<input name="company" type="text" class="required" id="company" title="Please enter the name of your company/ organization" autofocus  required placeholder="Company / Organization Name"/>
							</label>
							
							
							<input type="submit" value="submit"/>
							<br />
							</form>
							<script src="script.js"></script>






<?php 
    include('includes/nav.inc.php');
    include('includes/footer.inc.php');
?>