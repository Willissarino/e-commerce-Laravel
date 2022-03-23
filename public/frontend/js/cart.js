$(document).ready(function() {

    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var max_value = $(this).closest('.product_data').find('.max_product_qty').val();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, max_value); //Max 5 item
        value = isNaN(value) ? 0 : value;
        if (value < max_value) 
        {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10); //10 item to be decrement
        value = isNaN(value) ? 0 : value;
        if (value > 1) 
        {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.delete-cart-item').click(function(e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success: function(response) {
                window.location.reload(); //refresh page

                Swal.fire({
                    title: response.status,
                    toast: true,
                    icon: response.status_type,
                    showConfirmButton: false,
                    position: 'top-right',
                    timer: 3000,
                    timerProgressBar: true,
                })
            }
        });

    });

    $('.changeQty').click(function (e) { 
        e.preventDefault();
        
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty' : qty,
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });

    });
});