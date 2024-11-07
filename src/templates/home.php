<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        .Header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-inline: 15px;
        }

        .Button-Wrapper {
            display: flex;
            width: 7%;
            justify-content: space-between;
        }

        .Products {
            display: flex;
            flex-direction: row;
        }

        .Products-Pod {
            border: 1px solid red;
margin-inline-end: 10px;
padding: 10px;
        }
    </style>
</head>

<body>
    <div class="Header">
        <h1 class="Header-Title"><?php echo $title; ?></h1>
        <div class="Button-Wrapper">
            <button class="Button-Add">ADD</button>
            <button id="delete-product-btn" class="Button-Delete">MASS DELETE</button>
        </div>
    </div>
    <hr>
    <div class="Products"><?php
                            foreach ($content as $value) {
                                echo "<div class='Products-Pod'>";
                                echo '<input type="checkbox"/>';
                                echo "</br>";
                                echo 'sku: ' . $value['sku'];
                                echo "</br>";
                                echo 'name: ' . $value['name'];
                                echo "</br>";
                                echo 'price: ' . $value['price'];
                                echo "</br>";
                                echo "</div>";
                            } ?></div>
</body>

</html>
