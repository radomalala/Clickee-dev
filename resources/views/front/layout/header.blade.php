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
<!-- Debut code header Andry -->
<div class="header-info alert alert-danger fade in alert-dismissable text-center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>{!! trans('common/label.header_info_msg_1') !!}</strong> {!! trans('common/label.header_info_msg_2') !!}<a href="{!! url('contact-us') !!}">{!! trans('common/label.header_msg_link') !!}</a>
</div>

<div class="header-top-area">
    <div class="container" id="header-height">
        <div class="row" style="padding: 5px 0px 0px 0px !important;">
            <!-- header-top-left-start -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 header-top-area-left">
                @if(Cookie::has('zip_code') && Cookie::has('distance'))
                    <p class="area" style="color: #212B52; font-size: 15px;"> {!! trans('product.shopping_area') !!} : <strong>{!! Cookie::get('distance') !!} KM </strong> {!! trans('product.around') !!} <strong> {!! Cookie::get('zip_code') !!}</strong></p> 
                @endif
            </div>
            <!-- header-top-left-end -->
            <!-- header-top-right-start -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 header-top-area-right">
                <div class="text-right">
                    <ul>
                        <a href="#" id="change-location" style="color: #212B52; font-size: 15px;"><img style="max-width: 12px;" src="{!! URL::to('/') !!}/images/marker.svg" alt="change location"/>&nbsp;&nbsp;{!! trans('product.change_location') !!}</a>  
                    </ul>
                </div>
            </div>
            <!-- header-top-right-end -->   
        </div>
    </div>
</div>

<div class="all-header">

    <div class="mean-menu-area ptb-30">
        <div class="container-fluid">
            <div class="row">

                <!-- header-search-end -->
                <!-- logo-start -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="logo text-center home-page-logo">
                            <a href="{!! URL::to('/') !!}" class="col-xs-12 col-sm-10"><img src="{!! URL::to('/') !!}/images/logo.svg" alt="logo"/></a>
                    </div>
                </div>
                <!-- logo-end -->
                
                <!-- mini-cart-end -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">

                        <!-- debut wishlist article connexion -->
                            <!-- header-top-left-start -->
                            <div class="header-account text-right">
                                <ul>
                                    <li>
                                        <a href="#" onclick="$('#language').trigger('click');">
                                                <span class="language-code">{!! (app('language')->language_code == 'fr') ? 'EN' : 'FR' !!}</span>
                                        </a>
                                    </li>
                                    <?php 
                                        /*SI connecté afficher nom prenom*/
                                        /*$name = ($is_user_login) ? Auth::user()->first_name .' '. Auth::user()->last_name : trans('common/label.connexionLabel') */ 
                                    ?> 

                                    <li class="dropdown espace-header">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <img style="max-width: 85%;" src="{!! url('/') !!}/images/petit_homme_blanc_header.svg" alt="user icon" />
                                        </a>
                                        <?php

                                            $dropdown_c = (app('language')->language_code == 'en') ? "c-pos-en" : "c-pos-fr";
                                            $dropdown_m = (app('language')->language_code == 'en') ? "m-pos-en" : "m-pos-fr";

                                            $dropdown = (!$is_user_login || Auth::user()->role_id==1) ? $dropdown_c : $dropdown_m ;
                                        ?>
                                        <ul class="dropdown-menu {!! $dropdown !!}">
                                            @if(!$is_user_login || Auth::user()->role_id==1)
                                                <!-- Pour les customers -->
                                                <li><a class="dropdown-menu-border" href="{!! url(LaravelLocalization::getCurrentLocale().'/customer') !!}">{!! trans('common/label.your_account') !!}</a></li>
                                                <li><a class="dropdown-menu-border" href="{!! url(LaravelLocalization::getCurrentLocale().'/customer/request') !!}">{!! trans('common/label.your_orders') !!}</a></li>
                                                @if($is_user_login)
                                                    <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}">{!! trans('common/label.sign_out')!!}</a></li>
                                                @else
                                                    <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/login') !!}">{!! trans('common/label.sign_in') !!}</a></li>
                                                @endif
                                            @else
                                                <!-- Pour les merchants -->
                                                <li><a class="dropdown-menu-border" href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant') !!}">{!! trans('common/label.shop_account') !!}</a></li>
                                                <li><a class="dropdown-menu-border" href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant/request') !!}">{!! trans('common/label.order_request') !!}</a></li>
                                                <li><a class="dropdown-menu-border" href="{!! url(LaravelLocalization::getCurrentLocale().'/merchant') !!}">{!! trans('common/label.finance') !!}</a></li>
                                                @if($is_user_login)
                                                    <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}">{!! trans('common/label.sign_out')!!}</a></li>
                                                @else
                                                    <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/login') !!}">{!! trans('common/label.sign_in') !!}</a></li>
                                                @endif
                                            @endif
                                        </ul>
                                    </li>

                                    <li class="espace-header-wishlist">
                                        <?php
                                            $wishlist_count = count_wishlist();
                                            if($wishlist_count>0)
                                                $nbr = ($wishlist_count < 10) ? '0'.$wishlist_count : $wishlist_count;
                                            else
                                                $nbr = "";
                                        ?>    
                                        @if($wishlist_count>0)
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/wishlist') !!}" title="Wishlist">
                                                <span class="sell_coeur">{!! $nbr !!}</span>
                                                <img style="max-width: 65%;" src="{!! url('/') !!}/images/coeur_orange_pleine.svg" alt="whishlist icon" />
                                            </a>
                                        @else
                                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/wishlist') !!}" title="Wishlist">
                                                <span class="sell_coeur"></span>
                                                <img class="img_wishlist" style="max-width: 65%;" src="{!! url('/') !!}/images/coeur_blanc.svg" alt="whishlist icon" />
                                            </a>
                                        @endif
                                        
                                    </li>

                                    <li class="espace-header-cart">
                                        @include('front.layout.cart-recent')
                                    </li>

                                </ul>
                            </div>
                            <!-- header-top-right-end -->
                    <!-- fin wishlist article connexion -->


                    <!-- Debut recherche -->
                  <!--   {!! Form::open(array('url' => 'search','method' => 'GET','id' => 'form-search')) !!}
                        <div class="input-group my-group pull-right"> 

                            {!! Form::select('category-search', (app('language')->language_id == 1) ? $categories_search['en'] : $categories_search['fr'], null, ['class' => "selectpicker form-control select_width", 'id' => 'selected-category', 'data-live-search' => 'true' ]) !!}

                            {!! Form::text('q', null, ['placeholder' => trans("common/label.your_search"), "class" => "form-control input_width", "id" => "search-input"]) !!}

                            <span class="input-group-btn">
                                <button class="btn btn-default-search" style="margin-left: -3px;z-index: 0;" type="submit">
                                    <i class="pe-7s-search"></i>
                                </button>
                            </span>
                        </div>
                    {!! Form::close() !!}   -->
                    <!-- Fin recherche -->
                    
                </div>
            
            </div>
        </div>


        <!-- header-mid-area-end -->
        <!-- mean-menu-area-start -->
        <div class="mean-menu-area hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mean-menu text-center">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{!! url(LaravelLocalization::getCurrentLocale().'/') !!}">{!! trans('common/label.home') !!}</a>
                                    </li>
                                    <li>
                                        <a href="{!! url(LaravelLocalization::getCurrentLocale()."/search")."?q=" !!}">{!! trans('common/label.catalogue') !!}</a>
                                    </li>
                                    <li>
                                        <a href="{!! url(LaravelLocalization::getCurrentLocale().'/ask-product') !!}">{!! trans('common/label.ask_a_product') !!}</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{!! trans('common/label.your_merchants') !!}</a>
                                        <ul class="dropdown-menu-menu">
                                            <li class="dropdown-menu-border">
                                                <a class="dropdown-menu-align" href="{!! url(LaravelLocalization::getCurrentLocale().'/blog-list') !!}"> {!! trans('common/label.blog') !!} </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-menu-align" href="{!! url(LaravelLocalization::getCurrentLocale().'/fondation') !!}">{!! trans('common/label.foundation') !!}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area-start -->
        <div class="mobile-menu-area hidden-md hidden-lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul id="nav">
                                    <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/') !!}">{!! trans('common/label.home') !!}</a>

                                    </li>
                                    <li><a href="{!! url(LaravelLocalization::getCurrentLocale()."/search")."?q=" !!}">{!! trans('common/label.catalogue') !!}</a>

                                    </li>
                                    <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/ask-product') !!}">{!! trans('common/label.ask_a_product') !!}</a>

                                    </li>
                                    <li class="static"><a href="{!! url(LaravelLocalization::getCurrentLocale().'/blog-list') !!}">{!! trans('common/label.blog') !!}</a>

                                    </li>
                                    <li><a href="{!! url(LaravelLocalization::getCurrentLocale().'/fondation') !!}">{!! trans('common/label.foundation') !!}</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area-end -->
    </div>
<!-- Fin code header -->
</div>

</header>
