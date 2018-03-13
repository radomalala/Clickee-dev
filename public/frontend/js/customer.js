jQuery(document).ready(function () {

    var $document = jQuery(document);

     $document.on('click','.add_size_input',function (){
        console.log("On doit ajouter des autres");
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

}