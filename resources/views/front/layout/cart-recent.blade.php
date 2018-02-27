@if($cart_count > 0)
    <div class="cart-total text-right">
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
                        <h4>{!! (isset($item->getProduct()->brand)) ? ($item->getProduct()->brand->parent_id==null) ? $item->getProduct()->brand->brand_name : $item->getProduct()->brand->parent->brand_name : "" !!}</h4>
                        <h4><a href="#">{!! $item->getName() !!}</a></h4>
                        <div class="cart-price">
                            <span class="price">({!! format_price($item->getRebate()) !!}) {!! format_price($item->getOriginalPrice())!!} {!! $item->getQuantity() !!}x{!! format_price($item->getTotal()) !!}</span>
                        </div>
                    </div>
                    <div class="pro-del col-lg-1">
                        <a href="{!! url("cart/remove/$item_id") !!}"><i  class="fa fa-times"></i></a>
                    </div>
                </div>
                @endforeach
                <div class="mini-cart-total">
                    <span>{!! trans('cart.total') !!}</span>
                    <span class="total-price">{!! format_price($cart_total) !!} ({!! $nombre !!})</span>
                </div>
                <div class="cart-button">
                    <?php 
                        $alink = (app('language')->language_code == 'en') ? "aen" : "afr";
                    ?>
                    <a class="{!! $alink !!}" href="{!! URL::to('/') !!}/cart" title="Cart">{{trans("common/label.view_cart")}}</a>
                </div>
            </div>
        </li> 
           
        <span class="sell_pannier">{!! $nombre !!}</span>
        <a href="#">
            <img style="max-width: 70%;" src="{!! url('/') !!}/images/panier_orange_pleine.svg" alt="add to cart icon" />
        </a>
        
    </ul>
</div>

@else
<div class="cart-total text-right">
    <ul class="cart-menu">
        <li>
            <div class="shopping-cart">
                <h4 class="ct">{!! trans("cart.empty_cart")!!}</h4>
                <span class="al">{!! trans("cart.continue_shopping_h")!!}</span>                    
            </div>
        </li>
        <a href="#">
            <img style="max-width: 89%;" src="{!! url('/') !!}/images/panier_blanc_header.svg" alt="add to cart icon" />
        </a>
        
    </ul>
</div>

@endif