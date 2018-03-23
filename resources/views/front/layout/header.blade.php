<header>
    <!-- Action changement langue -->
    {!! Form::open(array('url' =>'search' ,'method'=>'GET','id' =>'language_form','class'=>'language-convert')) !!}
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 hidden">

            <span class="input-group-btn">
                <button class="btn btn-link" id="language" value="{!! (app('language')->language_code == 'fr') ? 'en' : 'fr' !!}" type="button">{!! (app('language')->language_code == 'fr') ? 'EN' : 'FR' !!}</button>
            </span>
        </div>
    {{-- {!! Form::select('language', ['en' => 'English', 'fr' => 'French'],(app('language')) ? app('language')->language_code : null,['class'=>'form-control required','id'=>'language']) !!} --}}
    {!! Form::close() !!}
    <!-- Fin action -->
<!-- Debut code header -->

<div class="header-top-area">  
    <div class="container" id="header-height">
        <div class="row" style="line-height: 1.9;">
            <a href="#" class="find-your-shop">
                <span class="icon-shop"></span>Retrouver nos boutiques
            </a>   
        </div>
    </div>
</div>

<div class="all-header">
    
    <div class="mean-menu-area" style="margin-bottom: -21px;">
        <div class="container ptb-20">
            <div class="row mt-20" style="line-height: 3.5;">

                <!-- header-search-end -->
                <!-- logo-start -->
                <div class="container content-logo">
                    <div class="logo text-center">
                        <a href="{!! URL::to('/') !!}">
                            <img src="{!! URL::to('/') !!}/images/logo.svg" alt="logo clickee"/>
                        </a>
                    </div>
                </div>
                <!-- logo-end -->
               
                <!-- mini-cart-end -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-right menu-icon-right">
                    <!-- header-top-right-start -->
                    <div class="header-account text-right col-lg-12 col-md-12 col-sm-12 col-xs-12 mean-menu">
                        <ul>
                            <li class="dropdown espace-header">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="icon icon-search"></span>   
                                </a>
                            </li>
                            <li class="dropdown espace-header">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="icon icon-user"></span>   
                                </a>
                            </li>
                            <li class="dropdown espace-header">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="icon icon-heart"></span>   
                                </a>
                            </li>
                            <li class="dropdown espace-header">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                    <?php 
                                        $class = ($cart_count > 0) ? "icon-panier-not-empty" : "icon-panier";
                                    ?>
                                    <span class="icon {!! $class !!}"></span>   
                                </a>
                                <?php
                                    $nombre = ($cart_count < 10) ? '0'.$cart_count : $cart_count;
                                ?>
                                <span class="sell_pannier">{!! ($nombre == '00') ? "" : $nombre; !!}</span>
                                @include('front.layout.cart-recent')
                            </li>
                        </ul>
                    </div>
                    <!-- header-top-right-end -->
                </div>
            
            </div>
        </div>


        <!-- header-mid-area-end -->
        <!-- mean-menu-area-start -->
        <div class="navbar navbar-default navbar-static-top ptb-10">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown menu-large"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>FEMME</span></a>

                    <ul class="menu-femme dropdown-menu megamenu row">
                        <li class="container ptb-10">
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Toute la collection
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Nouveautés
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Vêtements
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Sport
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Chaussures
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Accessoires
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown menu-large"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span> HOMME</span></a>

                    <ul class="menu-homme dropdown-menu megamenu row">
                        <li class="container ptb-10">
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Toute la collection
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Nouveautés
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Vêtements
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Sport
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Chaussures
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Accessoires
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown menu-large"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>ENFANT</span></a>

                    <ul class="menu-enfant dropdown-menu megamenu row">
                        <li class="container ptb-10">
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Toute la collection
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Nouveautés
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Vêtements
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Sport
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Chaussures
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Accessoires
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown menu-large">    
                    <a href="# " class="dropdown-toggle " data-toggle="dropdown "><span>BEAUTÉ/SANTÉ</span> </a>    
                    <ul class="menu-beaute dropdown-menu megamenu row ">
                        <li class="container ptb-10">
                            
                        </li>
                    </ul>
                </li>
                <li class="dropdown menu-large"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>ÉPICERIE FINE</span> </a>

                    <ul class="menu-epicerie dropdown-menu megamenu row">
                        <li class="container ptb-10">
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Nouveautés
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Vins
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Produits du terroir
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Snacking
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Accessoires
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-2"> 
                                <a href="#">
                                    Cadeaux
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown menu-large">    
                    <a href="# " class="dropdown-toggle " data-toggle="dropdown "><span>INTÉRIEUR</span></a>   
                    <ul class="menu-interieur dropdown-menu megamenu row ">
                        <li class="container ptb-10">
                            
                        </li>
                    </ul>
                </li>
                <li class="dropdown menu-large">    
                    <a href="# " class="dropdown-toggle " data-toggle="dropdown "><span>LOISIR</span></a>  
                    <ul class="menu-loisir dropdown-menu megamenu row ">
                        <li class="container ptb-10">
                            
                        </li>
                    </ul>
                </li>
                <li class="dropdown menu-large">    
                    <a href="# " class="dropdown-toggle " data-toggle="dropdown "><span>IDÉES CADEAUX</span></a>   
                    <ul class="menu-cadeaux dropdown-menu megamenu row ">
                        <li class="container ptb-10">
                            
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- menu area end -->
</div>
    </div>
<!-- Fin code header -->
</div>

</header>
