/*wishlist add*/
    function addwishlist(idP,idU){
        console.log("Id product : "+ idP);
        var w_class = '.w' + idP;
        var wG_class = '.wG' + idP;
        /*var url = 'wishlist/' + id_product;*/
        if ($(wG_class).hasClass('coeur_gm') || $(w_class).hasClass('coeur_pm')) {
            var urlid = base_url + language_code + '/wishlist/findid/' + idP +'§'+ idU;
            /*var urlid = 'wishlist/findid/' + idP +'§'+ idU;*/ /*si local*/
            
            $.ajax({
            type: 'GET',
            url: urlid,
            data   : "",
            beforeSend: function () {
                $.LoadingOverlay("show", {'size': "10%", 'zIndex': 9999});
            },
            success: function (response, status) { 
                console.log("Toute response : "+response);
                console.log(response[1]);
                var urld = base_url + language_code + '/wishlist/remove/' + response[1];
                /*var urld = 'wishlist/remove/' + response[1];*/ /*si local*/

                $.ajax({
                    type: 'GET',
                    url: urld,
                    data   : "",
                    beforeSend: function () {
                        $.LoadingOverlay("show", {'size': "10%", 'zIndex': 9999});
                    },
                    success: function (response, status) { 

                        $(w_class).removeClass('coeur_pm');
                        $(wG_class).removeClass('coeur_gm');                        
                        /*$(".img_wishlist").attr("src",base_url + 'images/coeur_orange_pleine.svg');*/
                        $(".icon-heart").css('background-position-y','-36px');
                        $('.sell_coeur').html(response[1]);                 
                        $.LoadingOverlay("hide");
                    },
                    error: function (xhr){
                        console.log(xhr.responseText);
                    },
                });
                                 
                $.LoadingOverlay("hide");
            },
            error: function (xhr){
                console.log(xhr.responseText);
            },
        });        

        }else{
            var url = base_url + language_code + '/wishlist/' + idP;
            /*var url = 'wishlist/' + idP;*/ /*si local*/            
            $.ajax({
                type: 'GET',
                url: url,
                data   : "",
                beforeSend: function () {
                    $.LoadingOverlay("show", {'size': "10%", 'zIndex': 9999});
                },
                success: function (response, status) { 

                    $(w_class).addClass('coeur_pm');
                    $(wG_class).addClass('coeur_gm');
                    /*$(".img_wishlist").attr("src",base_url + 'images/coeur_orange_pleine.svg');*/
                    $(".icon-heart").css('background-position-y','-36px');
                    
                    $('.sell_coeur').html(response[1]);                 
                    $.LoadingOverlay("hide");
                },
                error: function (xhr){
                    console.log(xhr.responseText);
                },
            });
        }
        
    }
    
/*end wishlist add*/ 
