<!doctype html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Administration E-Wody</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

 <!--  Pour le chargement du button -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  End Pour le chargement du button -->
<!-- favicon
============================================ -->
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<!-- Google Fonts
============================================ -->
<link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
<!-- Bootstrap CSS
============================================ -->
<link rel="stylesheet" href="{{ asset('assets/newtemplate/css/bootstrap.min.css')}}">
<!-- Bootstrap CSS
============================================ -->
<link rel="stylesheet" href="{{ asset('assets/newtemplate/css/font-awesome.min.css')}}">
<!-- owl.carousel CSS
============================================ -->
<link rel="stylesheet" href="{{ asset('assets/newtemplate/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/owl.theme.css')}}">
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/owl.transitions.css')}}">
<!-- animate CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/animate.css')}}">
<!-- normalize CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/normalize.css')}}">
<!-- meanmenu icon CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/meanmenu.min.css')}}">
<!-- main CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/main.css')}}">
<!-- morrisjs CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/morrisjs/morris.css')}}">
<!-- mCustomScrollbar CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
<!-- metisMenu CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/metisMenu/metisMenu.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/metisMenu/metisMenu-vertical.css')}}">
<!-- calendar CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/calendar/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/calendar/fullcalendar.print.min.css')}}">
<!-- modals CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/modals.css')}}">
<!-- style CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/style.css')}}">
<!-- responsive CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/responsive.css')}}">
<!-- modernizr JS
============================================ -->
<script src="{{asset('assets/newtemplate/js/vendor/modernizr-2.8.3.min.js')}}"></script>


<link rel="stylesheet" href="{{asset('assets/newtemplate/css/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/newtemplate/css/chosen/bootstrap-chosen.css')}}">

<style>
.form-details .row {
margin-top: 10px;
}

        #error
        {
            color: red;
            font-weight: bold;
            /* font-style: italic; */
        }
</style>

</head>

<body>

<div class="left-sidebar-pro">
<nav id="sidebar" class="">
<div class="sidebar-header">
<a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
<strong><img src="img/logo/logosn.png" alt="" /></strong>
</div>
<div class="left-custom-menu-adp-wrap comment-scrollbar">
<nav class="sidebar-nav left-sidebar-menu-pro">
<ul class="metismenu" id="menu1">
    <li class="">
        <a class="has-arrow" href="{{ route('accueil.back') }}">
                <i class="fa big-icon fa-home icon-wrap"></i>
                <span class="mini-click-non">E-Wody</span>
            </a>
        <ul class="submenu-angle" aria-expanded="true">
            <li><a title="Admin" href="{{ route('accueil.back') }}"><i class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Admin</span></a></li>
            <li><a title="Site" href="{{route('acceuil')}}"><i class="fa fa-circle-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Site</span></a></li>
        </ul>
    </li>

    @can('voir-page-admin-vendeur')
    
    <li><a title="Privillege" href="{{route('listcategorie')}}"><i class="fa fa-tags sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Catégorie</span></a>
    </li>
    

    <li>
        <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-product-hunt icon-wrap"></i> <span class="mini-click-non">Produit</span></a>
        <ul class="submenu-angle" aria-expanded="false">
            <li><a title="Produit" href="{{route('listproduit')}}"><i class="fa fa-list-ol sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Liste produits</span></a></li>
            <li><a title="Ajouter produit" href="{{route('ajoutproduit')}}"><i class="fa fa-plus-circle sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Ajout Produit</span></a></li>
            <li><a title="categorie" href="{{route('addimage')}}"><i class="fa fa-wrench sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Configuration produit</span></a></li>
        </ul>
    </li>
    @endcan
        
        @can('voir-page-admin')
            <li><a title="Privillege" href="{{route('list-coupon')}}"><i class="fa fa-tags sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Coupons</span></a></li>
        @endcan

    @can('voir-page-admin-vendeur')
    <li>
        <a class="has-arrow"  aria-expanded="false"><i class="fa big-icon fa-shopping-cart icon-wrap"></i>
         <span class="mini-click-non">
         Commandes
        </span></a>
        <span class="notify">
               
        {{App\models\Commande::where('statut', 'En cours')->get()->count()}}
   
        </span>
        <ul class="submenu-angle" aria-expanded="false">
            <li><a title="Commande" href="{{route('listcommande')}}"><i class="fa fa-map-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Liste des commandes</span></a></li>
        </ul>
    </li>
    @endcan


    
        
        
   

    @can('voir-page-admin-vendeur')
    <li>
        <a class="has-arrow"  aria-expanded="false"><i class="fa big-icon fa-check-circle icon-wrap"></i> <span class="mini-click-non">Livraison</span></a>
        <ul class="submenu-angle" aria-expanded="false">
            <li><a title="Liste" href="{{route('listlivraison')}}"><i class="fa fa-th sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Liste des livraison</span></a></li>
        </ul>
    </li>
    @endcan


    @can('voir-page-admin')
    <li>
        <a class="has-arrow"  aria-expanded="false"><i class="fa big-icon fa-users icon-wrap"></i> <span class="mini-click-non">Clients</span></a>
        <ul class="submenu-angle" aria-expanded="false">
            <li><a title="Recent" href="#"><i class="fa fa-folder sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Clients récents</span></a></li>
            <li><a title="Liste des clients" href="{{route('listclient')}}"><i class="fa fa-square sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Liste clients</span></a></li>
        </ul>
    </li>
    @endcan

    @can('voir-page-admin')
    <li>
        <a class="has-arrow"  aria-expanded="false"><i class="fa big-icon fa-adn icon-wrap"></i> <span class="mini-click-non">Administration</span></a>
        <ul class="submenu-angle" aria-expanded="false">
            <li><a title="Utilisateurs" href="{{route('listuser')}}"><i class="fa fa-user sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Utilisateur</span></a></li>
            <li><a title="Fournisseur" href="{{route('listfournisseur')}}"><i class="fa fa-rocket sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Fournisseur</span></a></li>
            
        </ul>
    </li>
    @endcan
    
    @can('voir-page-admin-vendeur')
    <li><a title="Landing Page" href="{{ route('acceuil') }}" aria-expanded="false"><i class="fa fa-times-circle icon-wrap big-icon" aria-hidden="true"></i> <span class="mini-click-non">Quitter</span></a>
    </li>
    @endcan
</ul>
</nav>
</div>
</nav>
</div>

<!-- Start Welcome logo -->
<div class="all-content-wrapper">
<div class="container-fluid">
<div class="row">
   <!--  col-lg-12 col-md-12 col-sm-12 col-xs-12 -->
<div class="">
<div class="logo-pro">
    <a href="{{ route('accueil.back') }}"><img class="main-logo" src="{{ asset('assets/templatefront/images/logo.png')}}" alt="" /></a>
</div>
</div>
</div>
</div>
<div class="header-advance-area">
<div class="header-top-area">
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="header-top-wraper">
            <div class="row">
                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                    <div class="menu-switcher-pro">
                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                    
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="header-right-info">
                        <ul class="nav navbar-nav mai-top-nav header-right-menu" style="margin-right:15px;">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-envelope-o adminpro-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                    <div class="message-single-top">
                                        <h1>Message</h1>
                                    </div>
                                    <ul class="message-menu">
                                        <li>
                                            <a href="#">
                                                <div class="message-img">
                                                    <img src="img/contact/1.jpg" alt="">
                                                </div>
                                                <div class="message-content">
                                                    <span class="message-date">16 Sept</span>
                                                    <h2>Advanda Cro</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <div class="message-view">
                                        <a href="#">View All Messages</a>
                                    </div>
                                </div>
                            </li>


                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                    <div class="notification-single-top">
                                        <h1>Notifications</h1>
                                    </div>
                                    <ul class="notification-menu">
                                        <li>
                                            <a href="#">
                                                <div class="notification-icon">
                                                    <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                </div>
                                                <div class="notification-content">
                                                    <span class="notification-date">16 Sept</span>
                                                    <h2>Advanda Cro</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <div class="notification-view">
                                        <a href="#">View All Notification</a>
                                    </div>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                        <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                        <span class="admin-name">{{ Auth::user()->name }} </span>
                                        <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                    </a>
                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                    <li><a href="register.html"><span class="fa fa-home author-log-ic"></span>S'inscrire</a>
                                    </li>
                                    <li><a href="#"><span class="fa fa-user author-log-ic"></span>Mon Profile</a>
                                    </li>
                                    <li><a href="lock.html"><span class="fa fa-diamond author-log-ic"></span> Vérouiller</a>
                                    </li>
                                    <li><a href="#"><span class="fa fa-cog author-log-ic"></span>Paramètre</a>
                                    </li>
                                    <li><a href="{{ route('deconnexion') }}"><span class="fa fa-lock author-log-ic"></span>Déconnexion</a>
                                    </li>
                                </ul>
                            </li>

                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



























<!-- Mobile Menu start -->
<div class="mobile-menu-area">
<div class="container">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="mobile-menu">
            <nav id="dropdown">
                <ul class="metismenu" id="menu1">
                    <li class="">
                        <a class="has-arrow" href="{{ route('accueil.back') }}">
                                <i class="fa big-icon fa-home icon-wrap"></i>
                                <span class="mini-click-non">E-Wody</span>
                            </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Admin" href="{{ route('accueil.back') }}"><i class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Admin</span></a></li>
                            <li><a title="Site" href="{{route('acceuil')}}"><i class="fa fa-circle-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Site</span></a></li>
                        </ul>
                    </li>

                    @can('voir-page-admin-vendeur')
                    
                    <li><a title="Privillege" href="{{route('listcategorie')}}"><i class="fa fa-tags sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Catégorie</span></a>
                    </li>
                    

                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-product-hunt icon-wrap"></i> <span class="mini-click-non">Produit</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Produit" href="{{route('listproduit')}}"><i class="fa fa-list-ol sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Liste produits</span></a></li>
                            <li><a title="Ajouter produit" href="{{route('ajoutproduit')}}"><i class="fa fa-plus-circle sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Ajout Produit</span></a></li>
                            <li><a title="categorie" href="{{route('addimage')}}"><i class="fa fa-wrench sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Configuration produit</span></a></li>
                        </ul>
                    </li>
                    @endcan
                        
                        @can('voir-page-admin')
                            <li><a title="Privillege" href="{{route('list-coupon')}}"><i class="fa fa-tags sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Coupons</span></a></li>
                        @endcan

                    @can('voir-page-admin-vendeur')
                    <li>
                        <a class="has-arrow"  aria-expanded="false"><i class="fa big-icon fa-shopping-cart icon-wrap"></i>
                         <span class="mini-click-non">
                         Commandes
                        </span></a>
                        <span class="notify" id="notifResp">
                               
                        {{App\models\Commande::where('statut', 'En cours')->get()->count()}}
                   
                        </span>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Commande" href="{{route('listcommande')}}"><i class="fa fa-map-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Liste des commandes</span></a></li>
                        </ul>
                    </li>
                    @endcan


                    
                        
                        
                   

                    @can('voir-page-admin-vendeur')
                    <li>
                        <a class="has-arrow"  aria-expanded="false"><i class="fa big-icon fa-check-circle icon-wrap"></i> <span class="mini-click-non">Livraison</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Liste" href="{{route('listlivraison')}}"><i class="fa fa-th sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Liste des livraison</span></a></li>
                        </ul>
                    </li>
                    @endcan


                    @can('voir-page-admin')
                    <li>
                        <a class="has-arrow"  aria-expanded="false"><i class="fa big-icon fa-users icon-wrap"></i> <span class="mini-click-non">Clients</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Recent" href="#"><i class="fa fa-folder sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Clients récents</span></a></li>
                            <li><a title="Liste des clients" href="{{route('listclient')}}"><i class="fa fa-square sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Liste clients</span></a></li>
                        </ul>
                    </li>
                    @endcan

                    @can('voir-page-admin')
                    <li>
                        <a class="has-arrow"  aria-expanded="false"><i class="fa big-icon fa-adn icon-wrap"></i> <span class="mini-click-non">Administration</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Utilisateurs" href="{{route('listuser')}}"><i class="fa fa-user sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Utilisateur</span></a></li>
                            <li><a title="Fournisseur" href="{{route('listfournisseur')}}"><i class="fa fa-rocket sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Fournisseur</span></a></li>
                            
                        </ul>
                    </li>
                    @endcan
                    
                    @can('voir-page-admin-vendeur')
                    <li><a title="Landing Page" href="{{ route('acceuil') }}" aria-expanded="false"><i class="fa fa-times-circle icon-wrap big-icon" aria-hidden="true"></i> <span class="mini-click-non">Quitter</span></a>
                    </li>
                    @endcan
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>
</div>
<!-- Mobile Menu end -->
<div class="breadcome-area">
<div class="container-fluid">

</div>
</div>
</div>

<main style="">
@yield('content')


<script src="//code.jquery.com/jquery.js"></script>
@include('flashy::message')

</main>

<div class="footer-copyright-area">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
    <div class="footer-copy-right">
        <p>Copyright &copy; 2020 <a href="https:www.nowody.com" target="_blanck">EWODY SARL -</a> Tous droits réservés</p>
    </div>
</div>
</div>
</div>
</div>
</div>

<!-- jquery
============================================ -->
<script src="{{ asset('assets/newtemplate/js/vendor/jquery-1.11.3.min.js')}}"></script>
<!-- bootstrap JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/bootstrap.min.js')}}"></script>
<!-- wow JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/wow.min.js')}}"></script>

<script src="{{ asset('assets/newtemplate/js/input-mask/jasny-bootstrap.min.js')}}"></script>

<script src="{{ asset('assets/newtemplate/js/select2/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/newtemplate/js/select2/select2-active.js')}}"></script>
<!-- price-slider JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/jquery-price-slider.js')}}"></script>
<!-- meanmenu JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/jquery.meanmenu.js')}}"></script>
<!-- owl.carousel JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/owl.carousel.min.js')}}"></script>
<!-- sticky JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/jquery.sticky.js')}}"></script>
<!-- scrollUp JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/jquery.scrollUp.min.js')}}"></script>
<!-- mCustomScrollbar JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('assets/newtemplate/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
<!-- metisMenu JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/metisMenu/metisMenu.min.js')}}"></script>
<script src="{{ asset('assets/newtemplate/js/metisMenu/metisMenu-active.js')}}"></script>
<!-- morrisjs JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/morrisjs/raphael-min.js')}}"></script>
<script src="{{ asset('assets/newtemplate/js/morrisjs/morris.js')}}"></script>
<script src="{{ asset('assets/newtemplate/js/morrisjs/morris-active.js')}}"></script>
<!-- morrisjs JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('assets/newtemplate/js/sparkline/jquery.charts-sparkline.js')}}"></script>
<!-- calendar JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/calendar/moment.min.js')}}"></script>
<script src="{{ asset('assets/newtemplate/js/calendar/fullcalendar.min.js')}}"></script>
<script src="{{ asset('assets/newtemplate/js/calendar/fullcalendar-active.js')}}"></script>
<!-- plugins JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/plugins.js')}}"></script>

<script src="{{ asset('assets/newtemplate/js/chosen/chosen.jquery.js')}}"></script>
<script src="{{ asset('assets/newtemplate/js/chosen/chosen-active.js')}}"></script>
<!-- main JS
============================================ -->
<script src="{{ asset('assets/newtemplate/js/main.js')}}"></script>

@yield('select')

</body>

</html>