jQuery(document).ready(function () {

    var $document = $(document);

    $('#add-product').click(function (e) {

        $('#product_form').validate({
            rules:{
            },
            invalidHandler: function(e, validator){
                if(validator.errorList.length)
                    $('#myTab a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show')
            },
            errorPlacement: function (error, element) {
                var element_id = element.attr("id");
                if (element_id == "fileInput") {
                    return error.insertAfter(element.parent().parent().parent());
                }
                else if(element_id == "alphabet_letter"){
                    return error.insertAfter(element.next());
                }
                else {
                    return error.insertAfter(element);
                }
            }
        });
        if ($('#product_form').valid()) {

             for (instance in CKEDITOR.instances) {
                 CKEDITOR.instances[instance].updateElement();
             }
            e.preventDefault();
            $('#product_form').ajaxSubmit(function (data) {
                window.open(base_url+data.url.target_url,'_blank');
                location.href=base_url+"admin/product";
            });

            // $('#product_form').submit();
        }
    });


    if (jQuery('#product_list').length > 0) {
            jQuery('#product_list').on('xhr.dt', function ( e, settings, json, xhr ) {
                    console.log(xhr.responseText);
                })
                .DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": base_url+"merchant/product/get-data",
                "responsive"   : true,
                "bPaginate"    : true,
                "bLengthChange": true,
                "bFilter"      : true,
                "bInfo"        : true,
                "bAutoWidth"   : false,
                "lengthMenu"   : [20, 40, 60, 80, 100],
                "pageLength"   : 20,
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
                columns        : [
                    {data: 'product_name', name:'product_name',searchable: true, sortable: true},
                    {data: 'serial_number', name:'serial_number',searchable: true, sortable: true},
                    {data: 'product_category', name:'product_category',searchable: true, sortable: true},
                    {data: 'brand', name:'brand',searchable: true, sortable: true},
                    {data: 'action', name:'action',searchable: false, sortable: false}
                ],
                fnDrawCallback : function () {
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


    if (jQuery('.dataTables_filter').length > 0) {
        jQuery('.dataTables_filter').find('input').addClass('form-control')
    }
   
 
    if ($("#category").length > 0) {
        var selected_categories = $.parseJSON(selected_category);
        $("#category").dynatree({
            checkbox: true,
            selectMode: 2,
            children: $.parseJSON(category_tree_data),
            onSelect: function (select, node) {
                // Display list of selected nodes
                var selNodes = node.tree.getSelectedNodes();
                var selected_category = $.map(selNodes, function (node) {
                    return node.data.key;
                });
                $("#category_id").val(selected_category.join(", "));
            },
            onClick: function (node, event) {
                // We should not toggle, if target was "checkbox", because this
                // would result in double-toggle (i.e. no toggle)
                if (node.getEventTargetType(event) == "title")
                    node.toggleSelect();
            },
            onKeydown: function (node, event) {
                if (event.which == 32) {
                    node.toggleSelect();
                    return false;
                }
            }
        });
        $("#category").dynatree("getRoot").visit(function (node) {
            node.expand(false);
        });
        console.log(selected_categories);
        $("#category").dynatree("getRoot").visit(function (node) {
            if ($.inArray(parseInt(node.data.key), selected_categories) !== -1) {
                node.select(true);
            }
        });
    }
    

    $document.on('click','.add_size_input',function (){
        var row_count = parseInt($('.size_input_row:last').attr('id'));
        var attribute_type = $(".attribute_type_list").val();
        var row_index = row_count + 1;
        var input_type = $document.find('#input_type :selected').val();

        var html_data = $document.find('.master-input-size-container').clone();
        html_data.removeClass('master-input-size-container hidden').prop('id',row_index);
        html_data.find('.order_data');
        html_data.find('.size_input input').attr('name','sizes['+row_index+']').attr('placeholder', 'Taille '+ row_index);
        html_data.find('.label-size').html("Taille "+row_index);
        html_data.find('.size_input_quantity input').attr('name','quantities_size['+row_index+']').attr('placeholder', 'quantité pour taille '+row_index);
        html_data.find('.button :button').removeClass('btn-primary add_size_input').addClass('btn-danger remove_size_input').text('x');
        $(html_data).hide().appendTo("#size_list_input").animate({
            height: 'toggle'
        }, 500);
    });

    $document.on('click','.remove_size_input',function () {
       $(this).parents('.form-group').remove();
    });

    $document.on('click','.add_color_input',function (){
        var row_count = parseInt($('.color_input_row:last').attr('id'));
        var attribute_type = $(".attribute_type_list").val();
        var row_index = row_count + 1;
        var input_type = $document.find('#input_type :selected').val();

        var html_data = $document.find('.master-input-color-container').clone();
        html_data.removeClass('master-input-color-container hidden').prop('id',row_index);
        html_data.find('.order_data');
        html_data.find('.color_input input').attr('name','colors['+row_index+']').attr('placeholder', 'Couleur '+ row_index);
        html_data.find('.label-color').html("Couleur "+row_index);
        html_data.find('.color_input_quantity input').attr('name','quantities_color['+row_index+']').attr('placeholder', 'quantité pour couleur '+row_index);
        html_data.find('.button :button').removeClass('btn-primary add_color_input').addClass('btn-danger remove_color_input').text('x');
        $(html_data).hide().appendTo("#color_list_input").animate({
            height: 'toggle'
        }, 500);
    });

    $document.on('click','.remove_color_input',function () {
       $(this).parents('.form-group').remove();
    });
    //Hide and show the column into datatable on product
    var table = $('#product_list').DataTable();

});
