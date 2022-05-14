

$(document).ready(function() {
    $('#cart-priceid').change(function() {
        let price = $('option:selected', this).data('price');
        $('.price').text(price + '.00');
    })
})


