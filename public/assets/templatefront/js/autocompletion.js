/* <!-- Ville -->*/

    var input = document.getElementById("myinputVille");
    var awesomplete = new Awesomplete(input, {
        list: ["Mamou", "Pita", "Dalaba", "Boke", "Siguiri", "Kankan", "N'zérékoré", "Conakry", "Coyah", "Labe"],
        //nombre de caractere a tapez avant la suggetion des list
        minChars : 2
        //pour selectionner le premier element automatiqment
        /*autoFirst : true*/
    });
    setTimeout(function(){}, 3000);

   /* <!-- End ville -->*/


   


  /*<!-- Quartier -->*/

    var input = document.getElementById("myinputQuartier");
    var awesomplete = new Awesomplete(input, {
        list: ["Sirage", "Bambeto", "Cosa", "Hamdalaye", "Belle vue", "Bomboly", "Sonfonia", "Cité", "Dixin"],
        //nombre de caractere a tapez avant la suggetion des list
        minChars : 2

    });
    setTimeout(function(){}, 3000);

    /*<!-- End quartier -->*/





  /*<!-- Lieu proche -->*/

    var input = document.getElementById("myinputLieu");
    var awesomplete = new Awesomplete(input, {
        list: ["Camp carefour", "Mosquée turk de Bambeto", "Mosquée kabalaya de hamdallaye", "Sonfonia gare"],
        //nombre de caractere a tapez avant la suggetion des list
        minChars : 2

    });
    setTimeout(function(){}, 3000);

    /*<!-- End Lieu proche -->*/



    
    
   /* <!-- Email -->*/

    var inputEmail = document.getElementById("myinputEmail");
    var awesomplete = new Awesomplete(inputEmail, {
        list: ["aol.com", "att.net", "comcast.net", "facebook.com", "gmail.com", "gmx.com", "googlemail.com", "google.com", "hotmail.com", "hotmail.co.uk", "mac.com", "me.com", "mail.com", "msn.com", "live.com", "sbcglobal.net", "verizon.net", "yahoo.com", "yahoo.co.uk"],
        data: function (text, input) {
            return input.slice(0, input.indexOf("@")) + "@" + text;
        },
        filter: Awesomplete.FILTER_STARTSWITH
    });

/* <!-- End Email -->*/

