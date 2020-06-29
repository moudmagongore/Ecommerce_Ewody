<div class="row">
    <div class="col-md-3">
        <div class="dropdown" style="margin-left: 5px;" id="partageResp">
            <a href="#" class="dropdown" style="margin-top: -5em; color: #00abc5; " data-toggle="dropdown" 
              aria-haspopup="true" aria-expanded="false" id="shareB">
                <i class="fas fa-share-alt" style="margin-right: 5px;"> </i></a>
            <ul class="dropdown-menu" aria-labelledby="shareB" style="padding:10px;">
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

    <div class="col-md-6" >
        
          <!--  <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.nowody.com%2Fdetails%2F1&layout=button_count&size=small&width=91&height=20&appId" width="91" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->
    </div>
</div>