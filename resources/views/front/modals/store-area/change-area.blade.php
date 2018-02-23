<div id="dialog-position2" class="hide" style="color: #212B52;border-radius: 8px;">
            <a href="#" onclick="$('#language').trigger('click');">{!! (app('language')->language_code == 'fr') ? 'EN' : 'FR' !!}</a>
           <a id="fermer-dialog2" href="#"><i  class="fa fa-times"></i></a>
          <h3 style="color: #f8ac31;"><b>{!! trans('product.welcome') !!} <img style="max-width: 39%; margin-bottom: 3px;" src="{!! url('/') !!}/images/logo_footer.png" alt="logo" /> !</b></h3> 
       
          <h4 class="validateTips">{!! trans('product.welcome_alternateeve') !!}</h4>
          <p>{!! trans('product.zip_code') !!}</p>
             <?php 
                    $distance = '';
                    $radius = getRadiusData(); 
                    $distance = Cookie::has('distance') ? Cookie::get('distance') : '';
            ?>  
           <form id="search-store" action="" method="post">
                <fieldset>
                    <div class="row">
                        <div class="form-group dialog col-lg-offset-2 col-lg-3 col-md-offset-2 col-sm-offset-2 col-md-3 col-xs-offset-1 col-xs-4" style="text-align: right;margin-top: 1.1%;">
                          <select class="form-select" name="filtre" id="distance2" style="width: 75% !important;">
                              @foreach($radius as $index=>$value)
                                    <option {!! ($distance == $index) ? "selected" : "" !!} value="{!! $index !!}">{!! $value !!}</option>
                              @endforeach
                          </select>
                        </div> 
                        <label class="col-lg-3 col-sm-3 col-md-3 col-xs-3" for="sel1">{!! trans('product.around') !!}:</label>
                        <div class="form-group col-lg-3 col-sm-3 col-md-3 col-xs-4">
                          <input type="text" class="form-control" value="{!! Cookie::has('zip_code') ? Cookie::get('zip_code') : '' !!}" id="postal_code2" placeholder="{!! trans('product.postal_code') !!}" name="zip">
                          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        </div>
                    </div> 
                </fieldset>
            </form>
        </div>