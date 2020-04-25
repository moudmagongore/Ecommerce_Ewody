 
// Get the image and insert it inside the modal - use its "alt" text as a caption
var selects=  document.querySelectorAll("#tailles");
var buttonPanierJs =  document.querySelectorAll("#buttonPanier");

 Array.from(selects).forEach((element) => {
            //on recupere element sur l'evenement change et on lui passe une function
            element.addEventListener('change', function () {
               console.log('element');
            });
        });

