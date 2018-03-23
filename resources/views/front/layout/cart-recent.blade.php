@if($cart_count > 0)
    <div class="dropdown-menu cart-total text-right" id="content-cart" style="width: 365px;">
    <ul class="cart-menu">
        <?php
            $nombre = ($cart_count < 10) ? '0'.$cart_count : $cart_count;
        ?> 
        <li>        
            <div class="shopping-cart">

                @foreach($recent_items as $item_id=>$item)
                <div class="cart-list row">
                    <div class="cart-img col-lg-3">
                        <a href="#" title="{!! $item->getName() !!}"><img
                                    src="{!! \App\Product::PRODUCT_IMAGE_CDN_PATH.$item->getImage() !!}"
                                    alt="{!! $item->getImageAlt() !!}"/></a>
                    </div>
                    <div class="cart-info col-lg-8">
                        <h4 class="text-uppercase">{!! (isset($item->getProduct()->brand)) ? ($item->getProduct()->brand->parent_id==null) ? $item->getProduct()->brand->brand_name : $item->getProduct()->brand->parent->brand_name : "" !!}</h4>
                        <h4 class="mb-10"><a href="#">{!! $item->getName() !!}</a></h4>
                        <div class="cart-price">
                            <div class="col-lg-5 text-right">
                                <span class="new-price">{!! format_price($item->getOriginalPrice()) !!}</span>         
                            </div>
                            <div class="col-lg-1 text-center">|</div>
                            <div class="col-lg-5 pt-2">
                                <?php 
                                    $product = $item->getProduct();
                                    $average_full = average_rating_product($product->product_id); 
                                    $average_empty = 5-average_rating_product($product->product_id);
                                ?>
                                @for($i=1;$i<=$average_full;$i++)
                                    <a class="fullStar_product"></a>
                                @endfor
                                @for($i=1;$i<=$average_empty;$i++)
                                    <a class="emptyStar_product"></a>
                                @endfor         
                            </div>
                            <!-- <span class="price">({!! format_price($item->getRebate()) !!}) {!! format_price($item->getOriginalPrice())!!} {!! $item->getQuantity() !!}x{!! format_price($item->getTotal()) !!}</span> -->
                        </div>
                    </div>
                    <div class="pro-del col-lg-1">
                        <a href="{!! url("cart/remove/$item_id") !!}"><i  class="fa fa-times"></i></a>
                    </div>
                </div>
                @endforeach
                <div class="mini-cart-total mt--10">
                    <span>{!! trans('cart.total') !!}</span>
                    <span class="total-price" style="float: right;">{!! format_price($cart_total) !!} ({!! $nombre !!})</span>
                </div>
                <div class="cart-button text-center text-uppercase mb-10">
                    <a class="btn btn-clickee-default" href="{!! URL::to('/') !!}/cart" title="Cart">VOIR PANIER</a>
                </div>
            </div>
        </li> 
    </ul>
</div>

@else
<div class="dropdown-menu cart-none" data-animations="pulse fadeInLeft fadeInUp fadeInRight">
    <div class="shopping-cart text-center">
        <h4 class="ct mt-20 mb--10">VOTRE PANIER EST VIDE!</h4>
        <span class="al">Continuez à shopper</span>                    
    </div>
</div>

@endif