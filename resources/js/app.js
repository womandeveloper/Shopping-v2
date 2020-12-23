require('./bootstrap');

setTimeout(() => {
    $('.alert').slideUp(500);
}, 5000);

$('.product-piece-dec, .product-piece-inc').on('click', function(){
    let id = $(this).attr('data-id');
    let piece = $(this).attr('data-piece');
    console.log(id+piece);
    return;
    $.ajax({
        type: 'PATCH',
        url: '/cart/update/'+id,
        data: {piece: piece},
        success: function(){
            window.location.href = '/cart';
        }
    });
});
