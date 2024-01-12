<?php include('menu.php'); ?>

<!-- Start of about Section -->
<section class="about">
 <div class="container">
 <div class="mini-container">
   <h2 class="text-center">Gallery</h2>
   <div class="slideshow-container">
   
  	<div class="mySlides">
    	<div class="numbertext">1 / 6</div>
    	<img src="../images/gallery/skbookstore_india.jpeg" height="300px" style="width:100%">
  	</div>

  	<div class="mySlides">
    	<div class="numbertext">2 / 6</div>
    	<img src="../images/gallery/skbookstore.jpeg" height="300px" style="width:100%">
  	</div>

  	<div class="mySlides">
    	<div class="numbertext">3 / 6</div>
    	<img src="../images/gallery/skbookstore_reading_area.png" height="300px" style="width:100%">
  	</div>
    
  	<div class="mySlides">
    	<div class="numbertext">4 / 6</div>
    	<img src="../images/gallery/skbookstore_kolkata.jpeg" height="300px" style="width:100%">
  	</div>

  	<div class="mySlides">
    	<div class="numbertext">5 / 6</div>
    	<img src="../images/gallery/skbookstore_australia.jpeg" height="300px" style="width:100%">
  	</div>
    
  	<div class="mySlides">
    	<div class="numbertext">6 / 6</div>
    	<img src="../images/gallery/skbookstore_usa.jpeg" height="300px" style="width:100%">
  	</div>
    
  	<a class="prev" onclick="plusSlides(-1)">❮</a>
  	<a class="next" onclick="plusSlides(1)">❯</a>

  	<div class="caption-container">
    	<p id="caption"></p>
  	</div>

  	<div class="row">
    	<div class="column">
      	<img class="demo cursor" src="../images/gallery/skbookstore_india.jpeg" height="50px"
      	style="width:100%" onclick="currentSlide(1)" alt="SK Bookstore's Entrance">
    	</div>
    	<div class="column">
      	<img class="demo cursor" src="../images/gallery/skbookstore.jpeg" height="50px"
      	style="width:100%" onclick="currentSlide(2)" alt="SK Bookstore in Canada">
    	</div>
    	<div class="column">
      	<img class="demo cursor" src="../images/gallery/skbookstore_reading_area.png" height="50px"
      	style="width:100%" onclick="currentSlide(3)" alt="SK Bookstore's Reading Area">
    	</div>
    	<div class="column">
      	<img class="demo cursor" src="../images/gallery/skbookstore_kolkata.jpeg" height="50px"
      	style="width:100%" onclick="currentSlide(4)" alt="SK Bookstore in India">
    	</div>
    	<div class="column">
      	<img class="demo cursor" src="../images/gallery/skbookstore_australia.jpeg" height="50px"
      	style="width:100%" onclick="currentSlide(5)" alt="SK Bookstore in Australia">
    	</div>    
    	<div class="column">
      	<img class="demo cursor" src="../images/gallery/skbookstore_usa.jpeg" height="50px"
      	style="width:100%" onclick="currentSlide(6)" alt="SK Bookstore in USA">
    	</div>
  	</div>
  </div>
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
</div>
</section>
<!-- End of about Section -->

<?php include('footer.php'); ?>
