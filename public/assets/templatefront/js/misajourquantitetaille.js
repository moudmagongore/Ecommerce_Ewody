 //On recupere tout les select avec l'id
    var selects = document.querySelectorAll('#tailles');
//On recupere les selects dans un tableau puis on boucle avec element
    Array.from(selects).forEach((element) => {
       //on recupere element sur l'evenement change et on lui passe une function
        element.addEventListener('change', function () {
            var id  = this.getAttribute('data-id');
             var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(

                 `/updatequantitetaille/${id}`,
                 {
                        //Evoyer des en têtes pour dire c'est du json et on passe notre token.
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-with": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },

                        method: 'put',
                        body: JSON.stringify({
                            //sa nous permet d'apeler la valeur choisie
                            tailles: this.value
                            
                        })
                 }

            ).then((data) => {
                    //Pour revenir sur la page
                    location.reload();
                }).catch((error) => {
                    console.log(error);
                })
        });
    });
      