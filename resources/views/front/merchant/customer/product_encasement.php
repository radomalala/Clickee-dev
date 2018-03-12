
<!-- <div class="row form-group size_input_row master-input-size-container hidden">
        <div class="row col-sm-5">   
            <label for="sizes" class="col-sm-3 label-size"></label>
            <div class="col-sm-9 size_input">
                <input type="text" class="form-control" placeholder="taille 1">
            </div>
        </div>
        <div class="row col-sm-5">
            <label for="sizes" class="col-sm-3">Quantité</label>
            <div class="col-xs-9 size_input_quantity">
                <input type="text" class="form-control" placeholder="quantité">
            </div>
        </div>
        <div class="col-sm-2 button">
            <button type="button" class="btn btn-primary">x</button>
        </div>
</div>

<div class="row form-group color_input_row master-input-color-container hidden">
        <div class="row col-sm-5">   
            <label for="colors" class="col-sm-3 label-color"></label>
            <div class="col-sm-9 color_input">
                <input type="text" class="form-control" placeholder="couleur 1">
            </div>
        </div>
        <div class="row col-sm-5">
            <label for="colors" class="col-sm-3">Quantité</label>
            <div class="col-xs-9 color_input_quantity">
                <input type="text" class="form-control" placeholder="quantité">
            </div>
        </div>
        <div class="col-sm-2 button">
            <button type="button" class="btn btn-primary">x</button>
        </div>
</div>
<div class="" id="size_list_input">
    <div class="row form-group size_input_row" id="1">
        <div class="row col-sm-5">   
            <label for="sizes" class="col-sm-3">Taille 1</label>
            <div class="col-sm-9 size_input">
                <input type="text" class="form-control" name="sizes[1]" placeholder="Taille 1">
            </div>
        </div>
        <div class="row col-sm-5">
            <label for="sizes" class="col-sm-3">Quantité</label>
            <div class="col-xs-9 size_input_quantity">
                <input type="text" class="form-control" name="quantities_size[1]" placeholder="Quantité">
            </div>
        </div>
        <div class="col-sm-10 mt-10 button">
            <button type="button" style="float:right;" class="btn btn-primary add_size_input">Ajouter une taille</button>
        </div>
    </div>
</div>

<div class="" id="color_list_input">
    <div class="row form-group color_input_row" id="1">
        <div class="row col-sm-5">   
            <label for="colors" class="col-sm-3">Couleur 1</label>
            <div class="col-sm-9 color_input">
                <input type="text" class="form-control" name="colors[1]" placeholder="Couleur 1">
            </div>
        </div>
        <div class="row col-sm-5">
            <label for="colors" class="col-sm-3">Quantité</label>
            <div class="col-xs-9 color_input_quantity">
                <input type="text" class="form-control" name="quantities_color[1]" placeholder="Quantité">
            </div>
        </div>
        <div class="col-sm-10 mt-10 button">
            <button type="button" style="float:right;" class="btn btn-primary add_color_input">Ajouter une couleur</button>
        </div>
    </div>
</div> -->

                    <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box-body">
                                                <div class="form-group col-sm-6">
                                                    <label for="product_name" class="col-sm-3 control-label">Nom produit</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="product_name[]" placeholder="Nom produit" id="product_name1" class="form-control required"/>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="product_reference" class="col-sm-3 control-label">Référence</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="product_reference[]" placeholder="Référence" id="product_reference1" class="form-control required"/>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="parent_category" class="col-sm-3 control-label">Catégorie</label>
                                                    <div class="col-sm-9">
                                                        <select id="parent_category1" name="parent_category[]" class="form-control required">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="sub_category" class="col-sm-3 control-label">Sous catégorie</label>
                                                    <div class="col-sm-9">
                                                        <select id="sub_category1" name="sub_category[]" class="form-control required">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="product_size" class="col-sm-3 control-label">Taille</label>
                                                    <div class="col-sm-9">
                                                        <select id="product_size1" name="product_size[]" class="form-control required">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="product_color" class="col-sm-3 control-label">Couleur</label>
                                                    <div class="col-sm-9">
                                                        <select id="product_color1" name="product_color[]" class="form-control required">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group col-sm-6">
                                                    <label for="discount" class="col-sm-3 control-label">Rémise</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="discount[]" placeholder="Rémise" id="discount1" class="form-control required"/>
                                                    </div>
                                                </div>
                                                 <div class="form-group col-sm-6">
                                                    <label for="promo_code" class="col-sm-3 control-label">Code promo</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="promo_code[]" placeholder="Code promo" id="promo_code1" class="form-control required"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>