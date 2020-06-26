@extends('templateclient.layouts.app', ['title' => 'A propos'])
	  <!-- About section -->
   <!--  <section class="about-section spad pt-0" style="margin-top: 10em; margin-bottom: 5em;">
       <div class="container">
           <div class="section-title text-center" style="margin-top: -5em; margin-bottom: 5em;">
               <h2>Bienvenue chez Ewody SARL</h2><br>
               
           </div>
           <div class="row">
               <div class="col-lg-6 about-text">
                   <h3>Solutions complètes de Ecommerce</h3> <br>
                   <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                   consequat? <br><br>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                   consequat. <br><br>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                   </p>
               </div>
   
               <div class="col-lg-6 pt-5 pt-lg-0">
                   <img src="{{ asset('assets/templatefront/images/about.jpg') }}" alt="">
               </div>
   
           </div>
       </div>
   </section> -->
    <!-- About section end-->

@section('content')



    <!-- About section -->
    <section class="about-section spad pt-0" style="margin-top: 6em; margin-bottom: 6em;">
        <div class="container">
            <div class="section-title text-center">
                <h3>BIENVENUE CHEZ EWODY SARL</h3>
                <p class="mt-4">Ewody est une entreprise d'e-commerce.</p>
            </div>
            <div class="row" style="margin-top: 7em;">
                <div class="col-lg-6 about-text">
                    <h4>A propos de nous</h4>
                    <p>Ewody est une entreprise de e-commerce qui vous permet en seul clics d’avoir accès aux produits et services du marché Guinéen partout, et a tout moment.</p>
                    <h4 class="pt-4">Nos services</h4>
                    <!-- <p>lorem.</p> -->
                    <ul class="about-list">
                        <li><i class="fa fa-check"></i> Nous fournissons des produits de qualité.</li>
                        <li><i class="fa fa-check"></i> Une prix raisonnable. </li>
                        <li><i class="fa fa-check"></i> Une livraison rapide.</li>
                        <li><i class="fa fa-check"></i> Et un paiement securisé.</li>
                    </ul>
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <img src="{{ asset('assets/templatefront/images/about.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- About section end-->



    <!-- Team section  -->
   <!--  <section class="team-section spad" style="margin-top: 7em; margin-bottom: 7em;">
       <div class="container">
           <div class="section-title text-center">
               <h3>OUR TEAM</h3>
               <p class="mt-4 mb-5">The professional standards and expectations</p>
           </div>
           <div class="row">
               <div class="col-md-6 col-lg-3">
                   <div class="member">
                       <div class="member-pic set-bg" data-setbg="img/member/1.jpg">
                           <img src="{{ asset('assets/templatefront/images/1.jpg') }}" class="member-pic set-bg">
                           <div class="member-social">
                               <a href=""><i class="fab fa-facebook"></i></a>
                               <a href=""><i class="fab fa-twitter"></i></a>
                               <a href=""><i class="fab fa-pinterest"></i></a>
                           </div>
                       </div>
                       <h5>Sasha Johnson</h5>
                       <p>Literature Teacher</p>
                   </div>
               </div>
               <div class="col-md-6 col-lg-3">
                   <div class="member">
                       <div class="member-pic set-bg" data-setbg="img/member/2.jpg">
                           <img src="{{ asset('assets/templatefront/images/2.jpg') }}" class="member-pic set-bg">
                           <div class="member-social">
                               <a href=""><i class="fab fa-facebook"></i></a>
                               <a href=""><i class="fab fa-twitter"></i></a>
                               <a href=""><i class="fab fa-pinterest"></i></a>
                           </div>
                       </div>
                       <h5>Darmian Shaw</h5>
                       <p>Physics Teacher</p>
                   </div>
               </div>
               <div class="col-md-6 col-lg-3">
                   <div class="member">
                       <div class="member-pic set-bg" data-setbg="img/member/3.jpg">
                           <img src="{{ asset('assets/templatefront/images/3.jpg') }}" class="member-pic set-bg">
                           <div class="member-social">
                               <a href=""><i class="fab fa-facebook"></i></a>
                               <a href=""><i class="fab fa-twitter"></i></a>
                               <a href=""><i class="fab fa-pinterest"></i></a>
                           </div>
                       </div>
                       <h5>Joshua Matt</h5>
                       <p>Matt Teacher</p>
                   </div>
               </div>
               <div class="col-md-6 col-lg-3">
                   <div class="member">
                       <div class="member-pic set-bg" data-setbg="img/member/4.jpg">
                           <img src="{{ asset('assets/templatefront/images/4.jpg') }}" class="member-pic set-bg">
                           <div class="member-social">
                               <a href=""><i class="fab fa-facebook"></i></a>
                               <a href=""><i class="fab fa-twitter"></i></a>
                               <a href=""><i class="fab fa-pinterest"></i></a>
                           </div>
                       </div>
                       <h5>Taylor Launer</h5>
                       <p>Music Teacher</p>
                   </div>
               </div>
           </div>
       </div>
   </section> -->
    <!-- Team section end -->

@endsection



<!-- Pour inclure les buttons en bas : home, favoris, compte ... -->
@section('buttonsEnBas')
     @include('templateclient.layouts.buttonsEnBas')
@stop