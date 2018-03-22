@extends('front.layout.master')
@section('additional-css')
    {!! Html::style('frontend/css/product.css') !!}
    {!! Html::style('frontend/css/style.css') !!}
    {!! Html::style('frontend/css/responsive.css') !!}
    {!! Html::style('css/style_custom.css') !!}
@stop   
@section('content')
    <?php
        $product_translation = $product->getByLanguageId(app('language')->language_id);
    ?>
    <div class="product-area">
        
        <div class="col-lg-12">
            @include('notification')
        </div>
        <div class="container">
            <div class="col-lg-12 category-parent-product ptb-30">
                @foreach($categories as $category)
                    <a href="{!! url(LaravelLocalization::getCurrentLocale().'/search?q=&category='.$category->category_id) !!}" >{!! $category->getByLanguage(app('language')->language_id)->category_name !!}</a>&nbsp;&nbsp;<i class="fa fa-chevron-right" style="font-size: 11px;"></i>&nbsp;&nbsp;
                @endforeach
                <span>{!! $product->brand->brand_name !!} - {!! $product_translation->product_name !!}</span>
            </div>
        </div>
        <div class="category-link"><p id="category-parent" data-latest-category=""></p></div>
        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
        <div class="container">
            <div class="row">
                <div class="product-big-image col-xs-12 col-sm-12 col-lg-8 col-md-12">
                    {{--<div class="icon-sale-label sale-left">Sale</div>--}}
                    {{--<div class="large-image"> <a data-toggle="modal" data-target="#mymodal" data-placement="top" title="Quick View"  href="#" > <img class="main-image" src="{!! url($product->getDefaultCdnImagesPath()) !!}" alt="products"> </a> </div>--}}
                       {{-- <div class="buttons">
                            <span class="zoom-in"><i class="fa fa-plus" aria-hidden="true"></i>
                            </span>
                            <span class="zoom-out"><i class="fa fa-minus" aria-hidden="true"></i>
                            </span>
                            <span class="reset"><i class="fa fa-refresh" aria-hidden="true"></i></span>
                        </div>--}}
                     <div class="row">
                        <div class="image-thumb hidden">
                            <div class="flexslider flexslider-thumb">
                                <ul class="previews-list slides">
                                    @foreach($product->images as $product_image)
                                    <li class="{!! (count($product->images)==2)?'fixed-width':'' !!}">
                                        <a class="thumb-image" href='{!! $product->getCdnImagesPath($product_image) !!}'>
                                            <img class="{!! ($loop->first) ? 'active' : '' !!}" data-image="{!! url($product->getCdnImagesPath($product_image)) !!}" src="{!! url($product->thumbCdn($product_image)) !!}" alt = "{!! $product_image->alt !!}" title="{!! $product_image->title !!}"/>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <section id="auto-contain" class="col-lg-9 col-md-9">
                            <div class="parent" style="overflow: hidden !important;">
                                <div class="panzoom" id="image_main">
                                    <!-- <img id="image_main" class="main-image" src="{!! url($product->getDefaultCdnImagesPath()) !!}" alt="{!! $product_translation->product_name !!}" data-zoom-image="{!! url($product->getDefaultCdnImagesPath()) !!}" width="600" height="500"> -->
                                    <img class="main-image" src="{!! url($product->getDefaultCdnImagesPath()) !!}" alt="{!! $product_translation->product_name !!}" data-zoom-image="{!! url($product->getDefaultCdnImagesPath()) !!}" width="600" height="500">
                                </div>
                            </div>
                            <!-- <div class="buttons">
                                <span class="zoom-in"><i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
                                <span class="zoom-out"><i class="fa fa-minus" aria-hidden="true"></i>
                                </span>
                                 <span class="reset"><i class="fa fa-refresh" aria-hidden="true"></i></span>
                               
                            </div> -->
                                <a class="hidden" id="full-screen" data-toggle="modal" data-target="#mymodal" data-placement="top" title="Quick View"  href="#" >Click For Full Screen</a>
                        </section>
                </div>
                    
                <div class="modal-area">
                    <!-- single-modal-start -->
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img class="main-image" src="{!! $product->getDefaultCdnImagesPath() !!}" alt="products">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: more-images -->

            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 contain-product-info">
                <div class="product-info">
                    {!! Form::open(['url' => Url(LaravelLocalization::getCurrentLocale()."/cart/add"), 'class' => '','id' =>'product_form']) !!}
                    <div style="width:35%;" class="mb-30 mr-l-20">
                        <img src="{!! ($product->brand->parent_id==null) ? $product->brand->getCdnImagePath() : $product->brand->parent->getCdnImagePath() !!}">
                    </div>
                    <h2 class="mr-l-15">{!! $product_translation->product_name !!}</h2>
                    <div class="col-lg-12 price">
                        @if($product->original_price != $product->best_price)
                                            <span class="new-price fs-25">{!! format_price($product->best_price) !!}</span>
                                             <span class="old-price fs-25">&nbsp;<del>{!! format_price($product->original_price) !!}</del></span>
                                            <span class="old-price percentage ml-10 fs-25">{!! getRebate($product->best_price,$product->original_price) !!} OFF</span>
                                        @else
                                            <span class="price-exact fs-25">{!! format_price($product->original_price) !!}</span>
                                        @endif
                    </div>
                </div>
                <div class="review-total mt-60 ml-15 ptb-10">   
                        <div class="stars_review" style="overflow: show !important;">
                            @for($i=1;$i<=$average_rating;$i++)
                                <a title="1" class="star fullStar"></a>
                            @endfor
                            @for($i=5;$i>=$average_rating;$i--)
                                <a title="1" class="star"></a>
                            @endfor
                            <span style="font-size: 15px;">&nbsp;&nbsp;{!! (count($reviews) > 0) ? "(".count($reviews). " avis)" : "" !!}</span>
                        </div>
                </div>
                <!-- start attribute -->
                <div class="row">
                    <div class="col-lg-12 pb-10 pt-0 p-lr-0 vcenter mt-0 mr-l-20">
                        @foreach($attribute_value as $attribute)
                            <div class="color-box">
                                <label class="color-label" style="color: #42838C; ">{!! $attribute['name'] !!} : </label> 
                            </div>
                            <div class="color-box">

                                @if($attribute['type']==1)
                                    <div class="color"> 
                                        <ul class="color-attribute"> 
                                            <?php $selected_color = ''; ?>
                                            @foreach($attribute['options'] as $index=>$options)
                                                @if(in_array($options->attribute_option_id,$attribute_option_id))
                                                    <?php
                                                    $product_attribute_option = $product->getProductAttributeOption($options->attribute_option_id);
                                                    $selected_color =  ($selected_color=='' && $index==0)? $product_attribute_option->product_attribute_option_id:$selected_color;
                                                    ?>
                                                    <li class="{!! ($index==0)?'active':'' !!}">
                                                        {!! Html::image($options->swatch(), $options->getByLanguageid(app('language')->language_id)->option_name,
                                                        array( 'class' => "size16 attr-element",'id' => "brd",
                                                        'title' => $options->getByLanguageid(app('language')->language_id)->option_name,
                                                        'data-product_attribute_option_id'=>$product_attribute_option->product_attribute_option_id,
                                                        'data-attribute_id'=>$options->attribute_id
                                                        )) !!}
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <input type="hidden" name="attrs[]" value="{!! $selected_color !!}" id="color_attribute_id">
                                @endif
                                @if($attribute['type']==2)
                                    <?php
                                        $class = (isset($attr_options[$attribute['id']]) && count($attr_options[$attribute['id']])>1) ? "" : "attribute-select-box" ?>
                                    
                                            <select name="attrs[]" data-placeholder="Choose an option…"
                                                    class="col-md-11  {!! $class !!} product-input-select" tabindex="1" style="color: #42838C!important">
                                                @foreach($attribute['options'] as $options)
                                                    @if(in_array($options->attribute_option_id,$attribute_option_id))
                                                        <?php
                                                        $product_attribute_option = $product->getProductAttributeOption($options->attribute_option_id);
                                                        ?>
                                                        <option value="{!! $product_attribute_option->product_attribute_option_id !!}">{!! $options->getByLanguageid(app('language')->language_id)->option_name !!}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        
                                @endif
                            </div>
                        @endforeach
                             
                    </div>
                    <!-- end attribute -->

                    </div>
                    <div class="clear"></div>
                        <div class="col-md-7 ">
                            <input type="hidden" name="qty" value="1" readonly>
                            <input type="hidden" name="product_id" value="{!! $product->product_id !!}" readonly>
                            <input type="hidden" name="radius" id="radius" value="" readonly>
                            <input type="hidden" name="postal_code" id="postal_code" value="" readonly>
                        </div>
                    <!-- <div class="quantity row">
                         <label for="quantity" class="ml-15 col-lg-3">{!! trans('product.quantity'); !!}</label>
                         <input type="text" class="form-control-product-input col-lg-2" id="qty" name="qty" value="1">
                    </div> -->
                    <!-- start other information -->
                    <div class="other-information">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                            <!-- a href="javascript://" class="btn btn-block btn-primary btn-lg" id="buy_locally">{!! trans('product.buy_it_locally_txt')." (".getPrice($product->best_price).")" !!}</a -->

                            <div class="buying-area hide" id="buying_area">
                                {!! Form::hidden('product_id',$product->product_id, ['class' => 'form-control ','id'=>'product-id','placeholder'=>""]) !!}
                                <?php $radius_data = getRadiusData() ?>
                                <label>{!! trans('product.choose_buying_area') !!}</label>
                                <div class="input-group text-center availibily-section">
                                          <select name="requested_distance" class="form-control" id="distance">
                                              @foreach($radius_data as $index=>$radius)
                                                  <option value="{!! $index !!}">{!! $radius !!}</option>
                                              @endforeach
                                          </select>
                                    <span class="input-group-addon">{!! trans('product.around') !!}</span>
                                    <input type="text" name="zip_code" class="required form-control-product" id="zip_code" value="" placeholder="{!! trans('product.postal_code') !!}">
                                </div>
                                <a href="#" class="btn btn-sm btn-default" id="check-product">{!! trans('product.check_retailer_availability') !!}</a>
                            </div>

                            <!-- div class="buying-lable" id="buying_label">
                                <span>{!! trans('product.buy_it_below') !!}</span><br>
                                <span>{!! trans('product.on_internet') !!}</span>
                            </div -->

                            <div class="row add-cart mb-20" id="add-cart">
                                <!-- <p> {!! trans('product.product_available_with_selected_area') !!}</p> -->
                                <button type="submit" class="btn btn-clickee-info col-md-8 col-xs-8 col-sm-8 col-lg-8" id="add-to-cart">{!! trans("product.add_to_cart")!!}</button>

                                <?php 
                                        $wishlist_del = (in_array($product->product_id,all_product_id_wishlist())) ? 'coeur_gm' : '';
                                        if ($is_user_login) {   
                                            $idU = \Auth::user()->user_id;
                                        }else{
                                            $idU = '';
                                        }                                            
                                    ?>    

                                <a id="add-to-wishlist" class="wishlist_prd_index col-md-3 col-xs-3 col-sm-3 col-lg-3 wG{!! $product->product_id !!} {!! $wishlist_del !!}" onclick="addwishlist('{!! $product->product_id !!}','{!! $idU !!}');"></a>
                            </div>
                            <div class="share-social-network">
                                <a class="share share-to-facebook"></a>
                                <a class="share share-to-twitter"></a>
                                <a class="share share-to-google"></a>
                            </div>

                            <div class="product-not-avail hide" id="product-not-avail">
                                <p> {!! trans('product.product_not_available_with_selected_area') !!}</p>
                                <p>{!! trans('product.buy_with_ecommerce') !!}</p>
                            </div>
                            
                            <!-- <a href="javascript://" class="btn btn-block btn-primary btn-lg" id="see_best_price">{!! trans('product.see_best_prices') !!}</a> -->
                        </div>
                    </div>
                    <!-- end other information -->

                    @if(count($affiliate_products)>0)
                     <?php
                        $total_products = round(count($affiliate_products)/2);
                        ?>
                    <div class="col-sm-12 affiliate-container mr-t-10 mr-b-10 hide">
                        <div class="col-sm-6 affiliate-section">
                        @foreach($affiliate_products as $index=>$affiliate_product)
                            @if($index<$total_products)
                                <div class="col-sm-4 product-row">
                                    <?php
                                    $img_src = null;
                                    $epartner_repo = App::make(\App\Repositories\EpartnerRepository::class);
                                    $epartner = $epartner_repo->getByName($affiliate_product->advertiser_name);
                                    if(!empty($epartner)){
                                        $img_src = \App\Models\EpartnerMedia::IMAGE_PATH.'/'.$epartner->image;
                                    }
                                    ?>
                                    <div class="col-xs-4 no-padding">
                                    @if($img_src!=null)
                                        <div class="product-image">
                                        <img class="" src="{!! url($img_src) !!}">
                                        </div>
                                    @endif
                                    </div>
                                    <div class="col-xs-4 no-padding text-center product-price">
                                        <span class="">
                                            {!!  format_price($affiliate_product->price) !!}
                                        </span>
                                    </div>
                                        <div class="col-xs-4 no-padding">
                                    <span class="affiliate-product-link pull-right">
                                        <a target="_blank" class="btn btn-default default-btn" href="{!! $affiliate_product->product_url !!}">{!! trans('product.see_it') !!}</a>
                                    </span>
                                        </div>
                                </div>
                            @endif
                        @endforeach
                        </div>

                        <div class="col-sm-6 affiliate-section">
                            @foreach($affiliate_products as $index=>$affiliate_product)
                                @if($index>=$total_products)
                                    <div class="col-sm-4 product-row">
                                        <?php
                                        $img_src = null;
                                        $epartner_repo = App::make(\App\Repositories\EpartnerRepository::class);
                                        $epartner = $epartner_repo->getByName($affiliate_product->advertiser_name);
                                        if(!empty($epartner)){
                                            $img_src = \App\Models\EpartnerMedia::IMAGE_PATH.'/'.$epartner->image;
                                        }
                                        ?>
                                        <div class="col-xs-4 no-padding">
                                            @if($img_src!=null)
                                                <div class="product-image">
                                                <img class="" src="{!! url($img_src) !!}">
                                                    </div>
                                            @endif
                                        </div>
                                        <div class="col-xs-4 no-padding text-center product-price">
                                        <span class="">
                                            {!!  format_price($affiliate_product->price) !!}
                                        </span>
                                        </div>
                                        <div class="col-xs-4 no-padding">
                                    <span class="affiliate-product-link pull-right">
                                        <a target="_blank" class="btn btn-default default-btn" href="{!! $affiliate_product->product_url !!}">{!! trans('product.see_it') !!}</a>
                                    </span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        <div class="col-sm-4 price-alert">
                            <div class="col-xs-4 no-padding">
                                <span><i class="fa fa-bell-o" style="color: #59b210; margin-right: 10px" aria-hidden="true"></i><a href="#"> {!! trans('product.lowest_price_alert') !!}</a></span>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- </div> -->

        <div class="product-overview-tab">
            <div class="container" >
                <div class="row" >
                    <div class="col-xs-12" id="tab-container">
                        <div class="product-tab-inner">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li class="active"><a href="#description"
                                                      data-toggle="tab" class="description-toggle">{!!
                                        trans("product.description")!!} </a></li>
                                <li><a href="#reviews" data-toggle="tab" class="review-toggle">{!!
                                        trans("product.reviews")!!}</a></li>
                                @if(count($product->video)>1)        
                                <li><a href="#video-press" data-toggle="tab" class="video-toggle">{!!
                                        trans("product.video-press")!!}</a></li>
                                @endif        
                            </ul>
                            
                            <div id="productTabContent" class="tab-content height-content">
                                <div class="tab-pane fade in active product_description" id="description">
                                    <div class="std more">
                                        {!! $product_translation->description !!}
                                    </div>
                                    <div class="product-tabs-content-inner clearfix">
                                        @foreach($attribute_value as $attribute)
                                            <?php
                                            $attribute_option['option_name'] = [];
                                            ?>
                                            @foreach($attribute['options'] as $options)
                                                @if(in_array($options->attribute_option_id,$attribute_option_id))
                                                    <?php
                                                    $attribute_option['attribute_name'] = $attribute['name'];
                                                    $attribute_option['option_name'][] = $options->getByLanguageid(app('language')->language_id)->option_name;
                                                    ?>
                                                @endif
                                            @endforeach

                                            @if(!empty($attribute_option) && count($attribute_option)>0)

                                                <p>
                                                    <span><b>{!! $attribute_option['attribute_name'] !!}</b>
                                                                    :</span> {!! implode(',',$attribute_option['option_name']) !!}
                                                </p>
                                            @endif

                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="video-press">
                                    <div class="std">
                                        <div class="product-tabs-content-inner clearfix">
                                            
                                            <div class="content-video">
                                            @foreach($product->video as $video)
                                                @if(videoType($video->video_url)=='youtube')
                                                <div class="col-md-12 mr-b-17 youtube-video">
                                                    <p><strong>{!! $video->video_title !!}</strong></p>
                                                    <?php $video_key = parse_youtube($video->video_url);?>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                      <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/{!! $video_key !!}"></iframe>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach                               
                                            @foreach($product->video as $video)
                                                @if(videoType($video->video_url)!='youtube')      
                                                <div class="col-md-12 center">
                                                    <div class="press-title">
                                                        <a class="video-link" href="{!! $video->video_url !!}" target="_blank"> {!! $video->video_title !!}
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div id="reviews" class="tab-pane fade">
                                    <div class="std">
                                        <div class="reviews-area">

                                            
                                            @if(\Illuminate\Support\Facades\Auth::check())

                                                <div class="review-btn mb-20 mr-t-40">
                                                    <a class="review-make">{!! trans("product.submit_opinion")!!}</a>
                                                </div>

                                                <div class="content-review-form hidden">
                                                    <div id="review-success" class=""></div>
                                                    <div id="review-error" class=""></div>
                                                    {!! Form::open(array('url' => 'submit-review','id' =>'review_form','class'=>'')) !!}

                                                    <div class="row rating-area">
                                                        <h4 class="col-lg-2">Your Rating</h4>
                                                        <div class="rating-container col-lg-10 mb-10">
                                                            <input type="radio" name="example" class="rating" value="1" />
                                                            <input type="radio" name="example" class="rating" value="2" />
                                                            <input type="radio" name="example" class="rating" value="3" />
                                                            <input type="radio" name="example" class="rating" value="4" />
                                                            <input type="radio" name="example" class="rating" value="5" />
                                                        </div>
                                                    </div>
                                                    {!! Form::hidden('rating_product_id',$product->product_id, ['class' => 'form-control ','id'=>'url_key','placeholder'=>""]) !!}
                                                    <div class="comment-form form-group">
                                                        <label class="col-lg-2">{!!
                                                            trans("product.review_comment")!!}</label>
                                                        <div class="col-lg-10 mb-10">
                                                            <textarea name="comment" class="required" id="comment" cols="20"
                                                          rows="6"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="comment-form-author mb-10">
                                                        <label class="col-lg-2">{!! trans("product.name")!!}</label>
                                                        <div class="col-lg-10 mb-10">
                                                            <input type="text" readonly name="user_name"
                                                               value="{!! \Illuminate\Support\Facades\Auth::user()->first_name." ".\Illuminate\Support\Facades\Auth::user()->last_name !!}">
                                                        </div>       
                                                    </div>
                                                    <div class="comment-form-email mb-30">
                                                        <label class="col-lg-2">{!! trans("product.email")!!}</label>
                                                        <div class="col-lg-10 mb-10">
                                                            <input type="text" readonly name="email_address"
                                                               value="{!! \Illuminate\Support\Facades\Auth::user()->email !!}">
                                                        </div>       
                                                    </div>
                                                    <div class="row mr-t-10">
                                                        <label class="col-lg-2"></label>
                                                        <div class="col-lg-10">
                                                            <button type="submit" class="submit-review">submit
                                                            </button>          
                                                        </div>
                                                    </div>
                                                    
                                                    {!! Form::close() !!}
                                                </div>


                                            @else     
                                                <?php 
                                                    $class_height_review = ($reviews->total()>0) ? '' : 'mr-sans-contenu'; 
                                                ?>
                                                <div class="review-login {!! $class_height_review !!}">
                                                {!! trans("product.review_login_message")!!} <a
                                                        href="{!! URL::to('login') !!}">{!!
                                                    trans("product.review_click_here")!!}</a>
                                                </div>
                                            @endif

                                            @if($reviews->total()>0)
                                            <div class="review-list ptb-20">
                                                <table class="table">
                                                    <thead class="header-table">
                                                        <tr>
                                                            <th scope="col" width="25%">
                                                                {!! $reviews->firstItem() !!}–{!! $reviews->lastItem() !!}
                                                                {!! trans("product.opinion_of")!!} {!! $reviews->total() !!}
                                                            </th>
                                                            <th scope="col" width="50%">{!! trans("product.opinion")!!}</th>
                                                            <th scope="col" width="25%" class="center">Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-reviews">
                                                    @foreach($reviews as $review)
                                                    
                                                        <tr>
                                                          
                                                            <td class="uppercase">
                                                                <div class="table-padding pt-20">
                                                                    {!! $review->nickname !!}
                                                                </div>
                                                            </td>     
                                                          <td>
                                                            <div class="table-padding">
                                                                <div class="stars">
                                                                    @for($i=1;$i<=$review->rating;$i++)
                                                                        <a title="1" class="star fullStar"></a>
                                                                    @endfor
                                                                </div>
                                                                <p>
                                                                    {!! $review->review !!}
                                                                </p>
                                                                
                                                            </div>    
                                                          </td>
                                                          <td class="center">
                                                            <div class="table-padding pt-20">
                                                                {!! Jenssegers\Date\Date::parse($review->review_date)->format('j F Y')!!}
                                                            </div>
                                                          </td>
                                                        </tr>                                        

                                                @endforeach
                                                </tbody>
                                                </table>
                                                <div class="pagination-area">
                                                    {{ $reviews->links() }}
                                                </div>
                                               &nbsp;
                                            </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>                                        
                            </div>
                            <div class="tabs-limit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
                                        
        <!-- <div class="share-community mr-l-15">
            <p style="line-height: 0;">{!! trans('product.find_better_deal') !!} <a href="{!! url('contact-us') !!}">{!! trans('product.share_with_us') !!}</a></p>
        </div> -->
        <div class="tabs-more-details">
            <input type="button" id="btn_details" class="btn-clickee-info" value="{!! trans('product.more_details') !!}">
        </div>

        <!-- related products -->
        <div class="related-product-container mb-60 mt-20">
            <div class="container" style="padding-left: 0px !important; padding-right: 0px !important;">
            @if(!empty($related_products))
            <div class="related-products-area ptb-30">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{!! trans("product.related_products")!!}</h2>
                    </div>
                </div>
                <div class="related-products-active">
                    @foreach($related_products as $related_product)
                     <?php $related_product_translation = $related_product->getByLanguageId(app('language')->language_id); ?>

                        <div class="col-lg-12">
                        <!-- single-product-start -->
                        <div class="product-wrapper-home">
                            <div class="product-img-connexe product-pic">
                                <a href="{!! $related_product->url->target_url !!}">
                                    <img src="{!! url($related_product->getDefaultCdnImagesPath()) !!}" alt="{!! $related_product_translation->product_name !!}"
                                         class=""/>
                                </a>
                            </div>
                            <div class="product-content pt-10">                                
                                <!-- whishlist add/remove -->
                                <div class="wishlist_prd_place_home" style="height: 12%;">
                                    <a class="wishlist_prd_home" onclick=""> &nbsp; </a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span>{!! 
                                    (isset($related_product->brand)) ? ($related_product->brand->parent_id==null) ? $related_product->brand->brand_name : $related_product->brand->parent->brand_name : "&nbsp;" !!}
                                    </span>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <a href="{!! $related_product->url->target_url !!}">{!! $product_translation->product_name !!}</a>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="new-price">{!! format_price($related_product->original_price) !!}</span>      
                                </div>
                            </div>
                        </div>
                        <!-- single-product-end -->
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            </div>
        </div>
        <div class="section-avantage"> 
            @include('front.layout.section-avantage') 
        </div>
    </div>

@stop
