<?php include('menu.php'); ?>
<section class="contact">
	<div class="container">
		<h2 class="text-center">Contact</h2>
		<div align="center" class="contact-detail">
		<div class="medium-container white-container">
  			<div>
  		
  				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.484731707712!2d72.88639711036014!3d19.086379482045775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c887efb78b9f%3A0x9f9dc99c3119470a!2sPhoenix%20Marketcity!5e0!3m2!1sen!2sin!4v1687063222050!5m2!1sen!2sin" 
  				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
  				</iframe>
  		
  			</div>
  	
  			<div>
  				<table>
		    	<tr><td><b>Address: </b></td><td>SK BookStore, Lal Bahadur Shastri Rd, Patelwadi.Kurla, Kamani, Kurla West, Kurla, Mumbai, Maharashtra 400070, India</td></tr>
		    	<tr><td><b>Hours of Operation: </b></td><td>11am-9pm</td></tr>
		    	<tr><td><b>Phone: </b></td><td>+91 9123456789</td></tr>
		    	<tr><td><b>Email: </b></td><td>info@skbookstore.com</td></tr>
				</table>
  			</div>  
		</div>
		</div>
	</div> 
	
	<div class="container">
	<div class="medium-container">
	<h3 class="text-center">Contact Form</h3>
    <form action="/action_page.php" class="contact-container">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="india">India</option>
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
  </div>
</div> 
</section>
<?php include('footer.php'); ?>
