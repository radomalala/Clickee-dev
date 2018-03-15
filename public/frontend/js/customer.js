jQuery(document).ready(function () {

    var $document = jQuery(document);

    $('#product_name1').select2({
        data : product_is_active
    });

    $('.select2-container').css('width', '100%');

    $document.on('click','.add_size_input',function (){
        var row_count = parseInt($('.product_input_row:last').attr('id'));
        var row_index = row_count + 1;
        var input_type = $document.find('#input_type :selected').val();

        var html_data = $document.find('.master-input-size-container').clone();
        html_data.removeClass('master-input-size-container hidden').prop('id',row_index).addClass('product-content');
        
        html_data.find('.product_name select').attr('name','product_name['+row_index+']').attr('id', 'product_name'+row_index).attr('data-content-range', row_index).addClass('select-product-name');
        html_data.find('.product_reference input').attr('name','product_reference['+row_index+']').addClass('input-product-reference');
        html_data.find('.parent_category select').attr('name','parent_category['+row_index+']').attr('id', 'parent_category'+row_index).addClass('select-parent-category').attr('data-content-range', row_index);
        html_data.find('.sub_category select').attr('name','sub_category['+row_index+']').attr('id', 'sub_category'+row_index).addClass('select-sub-category');
        html_data.find('.product_size select').attr('name','product_size['+row_index+']').attr('id', 'product_size'+row_index).addClass('select-product-size');
        html_data.find('.product_color select').attr('name','product_color['+row_index+']').attr('id', 'product_color'+row_index).addClass('select-product-color');
        html_data.find('.discount input').attr('name','discount['+row_index+']').attr('id', 'discount'+row_index).addClass('input-discount');
        html_data.find('.promo_code select').attr('name','promo_code['+row_index+']').attr('id', 'promo_code'+row_index).addClass('select-promo-code');
        html_data.find('.product_price input').attr('name', 'product_price['+row_index+']').attr('id','product_price'+row_index).addClass('input-product-price');
        html_data.find('.product_quantity input').attr('name', 'product_quantity['+row_index+']').attr('id','product_quantity'+row_index).addClass('input-product-quantity');
        //h
        
        html_data.find('.size_input_quantity input').attr('name','quantities_size['+row_index+']').attr('placeholder', 'quantité pour taille '+row_index);
        
        html_data.find('.button :button').removeClass('btn-primary add_size_input').addClass('btn-danger remove_size_input').text('Annuler ce produit');
        
        html_data.find('.product_name select').select2({
            data : product_is_active
        });
        
        $(html_data).hide().appendTo("#size_list_input").animate({height: 'toggle'}, 500);
        $('.select2-container').css('width', '100%');
    });

    $document.on('click','.remove_size_input',function () {
       $(this).parents('.product-content').remove();    
    });

    $document.on('change.select2','.product_name select',function (e){
        var product_id = $(this).val();
        var content_range = $(this).data('content-range');
        get_product_data(product_id, content_range);
        
    });

    $('.select-product-name').change(function(event) {
        var product_id = $(this).val();
        var content_range = $(this).data('content-range');
        get_product_data(product_id, content_range);
    });

    $('.select-parent-category').change(function(e){
        $('#promo_code'+index).html('');
        var index = $(this).data('content-range');
        $.ajax({
            url: base_url + 'fr/merchant/product/get-code-promo-by-category',
            type: 'GET',
            dataType: 'json',
            data: {category_id: $(this).val()},
        })
        .done(function(data) {
            if(data.code_promos.length > 0){
                $('#promo_code'+index).html('<option value="0">Séléctionner une code</option>')
                for (var i = data.code_promos.length - 1; i >= 0; i--) {
                    var code_promo = data.code_promos[i];
                    console.log("index : "+index);
                    $('#promo_code'+index).append('<option value="'+code_promo.code_promo_id+'">'+code_promo.code_promo_name+'</option>')
                }
            }
        })
        .fail(function() {
            console.log("error du recuperation du code promo");
        });
        
    });

    $('#paiement').click(function(event) {   
        var info_product_customer = $('#customer_form').serializeArray();
        var total_price_product = 0;
        var tab_tr = {};
        $('.table-content-paiement').html('');
        $('.select-product-name').each(function(index, el) {
            $('.table-content-paiement').append("<tr class='tr"+index+"'><th>"+$(this).find('option:selected').text()+"</th><tr/>");
        });
        $('.input-product-reference').each(function(index, el) {
            $('.table-content-paiement').find('.tr'+index).append('<th>'+$(this).val()+'</th>');
        });

        $('.input-product-quantity').each(function(index, el) {
            $('.table-content-paiement').find('.tr'+index).append('<th>'+$(this).val()+'</th>');
        });
        $('.input-product-price').each(function(index, el) {
            $('.table-content-paiement').find('.tr'+index).append('<th>'+$(this).val()+'</th>');
            total_price_product+= parseFloat($(this).val());
        });
        $('.select-parent-category').each(function(index, el) {
            console.log($(this).find('option:selected').text());
        });
         console.log("sub-category");
        $('.select-sub-category').each(function(index, el) {
            console.log($(this).find('option:selected').text());
        });
        
         console.log("product-color");
        $('.select-product-color').each(function(index, el) {
            console.log($(this).find('option:selected').text());
        });
         console.log("discount");
        $('.input-discount').each(function(index, el) {
            console.log($(this).val());
        });
         console.log("promo-code");
        $('.select-promo-code').each(function(index, el) {
            console.log($(this).val());
        });

        $('.table-content-paiement').append('<tr class="total"><th></th><th></th><th>Montant total HT</th><th>'+total_price_product+'</th></tr>');
        $('#total_ht').val(total_price_product);
    });

     $("#encasement").click(function(event) {
        console.log('On submit');
        $('form').submit();
     });

    if (jQuery('table.table').length > 0) {
        jQuery('table.table').DataTable({
            "responsive": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": false,
            "order": [[4, "desc"]],
            "lengthMenu": [20, 40, 60, 80, 100],
            "pageLength": 20,
            language: {
                        paginate: {
                            first:    'Premier',
                            previous: 'Précédent',
                            next:      'Suivant',
                            last:     'Dernier'
                        },
                        "lengthMenu": "Afficher _MENU_ entrées",
                        "search": "Chercher:",
                        "processing": "En traitement ...",
                        "infoEmpty": "Aucune entrée à afficher",
                        "info": "Afficher la page _PAGE_ de _PAGES_"


            },
            columns: [
                {searchable: true, sortable: true},
                {searchable: true, sortable: true},
                {searchable: true, sortable: true},
                {searchable: true, sortable: true},
                {searchable: true, sortable: true},
                {searchable: true, sortable: true},
                {searchable: false, sortable: false}
            ],
            fnDrawCallback: function () {
                var $paginate = this.siblings('.dataTables_paginate');
                if (this.api().data().length <= this.fnSettings()._iDisplayLength) {
                    $paginate.hide();
                }
                else {
                    $paginate.show();
                }
            }
        });
    }

});

function get_product_data(product_id, content_range){
    var options_size = [];
    var options_color = [];
    var select_option_size = [];
    var select_option_color = [];

    $('#product_size'+content_range).html("<option></option>");
    $('#product_color'+content_range).html("<option></option>");
    $('#parent_category'+content_range).html("<option></option>");
    $('#sub_category'+content_range).html("<option></option>");

    $.ajax({
            url: base_url + 'fr/merchant/product/get-product-for-encasement',
            type: 'GET',
            dataType: 'json',
            data: {product_id: product_id},
        })
        .done(function(data) {
            var attribute_values = data.attribute.attribute_values;
            var product = data.product;
            var code_promo_arr = data.code_promo_arr;

            for (var i = attribute_values.length - 1; i >= 0; i--) {
                var attribute = attribute_values[i].attribute;
                if(attribute.type == "2"){
                        if(options_size.length == 0){
                            options_size = attribute.options;
                            if(options_size.length > 0)
                                $('#product_size'+content_range).html("<option>Séléctionner la taille</option>");
                            for (var j = options_size.length - 1; j >= 0; j--) {
                                var option_value = options_size[j].option_value;
                                var option_id = options_size[j].attribute_option_id;
                                $('#product_size'+content_range).append('<option name="'+option_id+'"">'+option_value+'</option>');
                            }
                        }
                }
                if(attribute.type == "1"){
                        if(options_color.length == 0){
                            options_color = attribute.options;
                            console.log(options_color);
                            if(options_color.length > 0)
                                $('#product_color'+content_range).html("<option>Séléctionner une couleur</option>");
                           for (var k = options_color.length - 1; k >= 0; k--) {
                                var option_value = options_color[k].option_value;
                                var option_id = options_color[k].attribute_option_id;
                                $('#product_color'+content_range).append('<option name="'+option_id+'"">'+option_value+'</option>');
                            }
                        }
                }
            }
            var category_arr = data.category_arr;
            if(Object.keys(category_arr).length > 0){
                $('#parent_category'+content_range).html("<option name='0'>Séléctionner une catégorie</option>");
                $('#sub_category'+content_range).html("<option name='0'>Séléctionner une catégorie</option>");
            }
            for(var category_id in category_arr){
                $('#parent_category'+content_range).append('<option value="'+category_id+'">'+data.category_arr[category_id]+'</option>');
                $('#sub_category'+content_range).append('<option value="'+category_id+'">'+data.category_arr[category_id]+'</option>');
            }
            console.log(product.original_price);
            $('#product_price'+content_range).val(product.original_price);
            $('#product_quantity'+content_range).val("1");
            console.log(code_promo_arr);
        })
        .fail(function(xhr, options) {
            console.log(xhr.responseText);
        });

}