<?php $sitename = "Support" ?>
<?php require_once ('header.php') ?>

Products

<?php
    $query_string = mb_convert_encoding($_SERVER["QUERY_STRING"], 'UTF-8');
    $selected_category = preg_split("/=/", $query_string);
    $products=Array
    (
    (0) => Array
        (
            (title) => 'Harry Potter - Und das verwunschene Kind',
            (author) => 'J.K.Rowling',
            (category) => 'sci-fi_and_fantasy',
            (price) => '58.99'
        ),

    (1) => Array
        (
            (title) => 'Bauernleben',
            (author) => 'Marco Schmid',
            (category) => 'art_and_photography',
            (price) => '12.80'
        ),

    (2) => Array
        (
            (title) => 'Weinkompass',
            (author) => 'Marc Christen',
            (category) => 'food_and_wine',
            (price) => '18.80'
        ),
    (3) => Array
        (
            (title) => '2. Weltkrieg',
            (author) => 'Winston Churchill',
            (category) => 'history',
            (price) => '10.50'
        ),
    (4) => Array
        (
            (title) => 'Mind Control',
            (author) => 'Stephen King',
            (category) => 'literature_and_fiction',
            (price) => '16.30'
        ),
    (5) => Array
        (
            (title) => 'Java ist auch eine Insel',
            (author) => 'Java Guru',
            (category) => 'technology',
            (price) => '35.50'
        ),
    (6) => Array
        (
            (title) => 'PHP 7',
            (author) => 'PHP Guru',
            (category) => 'technology',
            (price) => '25.50'
        )
    );

    function in_array_r($item , $array){
        return preg_match('/"'.$item.'"/i' , json_encode($array));
    }

    echo "<br>";
    echo $selected_category[1];
    echo "<br>";
    # echo in_array_r($selected_category[1], $products) ? 'found' : 'not found'; 
    foreach ($products as $book) {
        foreach ($book as $category) {
            if (in_array_r($selected_category[1], $category)) {
                echo json_encode($book);
            }
        }
    }
?>

<?php require_once ('footer.php') ?>
