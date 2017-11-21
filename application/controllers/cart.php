<?php
class Cart 
{
    public function index()
    {
        require APP . 'models/cart.php';
        
        $Product = new CartModel();
        $cart = $Product->getCartProducts();

        require APP . 'views/_templates/header.php';
        require APP . 'views/cart/index.php';
        require APP . 'views/_templates/footer.php';
    }

    public function add($productId)
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);

        require APP . 'models/product.php';
        require APP . 'models/cart.php';
        
        $Product = new ProductModel();
        $p = $Product->getProductById($productId);

        $Cart = new CartModel();
        $Cart->addToCart($p);
    }

    public function clear()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);

        require APP . 'models/cart.php';
        $Cart = new CartModel();
        $Cart->clearAll();
    }

    public function cartjson()
    {
        header('Content-Type: application/json');
        require APP . 'models/cart.php';
        
        $Product = new CartModel();

        $productsTotal = $Product->getCartItemsTotal();
        $priceTotal = $Product->getCartPriceTotal();
        
        $data = ["price" => $priceTotal, "products" => $productsTotal];

        echo json_encode($data);
    }

    public function order()
    {
        header('Location: /home');
        require APP . 'views/_templates/header.php';
        require APP . 'views/_templates/footer.php';
        require APP . 'models/cart.php';
        require APP . 'views/cart/index.php';

        $Product = new CartModel();
        $cart = $Product->getCartProducts();
        $priceTotal = $Product->getCartPriceTotal();

        // Create confirmation mail
        $to      = strip_tags($_SESSION['username']);
        $subject = 'Your order confirmation on mmbooks.press';

        $message = '<html><body>';
        $message .= '<table>
                        <thead align="left" style="display: table-header-group">
                          <tr>
                             <th>Num </th>
                             <th>Name</th>
                             <th>Price</th>
                             <th>Category</th>
                          </tr>
                          </thead><tbody>';
        foreach ($cart as $rows){
        $message .= '<tr class="item_row">
                         <td>'. $rows->id . '</td>
                         <td>'. $rows->name . '</td>
                         <td>'. $rows->price . '</td>
                         <td>'. $rows->category . '</td>
                     </tr>';
        }
        $message .= '</tbody></table>';
        $message .= '<h3>Total: </h3>' . $priceTotal;
        $message .= '<h2>Your delivery option: </h2>' . $_POST['shipment'];
        $message .= '</body></html>';
        $headers = 'To:' . $_SESSION['username'] . "\r\n" .
            'From: webmaster@mmbooks.press' . "\r\n" .
            'Reply-To: webmaster@mmbooks.press' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-Type: text/html; charset=UTF-8' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        // Send mail
        mail($to, $subject, $message, $headers);
    }

    public function shipment()
    {
        require APP . 'models/cart.php';
        $Product = new CartModel();
        $cart = $Product->getCartProducts();

        require APP . 'views/_templates/header.php';
        require APP . 'views/cart/shipment.php';
        require APP . 'views/_templates/footer.php';
    }

}
