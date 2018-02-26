@extends('front.layout.master')
    {!! Html::style('frontend/css/home.css') !!}
    {!! Html::style('frontend/css/style.css') !!}
    {!! Html::style('frontend/css/responsive.css') !!}
    {!! Html::style('css/style_custom.css') !!}
@section('content')


<!-- start section slider -->
<section class="section-slider">
    <div id="home-top-slide" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($banners as $banner)
            <div class="item {!! ($loop->first) ? 'active' : '' !!}">
                <img src="{!! URL::to('/').\App\Models\Banner::Banner_IMAGE_PATH.'SLIDER.png' !!}" alt="{!! $banner->alt !!}" class="img-responsive" />
                
                <div class="container container-slider">
                    <div class="carousel-caption">
                        <div class="slider-title">
                            <h1>ON A</h1>
                            <h1>DU NEUF</h1>
                        </div>
                        <button type="button" class="btn btn-default btn-slider">SHOPPER</button>
                    </div>
                </div>
            </div>
       @endforeach
    </div>
    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
</section>
<!-- end section slider -->

<!-- start section three blocs -->
<section class="section-three-bloc pt-40">
    <div class="container">
        <div class="section-three-bloc-content">
            <div class="row">
                <div class="col-lg-7 section-instagramm-feed-align">
                    <a href="#">
                        <img class="section-three-bloc-align" src="{!! URL::to('/') !!}/images/VOYAGE.png" alt="Nouvelles destinations"/>
                    </a>
                </div>
                <div class="col-lg-5 section-instagramm-feed-align">
                    <a href="#">
                        <img class="pb-14" src="{!! URL::to('/') !!}/images/IDEES_CADEAUX.jpg" alt="Nouveautés cadeaux destinations"/>
                    </a>
                    <a href="#"">
                        <img src="{!! URL::to('/') !!}/images/IDEES_CADEAUX.jpg" alt="Tendances décos"/>
                    </a>
                </div>    
            </div>
        </div>    
    </div>
</section>    
<!-- end section three blocs -->

<!-- start section top product  -->
<section class="section-top-product">
    <div class="container">
        <ul class="nav nav-tabs" id="productTab" role="tablist">
            <li class="active">
                <a class="nav-title" id="coup_de_coeur-tab" data-toggle="tab" href="#coup_de_coeur" role="tab" aria-controls="coup_de_coeur" aria-selected="true">COUP DE COEUR</a>
            </li>
            <li class="">
                <a class="nav-title" id="meilleur_vente-tab" data-toggle="tab" href="#meilleur_vente" role="tab" aria-controls="meilleur_vente" aria-selected="false">MEILLEURES VENTES</a>
            </li>
            <li class="">
                <a class="nav-title" id="mieux_note-tab" data-toggle="tab" href="#mieux_note" role="tab" aria-controls="mieux_note" aria-selected="false">MIEUX NOTÉS</a>
            </li>
        </ul>
        <div class="tab-content" id="productTabContent">
            <div class="tab-pane fade in active" id="coup_de_coeur" role="tabpanel" aria-labelledby="coup_de_coeur-tab">
                <div class="related-product-container">
                    @if(!empty($special_products['best_sale']) && count($special_products['best_sale'])>0)
                    <div class="related-products-area ptb-30">
                        <div class="related-products-active">
                
                            @foreach($special_products['best_sale'] as $product)
                            <?php $product_translation=$product->getByLanguageId(app('language')->language_id);?>
                            
                            <div class="col-lg-12">
                                <!-- single-product-start -->
                                <div class="product-wrapper">
                                    <div class="product-img-connexe product-pic">
                                        <a href="{!! $product->url->target_url !!}">
                                            <img src="{!! url($product->getDefaultCdnImagesPath()) !!}" alt="{!! $product_translation->product_name !!}"
                                                 class=""/>
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <span>{!! 
                                                (isset($product->brand)) ? ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name : "&nbsp;" !!}
                                                </span>
                                            </div>
                                        </div>

                                        <h4><a href="{!! $product->url->target_url !!}">{!! $product_translation->product_name !!}</a></h4>
                                        @if($product->original_price != $product->best_price)
                                            <span class="old-price">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                            <span class="old-price"><del>{!! format_price($product->original_price) !!}</del></span>
                                            <span class="new-price">{!! format_price($product->best_price) !!}</span>
                                        @else
                                            <span class="old-price">{!! format_price($product->original_price) !!}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- single product end -->
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
            <div class="tab-pane fade" id="meilleur_vente" role="tabpanel" aria-labelledby="meilleur_vente-tab">
                test...
            </div>
            <div class="tab-pane fade" id="mieux_note" role="tabpanel" aria-labelledby="mieux_note-tab">
                ..test.
            </div>
        </div>
    </div>  
</section>
<!-- end section top product -->

<!-- start section two bloc -->
<section class="section-two-bloc">
    <div class="container">
        <div class="section-two-bloc-content">
            <div class="row">
                <div class="col-lg-6 section-instagramm-feed-align">
                    <div class="section-two-bloc-left">
                        
                    </div>    
                </div>
                <div class="col-lg-6 section-instagramm-feed-align">
                    <div class="section-two-bloc-right">
                        
                    </div>
                </div>
            </div>
        </div>    
    </div>
</section>
<!-- end section two bloc -->

<!-- start section instagramm feed -->
<section class="section-instagramm-feed">
    <div class="container">
        <div class="section-instagramm-feed-title title title-active">
            <h2>INSTAGRAM FEED</h2>
        </div>
        <div class="section-instagramm-feed-content">
            <div class="row">
            <?php for ($i = 1; $i <= 8; $i++) { ?>
                <div class="col-lg-3 section-instagramm-feed-align">
                    <img src="{!! URL::to('/') !!}/images/instagram{!! $i !!}.svg" alt="instagramm feed clickee"/>
                </div>    
            <?php } ?>
            </div>
        </div>
    </div>
</section>    
<!-- end section instagramm feed -->

<!-- start section marque -->
<section class="section-marque ptb-40">
    <div class="brand-area">
        <div class="container">
            <div class="brand-active owl-carousel owl-centered">
                @foreach($brands as $brand)
                    @if(!empty($brand->brand_image) && file_exists(public_path().\App\Models\Brand::BRAND_IMAGE_PATH . $brand->brand_image))
                        <div class="col-lg-12">
                            <div class="single-brand">
                                <img class="lazyOwl" data-src="{!! $brand->getImagePath() !!}" alt="{!! $brand->brand_name !!}"/>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end section marque -->

<!-- start section avantage -->
<section class="section-avantage ptb-15"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-avantage-content border-vert-clair">
                    <div class="col-lg-3 mt-15">
                        <span class="avantage avantage-paiement"></span>
                    </div>
                    <div class="col-lg-9 mt-10">
                        <h4 class="fs-15">PAIEMENT 100% SÉCURISÉ</h4>
                        <span class="fs-13">Passez l’ensemble de vos commandes en toute sécurité.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-avantage-content border-vert-clair">
                    <div class="col-lg-3 mt-15">
                        <span class="avantage avantage-economie"></span>
                    </div>
                    <div class="col-lg-9 mt-10">
                        <h4 class="fs-15">SOUTENEZ L’ÉCONOMIE LOCALE</h4>
                        <span class="fs-13">Encouragez votre communauté en achetant dans votre quartier</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-avantage-content border-vert-clair">
                    <div class="col-lg-3 mt-15">
                        <span class="avantage avantage-temps"></span>
                    </div>
                    <div class="col-lg-9 mt-10">
                        <h4 class="fs-15">GAGNEZ DU TEMPS</h4>
                        <span class="fs-13">En un click allez réserver vos articles préférés et récupérez-les en boutique.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section avantage -->
@stop