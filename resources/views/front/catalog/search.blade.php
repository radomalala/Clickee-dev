@extends('front.layout.master')
@section('additional-css')
    {!! Html::style('frontend/css/catalog.css') !!}
    {!! Html::style('frontend/css/style.css') !!}
    {!! Html::style('frontend/css/responsive.css') !!}
    {!! Html::style('css/style_custom.css') !!}
@stop  
@section('content')
    <div class="product-area ptb-10 product-list"> <!-- ptb-20 inter-ligne entre categorie des produits et recherche -->
        <div class="category-url" data-url="{!! url(LaravelLocalization::getCurrentLocale().'/search?q=') !!}"></div>
        <div class="container product-container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <div class="product_all">
                        {!! $products->total() !!} {!! trans('catalog.available_items') !!}    
                    </div>
                    <div class="sort_result">
                        {!! trans('catalog.sort_result') !!}
                    </div>
                    <div class="container-category cat-tree single-catagory mb-30 mt-12 bg-1">
                        <h2 class="title-category">{!! trans('catalog.product_categories') !!}</h2>
                        <!-- begin categorie selected -->
                        <div><p id="latest_category_selected" data-latest-category="{!! (Session::has('selected_category')) ? Session::get('selected_category') : "" !!}"></p></div>
                        <!-- end categorie selected -->
                         <div class="hidden"><p id="max_price" data-max-price="{!! (!empty($prices_array) && (sizeof($prices_array) > 1)) ? ceil(max($prices_array)) : '' !!}"></p></div>
                        <div class="catagory-menu" id="cate-toggle">
                            <?php $selected_category = Input::get('category') ?>
                            @if(!empty($categories))                                    
                                {!! getCategories($categories['tree_data'],$title_name,$selected_category) !!}
                            @endif
                        </div>
                    </div>
                    <div class="container-single-category bg-1 pd5">

                        <div class="single-catagory mb-10">
                            <a class="facet-title" href="#"><h5 class="title-filter"> {!! trans('catalog.discount_offer') !!}</h5> <!-- <i class="fa fa-angle-down"></i> --></a>
                            <div class="Tags-menu facet-content mt-10">
                                <ul class="discount-filter">
                                    <?php
                                    $discounts = ['10' => '10% Off', '20' => '20% Off', '30' => '30 % Off'];
                                    ?>
                                    @foreach($discounts as $key=>$discount)
                                        <?php $class = ($key == Input::get('discount')) ? 'selected' : '' ?>
                                        <li><a class="filter {!! $class !!}"
                                               data-type="discount" href="#" title="{!! $discount !!}" data-id="{!! $key !!}
                                                    ">{!! $discount !!}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Si la filtre par category n'existe pas, aucun filtre n'est affiché que le filtre par prix et le discounte -->
                       <!--  <div class="single-catagory mb-10">
                            <a class="facet-title" href="#"><h5 class="title-filter"> {!! trans('catalog.rating') !!}</h5><i class="fa fa-angle-down"></i></a>
                            <div class="facet-content mt-10 hide-filter">
                                <?php $class_rating = ($key == Input::get('rating')) ? 'selected' : '' ?>
                                <ul class="rating-filter">
                                        @for($i = 5; $i > 0; $i--)
                                            <li>
                                                <a class="filter {!! $class_rating !!}">
                                                    <i class='fa fa-checkbox mr-15'></i>
                                                    <div class="stars"> 
                                                        @for($j=1;$j<=$i;$j++)
                                                            <span class="star fullStar"></span>
                                                        @endfor
                                                        @for($k=5;$k>$i;$k--)
                                                            <span class="star"></span>
                                                        @endfor
                                                    </div>
                                                </a>
                                            </li>  
                                       @endfor
                                </ul>
                            </div>
                        </div> -->
                        @if(!empty($product_brands) && ((count($product_brands)>0 && $category_id != null && !in_array($category_id, $categories['category_parent_id'])) || (Input::get('q') != "" && Input::has('q')) || count(Input::except(['q', 'nb', 'vp'])) > 0 ) )
                            <div class="single-catagory mb-10">
                                <a class="facet-title" href="#"><h5 class="title-filter"> {!! trans('catalog.filter_by_brand') !!}</h5><i class="fa fa-angle-down"></i></a>
                                <div class="catagory-menu facet-content hide-filter">
                                    <ul class="brands-filter">
                                        <?php 
                                            $product_brands_ = [];
                                            $brands_peer_ = [];
                                            $brands_odd_ = [];
                                            $brands_display_ = [];

                                            if(!Input::get('brand')){
                                                Session::put("product_brands", $product_brands);      
                                            }
                                            $product_brands_ = Session::get("product_brands");
                                        ?>
                                         @if(sizeof($product_brands_) > 0)   
                                            <?php
                                                asort($product_brands_); 
                                                /*$brand_length = count($product_brands_);
                                                if($brand_length > 3){
                                                    $brands_chunk = array_chunk($product_brands_, (($brand_length%2)==1) ? $brand_length/2 : ($brand_length-1)/2);
                                                    for ($k=0; $k < count($brands_chunk[0]) ; $k++) { 
                                                        $brands_display_[] = $brands_chunk[0][$k];
                                                        $brands_display_[] = $brands_chunk[1][$k];
                                                    }
                                                    if(array_key_exists(2, $brands_chunk))
                                                        $brands_display_[] = $brands_chunk[2][0];
                                                
                                                    $product_brands_ = $brands_display_;
                                                }*/
                                              

                                                                                  ?>
                                                @foreach($product_brands_ as $key=>$brands)
                                                <?php $class = (in_array($key, explode(',', Input::get('brand')))) ? 'selected' : '' ?>
                                                <li><a class="filter {!! $class  !!}"
                                                       data-type="brand" href="#" data-id="{!! $key !!}"><i class='fa fa-checkbox mr-15'></i>{!!  $brands !!}</a></li>
                                            @endforeach
                                         @endif
                                    </ul>
                                </div>
                            </div>
                        @endif

                        @if(!empty($colors) && ((count($colors)>0 && $category_id != null  && !in_array($category_id, $categories['category_parent_id'])) || (Input::get('q') != "" && Input::has('q')) || count(Input::except(['q', 'nb', 'vp'])) > 0) )
                            <div class="single-catagory mb-10">
                                <a class="facet-title" href="#"><h5 class="title-filter"> {!! trans('catalog.filter_by_color') !!}</h5><i class="fa fa-angle-down"></i></a>

                                <div class="color-menu facet-content hide-filter">
                                    <ul class="color-filter">
                                        @foreach($colors as $key=>$color_val)
                                            <?php $class = (in_array($key, explode(',', Input::get('color')))) ? 'selected' : '' ?>
                                            <li><a class="filter {!! $class !!}" href="#"
                                                   data-type="color" data-id="{!! $key !!}"><i class="fa fa-checkbox mr-10"></i>
                                                    <span class="filter-name">{!! $color_val['name'] !!}</span>
                                                </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        
                        @if( !empty($sizes) && (( count($sizes)>0 && $category_id != null && !in_array($category_id, $categories['category_parent_id'])) || (Input::get('q') != "" && Input::has('q')) || count(Input::except(['q', 'nb', 'vp']))) ) 
                            <?php //dd($sizes);
                                $size_ = [];
                                if(!Input::has('attrs')){
                                        Session::put("sizes_filter", $sizes); 
                                            
                                }   
                                $sizes_ = Session::get("sizes_filter");
                             ?>

                            @foreach($sizes_ as $attr_id => $attr)
                                <div class="single-catagory mb-10"> 
                                    <a class="facet-title" href="#"><h5 class="title-filter"> {!! $attr['name'] !!}</h5><i class="fa fa-angle-down"></i></a>
                                    <div class="size facet-content hide-filter">
                                        <ul class="size-filter">
                                            <!-- li><a class="filter all-size {!! (Input::get("attrs.$attr_id")=='all')?'selected':''  !!}" href="#"
                                                   data-id="all">All {!! $attr['name'] !!}</a></li-->
                                            <?php asort($attr['options']); 
                                                //dd($attr['options']);
                                            ?>
                                            @foreach($attr['options'] as $key=>$size_val)
                                                <?php $class = (in_array($key, explode(',', Input::get("attrs.$attr_id")))) ? 'selected' : '' ; ?>
                                                <?php $tri_option = explode('/§/',$size_val);
                                                    $class_li = "";
                                                    $option_length = strlen($tri_option[1]);
                                                    if($option_length > 8)
                                                            $class_li = "width-50";
                                                    if($option_length > 16)
                                                            $class_li = "width-100";  ?>
                                                <li class="{!! $class_li !!}"><a class="filter {!! $class !!}" href="#" data-type="size" data-id="{!! $key !!}" data-attribute_id="{!! $attr_id !!}"><i class="fa fa-checkbox mr-15"></i> <?php echo $tri_option[1]; ?></a></li>
                                                <!--li><input type="checkbox"  name="{!! $key !!}" data-id="{!! $key !!}" data-attribute_id="{!! $attr_id !!}" class="filter-size {!! $class !!}" value="{!! $size_val !!}" /> <label for="{!! $key !!}">{!! $size_val !!}</label></li><br -->
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if( count($product_tags)>0 && (( $category_id != null && !in_array($category_id, $categories['category_parent_id'])) || (Input::get('q') != "" && Input::has('q')) || count(Input::except(['q', 'nb', 'vp']))) )
                            <div class="single-catagory mb-10">
                                <a class="facet-title" href="#"><h5 class="title-filter"> {!! trans('catalog.product_tag') !!}</h5><i class="fa fa-angle-down"></i></a>
                                <div class="Tags-menu facet-content hide-filter">
                                    <ul class="tags-filter">
                                        @foreach($product_tags as $key=>$tag)
                                            <?php $class = (in_array($key, explode(',', Input::get('tag')))) ? 'selected' : '' ?>
                                            <li><a class="filter {!! $class  !!}"
                                                   data-type="tag" href="#" title="8 topics" data-id="{!! $key !!}
                                                        ">{!! $tag !!}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif

                        <div class="single-catagory mb-10 mt-10">
                            <a class="facet-title" href="#"><h5 class="title-filter"> {!! trans('catalog.filter_by_price') !!}</h5> <!-- <i class="fa fa-angle-down"></i> --></a>
                            <div class="facet-content content-price-filter show-filter">
                                <div class="input-group row">
                                    <input type="number" class="start-price col-xs-6 col-md-6 col-sm-6 col-lg-6"
                                           value="{!! \Illuminate\Support\Facades\Input::get('start_price') !!}" placeholder="{!! trans('catalog.min_price') !!}">
                                    <input type="number" class="end-price col-md-6 col-sm-6 col-lg-6 col-lg-6"
                                       value="{!! \Illuminate\Support\Facades\Input::get('end_price') !!}" placeholder="{!! trans('catalog.max_price') !!}">
                                    <span class="input-group-btn">
                                        <button id="filter-by-price" class="btn btn-secondary" type="button">OK</button>
                                    </span>
                                    
                                </div>
                                <div class="error">{!! trans('catalog.error_price') !!}</div>
                               <!--  <div id="slider-range"
                                     class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"
                                         style="left: 6%; width: 88%;"></div> 
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                          style="left: 6%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all"
                                                                         tabindex="0" style="left: 94%;"></span></div>
                                    <span class="show-price-start"></span>
                                    <span class="show-price-end"></span> -->
                                <input readonly class="hidden" type="text" name="text" id="amount">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div id="category_selected">
                        
                    </div>
                    @if(!empty($products))

                        <div class="row mt-20">
                            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 filter-order"> -->
                                <!--  <div class="tab-menu mb-30"> -->
                                    <!-- <ul>
                                        <li class="active"><a href="#th" data-toggle="tab" aria-expanded="false"><i
                                                        class="fa fa-th"></i></a></li>
                                        <li class=""><a href="#list" data-toggle="tab" aria-expanded="true"><i
                                                        class="fa fa-list"></i></a></li> 
                                    </ul> -->
                                <!-- </div> -->

                             <div class="form-inline col-lg-9 col-md-6 col-sm-6 col-xs-12">
                                <span>{!! trans('catalog.sort_by') !!} :</span> 
                                {!! Form::select('vp', [ "news" => trans("catalog.news"), "discount" => trans("catalog.discount"), "low_price_to_high" => trans("catalog.low_price_to_high"), "high_price_to_low" => trans("catalog.high_price_to_low"), "brand_a_z" => trans("catalog.brand_a_z"), "brand_z_a" => trans("catalog.brand_z_a"), "best_rating" => trans("catalog.best_rating")], null, ['class' => 'form-select', 'id' => 'vp', 'onchange' => 'changeVisualisation();']); !!}
                            </div>

                               
                            <!-- </div> -->
                             <div class="form-inline filter-number col-lg-3 col-md-6 col-sm-6 col-xs-12 text-right">
                                <span>{!! trans('catalog.filter_product_page') !!} :</span>
                                {!! Form::select('nb', ['48' => '48', '96' => '96'], null, ['class' => 'form-select', 'id' => 'nb', 'onchange' => 'changeNumberProduct();']); !!}
                            </div>   <!-- Filtrage d'affichage du liste par page -->

                        </div>

                        <div class="tab-content-search mt-21">
                            <div class="tab-pane fade active in" id="th">
                                <div class="row">
                                    @foreach($products as $key=>$product)
                                        <?php
                                        $product_translation = $product->getByLanguageId(app('language')->language_id);
                                        $product_image = !empty($product->images[0]) ? $product->getDefaultCdnImagesPath() : '';
                                        $alt = !empty($product->images[0]) ? $product->images[0]->alt : '';
                                        $class = (($key+1)%4 ==1) ? "clear" : "";                                   //On affiche 4 produit par ligne

                                        ?>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 {!! $class !!}">
                                           <div class="product-wrapper mb-30">
                                                <div class="product-img product-pic img_btn">
                                                    <img src="{!! url($product_image) !!}" alt="{!! $alt !!}" class="img_prd">
                                                    <div class="middle">
                                                        <a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$product->url->target_url) !!}" class="btn_view">{{trans("common/label.watch")}}</a>
                                                    </div>
                                                </div>
                                                <div class="product-content mt-10 tac">
                                                    <span>{!! 
                                                    (isset($product->brand)) ? ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name : "" !!}</span>
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
                                                    @if(!empty($product->url))
                                                        <h4>
                                                            <a href="{!! url($product->url->target_url) !!}">{!! $product_translation->product_name !!}</a>
                                                        </h4>
                                                    @endif
                                                    @if($product->original_price != $product->best_price)
                                                        <span class="old-price fs-14">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                                        <span class="old-price fs-14"><del>{!! format_price($product->original_price) !!}</del></span>
                                                        <span class="new-price fs-14">{!! format_price($product->best_price) !!}</span>
                                                    @else
                                                        <span class="old-price fs-14">{!! format_price($product->original_price) !!}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- <div class="tab-pane " id="list">
                                @foreach($products as $product)
                                    <?php
                                    $product_translation = $product->getByLanguageId(app('language')->language_id);
                                    $product_image = !empty($product->images[0]) ? $product->getDefaultImagePath() : '';
                                    $alt = !empty($product->images[0]) ? $product->images[0]->alt : '';
                                    ?>
                                    <div class="row mb-30 mix brand-name" data-myorder="{!! 
                                                    (isset($product->brand)) ? ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name : '' !!}">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-wrapper">
                                                <div class="product-img product-pic">
                                                    <a href="#">
                                                        <img src="{!! url($product_image) !!}" alt="{!! $alt !!}"
                                                             class="primary">
                                                        <img src="{!! url($product_image) !!}" alt="{!! $alt !!}"
                                                             class="secondary">
                                                    </a>
                                                    <span class="sale">sale</span>

                                                    <div class="product-icon">
                                                        <ul>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <!- product-content-start ->
                                            <div class="product-content">
                                                <span>{!! 
                                                    (isset($product->brand)) ? ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name : "" !!}</span>
                                                <h4><a href="#">{!! $product_translation->product_name !!}</a></h4>
                                                @if($product->original_price != $product->best_price)
                                                    <span class="old-price">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                                    <span class="old-price"><del>{!! format_price($product->original_price) !!}</del></span>
                                                    <span class="new-price">{!! format_price($product->best_price) !!}</span>
                                                @else
                                                    <span class="old-price">{!! format_price($product->original_price) !!}</span>
                                                @endif
                                                <p>{!! $product_translation->summary !!} </p>
                                            </div>
                                            <!- product-content-end ->
                                        </div>
                                    </div>
                                @endforeach
                            </div> -->
                        </div>
                        @else
                        {!! trans("catalog.no_records_found")!!}
                        @endif
                                <!-- tab-area-end -->
                        <!-- pagination-area-start -->
                        @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator && $products->total() >$products->perPage() )
                            <div class="pagination-area">
                                <div class="page-detail">
                                    <!-- <div class="page-sumary">

                                        <p> Showing {!! $products->firstItem() !!}–{!! $products->lastItem() !!}
                                            of {!! $products->total() !!} results </p>
                                    </div> -->

                                    <div class="page-number text-right">
                                        {!! $products->appends(\Input::except('page'))->links() !!}
                                    </div>
                                </div>
                            </div>
                            @endif
                                    <!-- pagination-area-end -->
                            <!-- <div class="ask-button">
                                <p>{!! trans("catalog.ask_btn_text1")!!}
                                    <a href="{!! URL::to('/ask-product') !!}" class="btn btn-default register-btn"><b>{!! trans("catalog.ask_btn_label")!!} </b></a>
                                    {!! trans("catalog.ask_btn_text2")!!}
                                </p>
                            </div> -->
                </div>
            </div>
        </div>
    </div>
@stop