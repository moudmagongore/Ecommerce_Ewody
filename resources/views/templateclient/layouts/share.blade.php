<div class="row">
    <div class="col-md-3">
        <div class="dropdown" style="margin-left: 5px;" id="partageResp">
            <a href="#" class="dropdown" style="margin-top: -5em; color: #00abc5; " data-toggle="dropdown" 
              aria-haspopup="true" aria-expanded="false" id="shareB">
                <i class="fas fa-share-alt" style="margin-right: 5px;"> </i></a>
            <ul class="social-buttons dropdown-menu" aria-labelledby="shareB" style="padding:10px;">
                <li class="dropdown-item"> 
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank">Facebook</a>
                </li>

                <li class="dropdown-item">
                 <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}" target="_blank">Twitter</a>
                </li>

                <li class="dropdown-item">
                 <a href="https://plus.google.com/share?url={{ urlencode($url) }}" target="_blank">Google+</a>
                </li>
                
                
            </ul>


            <a href="{{ route('favoris.store', $produits->id) }}" >
                <i class="fas fa-heart" style="color: #00abc5;"></i>
              
             </a>
        </div> 
    </div>

</div>



<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons  a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>