var slideIndex = 0;

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2500);
}



document.getElementById("toggle").addEventListener("click",function () {
  var file = document.getElementById('theme');
  var vnimg=document.getElementById('vnimg');
  var mv=document.getElementById('mv');
  
    if (document.getElementById("toggle").checked) {
      file.href = "dark.css";
      localStorage.setItem('dark','enabled');
      mv.src="mv-dark.png";
      vnimg.src="vn-dark.png";
    } else {
      file.href = "light.css";
      localStorage.setItem('dark',null);
      mv.src="mv.png";
      vnimg.src="vn.png";
    }
  });
  
  if(localStorage.getItem('dark')==='enabled')
  {
    document.getElementById("toggle").checked=true;
    document.getElementById('theme').href = "dark.css";
    document.getElementById('vnimg').src="vn-dark.png";
    document.getElementById('mv').src="mv-dark.png";
  }







