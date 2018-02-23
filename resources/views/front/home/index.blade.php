@extends('front.layout.master')
{!! Html::style('frontend/css/home.css') !!}
@section('content')

<!-- section-slider-area-start -->
<div class="section-slider-area pt-20">
    <div class="container">
        <!-- <div class="row">
        @include('notification')
            <h1> Slider</h1>
        </div> -->

        <section class="latest-blog-posts bg-white pt60 pb60 col-xs-12" style="padding-left: 0px !important; padding-right: 0px !important;margin-top: 20px; margin-bottom: -28px;">
            <div id="owl-slider-banner" class="owl-carousel owl-theme">
                @foreach($banners as $banner)
                <article class="thumbnail item" itemscope="" itemtype="" style="border-radius: 0px !important;margin: 0 0px !important;">
                    <a class="blog-thumb-img" href="{!! $banner->url !!}" title="">
                        <img src="{!! $banner->getCdnBannerImage(app('language')->language_code) !!}" alt="{!! $banner->alt !!}" class="img-responsive" />
                    </a>

                    <div class="slider-text hidden">
                        <a class="btn_view btn-voir-slide" href="{!! $banner->url !!}" class="btn_view">{{trans("common/label.watch")}}</a>
                    </div>
                    
                </article>
                @endforeach
            </div>

            
        </section>

    </div>
</div>
<!-- section-slider-area-end -->
<!-- section-categorie-area-start -->
<div class="section-categorie-area ptb-50">
    <div class="container">
            <div class="row">
                <?php $inc = 1; ?>
                @foreach($categories as $category)
                        @if($category->getByLanguage(app('language')->language_id))
                            <?php 
                                $class = "";
                                $class = ($inc%4 == 1) ? "clear-desktop" : ""; 
                                $class .= ($inc%2 == 1) ? " clear-responsive" : "";
                                $class .= ($inc%3 == 1) ? " clear-three-responsive" : "";
                                $image_name = $category->url->request_url.'.jpg';
                                $image_name_hover = $category->url->request_url.'-hover.jpg';
                            ?>
                            <div class="category-grid col-lg-3 col-sm-4 col-md-3 col-xs-6 {!! $class !!}">
                                <figure class="effect-romeo">   
                                    <a href="{!! url(LaravelLocalization::getCurrentLocale().'/search?q=&category='.$category->category_id) !!}">
                                        <img class="inactive" src="{!! $category->getCdnImagePath($image_name) !!}"></img>
                                        <img class="hover" src="{!! $category->getCdnImagePath($image_name_hover) !!}"></img>
                                        <figcaption>
                                            <h2>{!! $category->getByLanguage(app('language')->language_id)->category_name !!}</h2>
                                        </figcaption>     
                                    </a>
                                </figure>
                            </div>
                        <?php $inc++;?>
                        @endif
                @endforeach
            </div>
    </div>
</div>
<!-- section-categorie-area-end -->
<!-- home-product-area-start -->

<!-- home product start -->
<div class="section-product">
    <div class="container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">{{trans("common/label.trending")}}</a></li>
            <li><a data-toggle="tab" href="#menu1">{{trans("common/label.best_sale")}}</a></li>
            <li><a data-toggle="tab" href="#menu2">{{trans("common/label.top_rate")}}</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <!-- trending start -->
                @if(!empty($special_products['trending']) && count($special_products['trending'])>0)
                
                    @foreach($special_products['trending'] as $product)
                    <?php $product_translation=$product->getByLanguageId(app('language')->language_id);?>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <div class="img_btn">
                            <img class="img_prd" src="{!! URL::to('https://db-alternateeve-csi7douue.stackpathdns.com/upload/product/'.$product->images[0]->image_name) !!}" alt="{!! $product->images[0]->alt !!}">
                            <div class="middle">
                                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}" class="btn_view">{{trans("common/label.watch")}}</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-block"> 
                                <div class="row en-tete_content">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h4 class="card-title col-lg-12">
                                                {!! ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name !!}
                                            </h4>
                                            <div class="wishlist_prd_place">
                                            <?php 
                                                $wishlist_del = (in_array($product->product_id,all_product_id_wishlist())) ? 'coeur_pm' : '';
                                                if ($is_user_login) {   
                                                    $idU = \Auth::user()->user_id;
                                                }else{
                                                    $idU = '';
                                                }                                            
                                            ?>    
                                            <a class="wishlist_prd w{!! $product->product_id !!} {!! $wishlist_del !!}" onclick="addwishlist('{!! $product->product_id !!}','{!! $idU !!}');"> &nbsp; </a>
                                        </div>
                                        </div>                                       

                                </div>
                                
                                <p class="card-text">
                                    <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}">{!! $product_translation->product_name !!}</a>                                    
                                </p>
                                <p class="card-price">
                                    @if($product->original_price != $product->best_price)
                                        <span class="old-price">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                        <span class="old-price"><del> {!!$product->original_price !!} </del></span>
                                        <span class="new-price">{!! $product->best_price !!}</span>
                                    @else
                                        <span class="old-price">{!! format_price($product->original_price) !!}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                @endif
                <!-- trending end -->
            </div>
            <div id="menu1" class="tab-pane fade">

                <!-- meuilleur vente start -->
                    @if(!empty($special_products['trending']) && count($special_products['best_sale'])>0)
                
                    @foreach($special_products['best_sale'] as $product)
                    <?php $product_translation=$product->getByLanguageId(app('language')->language_id);?>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <div class="img_btn">
                            <img class="img_prd" src="{!! URL::to('https://db-alternateeve-csi7douue.stackpathdns.com/upload/product/'.$product->images[0]->image_name) !!}" alt="{!! $product->images[0]->alt !!}">
                            <div class="middle">
                                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}" class="btn_view">{{trans("common/label.watch")}}</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-block">
                                <div class="row en-tete_content">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 class="card-title">
                                            {!! ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name !!}
                                        </h4>
                                    </div>
                                    <div class="wishlist_prd_place">
                                        <?php 
                                                $wishlist_del = (in_array($product->product_id,all_product_id_wishlist())) ? 'coeur_pm' : '';
                                                if ($is_user_login) {   
                                                    $idU = \Auth::user()->user_id;
                                                }else{
                                                    $idU = '';
                                                }                                            
                                            ?>        
                                        <a class="wishlist_prd w{!! $product->product_id !!} {!! $wishlist_del !!}" onclick="addwishlist('{!! $product->product_id !!}','{!! $idU !!}');"> &nbsp; </a>
                                    </div>
                                </div>
                                
                                <p class="card-text">
                                    <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}">{!! $product_translation->product_name !!}</a>
                                </p>
                                <p class="card-price">
                                    @if($product->original_price != $product->best_price)
                                        <span class="old-price">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                        <span class="old-price"><del> {!!$product->original_price !!} </del></span>
                                        <span class="new-price">{!! $product->best_price !!}</span>
                                    @else
                                        <span class="old-price">{!! format_price($product->original_price) !!}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                @endif
                <!-- meuilleur vente end -->

            </div>
            <div id="menu2" class="tab-pane fade">

                <!-- plus consulté start -->
                    @if(!empty($special_products['trending']) && count($special_products['top_sale'])>0)
                
                    @foreach($special_products['top_sale'] as $product)
                    <?php $product_translation=$product->getByLanguageId(app('language')->language_id);?>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <div class="img_btn">
                            <img class="img_prd" src="{!! URL::to('https://db-alternateeve-csi7douue.stackpathdns.com/upload/product/'.$product->images[0]->image_name) !!}" alt="{!! $product->images[0]->alt !!}">
                            <div class="middle">
                                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}" class="btn_view">{{trans("common/label.watch")}}</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-block">                            

                                <div class="row en-tete_content">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 class="card-title">
                                            {!! ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name !!}
                                        </h4>
                                    </div>
                                    <div class="wishlist_prd_place">
                                        <?php 
                                                $wishlist_del = (in_array($product->product_id,all_product_id_wishlist())) ? 'coeur_pm' : '';
                                                if ($is_user_login) {   
                                                    $idU = \Auth::user()->user_id;
                                                }else{
                                                    $idU = '';
                                                }                                            
                                            ?>        
                                        <a class="wishlist_prd w{!! $product->product_id !!} {!! $wishlist_del !!}" onclick="addwishlist('{!! $product->product_id !!}','{!! $idU !!}');"> &nbsp; </a>
                                    </div>
                                </div>
                                <p class="card-text">
                                    <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}">{!! $product_translation->product_name !!}</a>
                                </p>
                                <p class="card-price">
                                    @if($product->original_price != $product->best_price)
                                        <span class="old-price">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                        <span class="old-price"><del> {!!$product->original_price !!} </del></span>
                                        <span class="new-price">{!! $product->best_price !!}</span>
                                    @else
                                        <span class="old-price">{!! format_price($product->original_price) !!}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                @endif
                <!-- plus consulté end -->

            </div>
        </div>

    </div>
</div>    
<!-- home product end -->
<!-- home-product-area-end -->  
<br><br><br>
<!-- service-area-2-start -->
<div class="service-area">
    @include('front.layout.service-area')           
</div>
<!-- service-area-2-end -->

<!-- latest-news-start -->
<!-- latest-news-end= -->

<div class="blog-section-home mb-30">
<div class="container">  
    @if(!empty($blog_posts))  
    <section class="latest-blog-posts bg-white pt60 pb60">
        <div class="container-fluid">
            <div class="page-header">
                <h3>{!! trans("common/label.latest_news")!!}</h3>
                <p>Actualité, mode, shopping, tutos.</p>
            </div>
            <div id="owl-blog" class="owl-carousel owl-theme">
                @foreach($blog_posts as $category)
                    @foreach($category->posts as $post)
                <article class="thumbnail item" itemscope="" itemtype="">
                    <a class="blog-thumb-img" href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$post->url->request_url) !!}" title="">
                        <img src="{!! $post->getCdnImagethumb() !!}" class="img-responsive blog-thumb-img-interne" alt="Blog" />
                    </a>
                    <div class="caption">
                        <h4 itemprop="headline">
                            <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$post->url->request_url) !!}" rel="bookmark">{!! $post->byLanguage(app('language')->language_id,'title') !!}</a>
                        </h4>
                        
                        <p itemprop="text" class="flex-text text-muted">{!! Jenssegers\Date\Date::parse($post->publish_date)->format('j F Y')!!}</p>
                    </div>
                </article>
                    @endforeach
                @endforeach
            </div>
            <!-- navigation blog -->
            <div class="customNavigation">
                <span class="pager-left">
                    <a class="next" data-toggle="tooltip">&nbsp;</a>
                </span>
                <span class="pager-right">
                    <a class="prev" data-toggle="tooltip">&nbsp;</a>
                </span>
            </div>

            <div class="blog-footer">
                 <a href="{!! url(LaravelLocalization::getCurrentLocale().'/blog-list') !!}" class="btn_view">{!! trans("common/label.read_article")!!}</a>
            </div>
        </div>
    </section>
    @endif
</div>
</div>
<!-- brand-area-start -->
<div class="brand-area ptb-50 mb-30">
    <div class="container">
        <div class="container-fluid">
            <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12 ml-4">
                <div class="brand-active owl-carousel owl-centered">
                    @foreach($brands as $brand)
                        @if(!empty($brand->brand_image) && file_exists(public_path().\App\Models\Brand::BRAND_IMAGE_PATH . $brand->brand_image))
                            <div class="col-lg-10" style="padding-left: 0px !important; padding-right: 0px !important;">
                                <div class="single-brand">
                                    <img class="lazyOwl" style="width: 140px;" data-src="{!! $brand->getImagePath() !!}" alt="{!! $brand->brand_name !!}"/>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- brand-area-end -->
<!-- the popup of localization -->
  @if(!Cookie::has('zip_code'))
        @include('front.modals.store-area.choose-area')
    @endif
    <!--  end of the popup of localization --> 
@stop