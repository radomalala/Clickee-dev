@extends('front.layout.master')
    {!! Html::style('frontend/css/home.css') !!}
    {!! Html::style('frontend/css/style.css') !!}
    {!! Html::style('frontend/css/responsive.css') !!}
    {!! Html::style('css/style_custom.css') !!}
@section('content')


<!-- start section slider -->
<section class="section-slider">
    <div id="carousel-id" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($banners as $banner)
        <div class="item {!! ($loop->first) ? 'active' : '' !!}">
            <img src="{!! URL::to('/').\App\Models\Banner::Banner_IMAGE_PATH.'SLIDER.jpg' !!}" alt="{!! $banner->alt !!}" class="img-responsive" />
            
            <div class="container">
                <div class="carousel-caption">
                    <div class="slider-title">
                        <h1>ON A</h1>
                        <h1>DU NEUF</h1>
                    </div>
                    <button type="button" class="btn btn-default">SHOPPER</button>
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
<section class="section-three-bloc">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <a href="#"><img src="{!! URL::to('/') !!}/images/VOYAGE.png" alt="Nouvelles destinations"/></a>
            </div>
            <div class="col-lg-5">
                <a href="#"><img src="{!! URL::to('/') !!}/images/IDEES_CADEAUX.jpg" alt="Nouveautés cadeaux destinations"/></a>
                <a href="#""><img src="{!! URL::to('/') !!}/images/IDEES_CADEAUX.jpg" alt="Tendances décos"/></a>
            </div>    
        </div>
    </div>
</section>    
<!-- end section three blocs -->

<!-- start section top product  -->
<section class="section-top-product">
    <div class="container">
        <ul class="nav nav-tabs" id="productTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="coup_de_coeur-tab" data-toggle="tab" href="#coup_de_coeur" role="tab" aria-controls="coup_de_coeur" aria-selected="true">COUP DE COEUR</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="meilleur_vente-tab" data-toggle="tab" href="#meilleur_vente" role="tab" aria-controls="meilleur_vente" aria-selected="false">MEILLEURES VENTES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mieux_note-tab" data-toggle="tab" href="#mieux_note" role="tab" aria-controls="mieux_note" aria-selected="false">MIEUX NOTÉS</a>
            </li>
        </ul>
        <div class="tab-content" id="productTabContent">
            <div class="tab-pane fade in active" id="coup_de_coeur" role="tabpanel" aria-labelledby="coup_de_coeur-tab">
                ...test
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
        <div class="col-lg-6">
            
        </div>
        <div class="col-lg-6">
            
        </div>
    </div>
</section>
<!-- end section two bloc -->

<!-- start section instagramm feed -->
<section class="section-instagramm-feed">
    <div class="container">
        <div class="section-instagramm-feed-title">
            <span>INSTAGRAM FEED</span>
        </div>
        <div class="section-instagramm-feed-content">
            <div class="row">
            <?php for ($i = 1; $i <= 8; $i++) { ?>
                <div class="col-lg-3">
                    <img src="{!! URL::to('/') !!}/images/instagram{!! $i !!}.svg" alt="instagramm feed clickee"/>
                </div>    
            <?php } ?>
            </div>
        </div>
    </div>
</section>    
<!-- end section instagramm feed -->

<!-- start section marque -->
<section class="section-marque">
    <div class="container">
        
    </div>
</section>
<!-- end section marque -->

<!-- start section avantage -->
<section class="section-avantage"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                
            </div>
            <div class="col-lg-4">
                
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>
    </div>
</section>
<!-- end section avantage -->

@stop