$(document).on('click' , '.manage-cart' , function() {

    var element = $(this);
    var type = element.attr('value');
    var form = element.parents('form');
    var url = form.attr('action');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        method: 'POST',
        data:{
            type : type
        },
        success: function(response) {
            var inCartDiv= form.children('.in-cart');
            var notInCartDiv= form.children('.not-in-cart');
            inCartDiv.show();
            notInCartDiv.hide();
            form.find('.cart-count').text(response.count);
            $('.cart > span').text(response.totalCount);
        }

    });
})