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

<div class="header-top-area">
    <div class="container-fluid top-header">
        <div class="row">
        </div>
    </div>    
    <div class="container" id="header-height">
        <div class="row" style="line-height: 1.6;">
            <a href="#" class="find-your-shop">
                <i class="fa fa-square-o"></i> Retrouver nos boutiques
            </a>   
        </div>
    </div>
</div>

<div class="all-header">

    <div class="mean-menu-area ptb-30">
        <div class="container-fluid">
            <div class="row">

                <!-- header-search-end -->
                <!-- logo-start -->
                <div class="col-md-12 content-logo">
                    <div class="logo text-center">
                            <a href="{!! URL::to('/') !!}" class="col-xs-12"><img src="{!! URL::to('/') !!}/images/logo.svg" alt="logo"/></a>
                    </div>
                </div>
                <!-- logo-end -->
                
                <!-- mini-cart-end -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">

                        <!-- debut wishlist article connexion -->
                            <!-- header-top-left-start -->
                            <div class="header-account text-right">
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
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="icon icon-panier"></span>   
                                        </a>
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
