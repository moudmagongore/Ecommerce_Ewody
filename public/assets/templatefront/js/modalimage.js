// Get the modal
var modal = document.getElementById("myModal");

/*document.querySelector     var sousImage = document.querySelectorAll('.sousImage');*/
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.querySelectorAll(".myImg");

var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.forEach((element) => element.addEventListener('click', afficheImage));

function afficheImage(e)
{
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}


// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}







/*img2.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}



// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}*/