$.get( "cart/cartjson", function( data ) {
    $( "#cartprice" ).html( data.price + ".- CHF" );
    $( "#cartproducts" ).html( data.products );
});
