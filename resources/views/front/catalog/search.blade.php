@extends('front.layout.master')
 
@section('content')
    <div class="product-area ptb-10 product-list"> <!-- ptb-20 inter-ligne entre categorie des produits et recherche -->
        <div class="category-url" data-url="{!! url(LaravelLocalization::getCurrentLocale().'/search?q=') !!}"></div>

        <div class="category-title text-center">
            <span>VÊTEMENTS</span>
        </div>
        <div class="select-tri">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        {!! Form::select('vp', ["TRIER" => "TRIER","TEST" => "TEST"], null, ['class' => 'catalog-input-select form-select', 'id' => 'vp']); !!}
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        {!! Form::select('vp', ["TYPE DE PRODUIT" => "TYPE DE PRODUIT"], null, ['class' => 'catalog-input-select form-select', 'id' => 'vp']); !!}
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        {!! Form::select('vp', ["MARQUE" => "MARQUE"], null, ['class' => 'catalog-input-select form-select', 'id' => 'vp']); !!}
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        {!! Form::select('vp', ["COULEUR" => "COULEUR"], null, ['class' => 'catalog-input-select form-select', 'id' => 'vp']); !!}
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        {!! Form::select('vp', ["TAILLE" => "TAILLE"], null, ['class' => 'catalog-input-select form-select', 'id' => 'vp']); !!}
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        {!! Form::select('vp', ["GAMME DE PRIX" => "GAMME DE PRIX"], null, ['class' => 'catalog-input-select form-select', 'id' => 'vp']); !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="container product-container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    @if(!empty($products))

                        <div class="product_all">
                            {!! $products->total() !!} articles trouvés
                        </div>

                        <!-- <div class="row mt-20">

                             <div class="form-inline col-lg-9 col-md-6 col-sm-6 col-xs-12">
                                <span>{!! trans('catalog.sort_by') !!} :</span> 
                                {!! Form::select('vp', [ "news" => trans("catalog.news"), "discount" => trans("catalog.discount"), "low_price_to_high" => trans("catalog.low_price_to_high"), "high_price_to_low" => trans("catalog.high_price_to_low"), "brand_a_z" => trans("catalog.brand_a_z"), "brand_z_a" => trans("catalog.brand_z_a"), "best_rating" => trans("catalog.best_rating")], null, ['class' => 'form-select', 'id' => 'vp', 'onchange' => 'changeVisualisation();']); !!}
                            </div>

                               
                          
                             <div class="form-inline filter-number col-lg-3 col-md-6 col-sm-6 col-xs-12 text-right">
                                <span>{!! trans('catalog.filter_product_page') !!} :</span>
                                {!! Form::select('nb', ['48' => '48', '96' => '96'], null, ['class' => 'form-select', 'id' => 'nb', 'onchange' => 'changeNumberProduct();']); !!}
                            </div>   

                        </div> -->

                        <div class="tab-content-search mt-21">
                            <div class="tab-pane fade active in" id="th">
                                <div class="row">

                                    <?php for ($i = 1; $i <= 8; $i++) { ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                           <div class="product-wrapper mb-30">
                                                <div class="product-img product-pic-catalog img_btn">
                                                    <img src="{!! URL::to('/') !!}/upload/product/p{!! $i !!}.png" alt="" class="" />
                                                </div>
                                                <div class="product-content mt-10">
                                                    <!-- whishlist add/remove -->
                                                    <div class="wishlist_prd_place">
                                                        <a class="wishlist_prd" onclick=""> &nbsp; </a>
                                                    </div>
                                                    <span>NOM MARQUE</span>
                                                    <h4>
                                                        <a href="#">Nom produit</a>
                                                    </h4>
                                                    <span class="new-price fs-15">00,00 €</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <!-- @foreach($products as $key=>$product)
                                        <?php
                                        $product_translation = $product->getByLanguageId(app('language')->language_id);
                                        $product_image = !empty($product->images[0]) ? $product->getDefaultCdnImagesPath() : '';
                                        $alt = !empty($product->images[0]) ? $product->images[0]->alt : '';
                                        $class = (($key+1)%4 ==1) ? "clear" : ""; //On affiche 4 produit par ligne

                                        ?>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 {!! $class !!}">
                                           <div class="product-wrapper mb-30">
                                                <div class="product-img product-pic img_btn" style="height: 199px !important;">
                                                    <img src="{!! url($product->getDefaultCdnImagesPath()) !!}" alt="{!! $product_translation->product_name !!}"
                                                         class=""/>
                                                </div>
                                                <div class="product-content mt-10 tac">
                                                    <span>{!! 
                                                    (isset($product->brand)) ? ($product->brand->parent_id==null) ? $product->brand->brand_name : $product->brand->parent->brand_name : "" !!}</span>
                                                    
                                                    @if(!empty($product->url))
                                                        <h4>
                                                            <a href="{!! url($product->url->target_url) !!}">{!! $product_translation->product_name !!}</a>
                                                        </h4>
                                                    @endif
                                                    <span class="new-price fs-14">{!! format_price($product->best_price) !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach -->
                                </div>
                            </div>

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

                                    <!-- <div class="page-number text-right">
                                        {!! $products->appends(\Input::except('page'))->links() !!}
                                    </div> -->
                                </div>
                            </div>
                        @endif
                        <!-- Afindra anatin if ao ambony ref manao fonctionnalité-->
                        <div class="product_all">
                            <span> Vous avez vu {!! $products->total() !!} articles sur {!! $products->lastItem() !!} </span>
                            <p class="pt-30 pb-20">
                                <button type="button" class="btn btn-clickee-default">CHARGEZ PLUS</button>
                            </p>
                        </div>
                                    
                </div>
            </div>
        </div>
    </div>
<!-- start section avantage -->
@include('front.layout.section-avantage')
<!-- end section avantage -->
@stop