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
        html_data.removeClass('master-input-size-container hidden').prop('id',row_index);
        
        html_data.find('.product_name select').attr('name','product_name['+row_index+']').attr('id', 'product_name'+row_index);
        html_data.find('.product_reference input').attr('name','product_reference['+row_index+']');
        html_data.find('.product_category select').attr('name','product_category['+row_index+']');
        html_data.find('.sub_category select').attr('name','sub_category['+row_index+']');
        html_data.find('.product_size select').attr('name','product_size['+row_index+']');
        html_data.find('.product_color select').attr('name','product_color['+row_index+']');
        html_data.find('.discount input').attr('name','discount['+row_index+']');
        html_data.find('.promo_code input').attr('name','promo_code['+row_index+']');

        //html_data.find('.label-size').html("Taille "+row_index);
        
        html_data.find('.size_input_quantity input').attr('name','quantities_size['+row_index+']').attr('placeholder', 'quantité pour taille '+row_index);
        
        html_data.find('.button :button').removeClass('btn-primary add_size_input').addClass('btn-danger remove_size_input').text('Annuler ce produit');
        
        html_data.find('.product_name select').select2({
            data : product_is_active
        });
        
        $(html_data).hide().appendTo("#size_list_input").animate({height: 'toggle'}, 500);
        $('.select2-container').css('width', '100%');
    });

    $document.on('change.select2','.product_name select',function (e){
        var product_id = $(this).val();
        $.ajax({
            url: base_url + 'fr/merchant/product/get-product-for-encasement',
            type: 'GET',
            dataType: 'json',
            data: {product_id: product_id},
        })
        .done(function(data) {
            console.log(data);
        })
        .fail(function(xhr, options) {
            console.log(xhr.responseText);
        });
        
    });

    $('.select-product-name').change(function(event) {
        var product_id = $(this).val();
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

function change_product(e){
    var data = e.params.data;
    console.log("Valeur");
    console.log(data);
}