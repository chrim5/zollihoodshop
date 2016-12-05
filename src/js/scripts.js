$.get( "cart/cartjson", function( data ) {
    $( "#cartprice" ).html( data.price );
    $( "#cartproducts" ).html( data.products );
});
