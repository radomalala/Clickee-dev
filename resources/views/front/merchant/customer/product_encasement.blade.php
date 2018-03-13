                                <div class="row mt-30 product-content product_input_row master-input-size-container hidden">
                                        <div class="col-md-12">
                                            <div class="box-body">
                                                <div class="row">
                                                    <label for="product_name" class="col-sm-3 control-label">Nom produit</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control required">
                                                                @foreach($product_is_active as $product)
                                                                        <option name="{!! $product->product_id !!}">{!! $product->french->product_name !!}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    <div class="form-group col-sm-6 product_reference">
                                                        <label for="product_reference" class="col-sm-3 control-label">Référence</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Référence" class=" form-control required"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6 parent_category">
                                                        <label for="parent_category" class="col-sm-3 control-label">Catégorie</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control required">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6 sub_category">
                                                        <label for="sub_category" class="col-sm-3 control-label">Sous catégorie</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control required">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6 product_size">
                                                        <label for="product_size" class="col-sm-3 control-label">Taille</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control required">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6 product_color">
                                                        <label for="product_color" class="col-sm-3 control-label">Couleur</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control required">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6 discount">
                                                        <label for="discount" class="col-sm-3 control-label">Rémise</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Rémise" class="form-control required"/>
                                                        </div>
                                                    </div>
                                                     <div class="form-group col-sm-6 promo_code">
                                                        <label for="promo_code" class="col-sm-3 control-label">Code promo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Code promo" class="form-control required"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-10 button">
                                                    <button type="button" style="float:right;" class="btn btn-danger remove_size_input">Annuler ce produit</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                            
                            <section class="content" id="size_list_input">
                                    <div class="row product-content row product_input_row " id="1">
                                        <div class="col-md-12">
                                            <div class="box-body  mt-30">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="product_name" class="col-sm-3 control-label">Nom produit</label>
                                                        <div class="col-sm-9">
                                                            <select class="select-product-name form-control required">
                                                                @foreach($product_is_active as $product)
                                                                        <option name="{!! $product->product_id !!}">{!! $product->french->product_name !!}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="product_reference" class="col-sm-3 control-label">Référence</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="product_reference[1]" placeholder="Référence" id="product_reference1" class="form-control required"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="parent_category" class="col-sm-3 control-label">Catégorie</label>
                                                        <div class="col-sm-9">
                                                            <select id="parent_category1" name="parent_category[1]" class="form-control required">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="sub_category" class="col-sm-3 control-label">Sous catégorie</label>
                                                        <div class="col-sm-9">
                                                            <select id="sub_category1" name="sub_category[1]" class="form-control required">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="product_size" class="col-sm-3 control-label">Taille</label>
                                                        <div class="col-sm-9">
                                                            <select id="product_size1" name="product_size[1]" class="form-control required">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="product_color" class="col-sm-3 control-label">Couleur</label>
                                                        <div class="col-sm-9">
                                                            <select id="product_color1" name="product_color[1]" class="form-control required">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                     <div class="form-group col-sm-6">
                                                        <label for="discount" class="col-sm-3 control-label">Rémise</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="discount[1]" placeholder="Rémise" id="discount1" class="form-control required"/>
                                                        </div>
                                                    </div>
                                                     <div class="form-group col-sm-6">
                                                        <label for="promo_code" class="col-sm-3 control-label">Code promo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="promo_code[1]" placeholder="Code promo" id="promo_code1" class="form-control required"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                        <div class="col-md-12 mt-10">
                                            <div class="box-footer">
                                                <button type="button" style="float:right;" class="btn btn-primary add_size_input">Produit suivant</button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="box-footer">
                                    <a href="#tab_1" data-toggle="tab" class="btn btn-default">Precedent</a>
                                    <a class="btn btn-primary pull-right" href="#tab_2" data-toggle="tab"> Paiement
                                    </a>
                                </div>