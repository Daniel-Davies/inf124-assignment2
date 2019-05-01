<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Clothes Store</title>
    <meta name="description" content="My clothes store">
    <link href="https://fonts.googleapis.com/css?family=Eczar:400,500" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

</head>


<body>
    <script src="scripts.js"></script>
    <header class='header'>
        <h3 class='title' style='width: 40vh; line-height: 1em;'>Stryeet Wear</br>
        <span style='font-size: 15px !important;'>by Daniel Davies and William Khaine</span></h3>
        <ul>
            <li><a href='./about.html' class='visiting'>About</a></li>
            <li><a href='./index.html'>Products</a></li>
        </ul>
    </header>
    <br/>
    
    <?php
    if( $_GET["id"]) {
        $servername = "localhost";
            $user = "root";
            $pass = "Danio123";
            $dbname = "inf124";
            
            // Create connection
            $pdo=new PDO('mysql:host=localhost;dbname=inf124',$user,$pass);
            
            $stmt = $pdo->query("SELECT * FROM products P WHERE P.pid=".$_GET["id"]);
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                echo ("<div class='flex-container'><div style='padding: 0.5vw; border: 2px solid black;'><h1 id='desc' style='font-size: 2rem;'>Showing information for: ".$row["name"]."</h1><p id='id'>Product ID:".$row["pid"]."</p><div class='flex-container'><img id='imgs' style='width:15vw; height: 15vw;' src='".$row["img"]."'/></div></div></div>");
            }
    }   
    ?>

    <form action='save.php' onsubmit='return validate(this)' class="flex-container" method='post'>
        <div class="form_holder">
            <input name="product-id" id="product-id" type="hidden">
            <input name="product-name" id="product-name" type="hidden">
            <input name="product-img" id="product-img" type="hidden">

            <h1>Order this item</h1>
            <label for='quantity'>Quantity*</label>
            </br>
            <input required type='number' name='quantity' id='quantity' min='1'>
            </br>
            <h2>Personal Information</h2>
            <label for='first-name'>First Name*</label>
            </br>
            <input required type='text' name='first-name' id='first-name'>
            </br>
            <label for='last-name'>Last Name*</label>
            </br>
            <input required type='text' name='last-name' id='last-name'>
            </br>
            <label for='suffix'>Suffix</label>
            </br>
            <input type='text' name='suffix' id='suffix'>
            </br>
            <label for='phone-number'>Phone Number</label>
            </br>
            <input type='tel' name='phone-number' id='phone-number' pattern='^\([0-9]{3}\) [0-9]{3}-[0-9]{4}' placeholder='e.x. (123)-456-7890'>
            </br>
            <label for="zip">zip*</label>
            </br>
            <input required type='text' name='zip' id='zip' placeholder='92612' onblur='getPlace(this.value)'/>
            <br/>
            <label for="region">Region*</label>
            </br>
            <input required type='text' name='region' id='region' placeholder='Irvine'>
            <br/>
            <label for=shipping-address>Shipping Address*</label>
            </br>
            <input required type='text' name='shipping-address' id='shipping-address' placeholder='e.x. 1234 Main St., Irvine, CA 92612'>
            </br>
            <h2>Billing Information</h2>
            <label for='credit-card-number'>Credit Card Number*</label>
            </br>
            <input required type='text' name='credit-card-number' id='credit-card-number'>
            </br>
            <label for='cvv'>Card Verification Value (CVV)*</label>
            </br>
            <input required type='text' name='card-verification-value' id='cvv'>
            </br>
            <label for='billing-address'>Billing Address*</label>
            </br>
            <input required type='text' name='billing-address' id='billing-address' placeholder='e.x. 1234 Main St., Irvine, CA 92612'>
            </br>
            <label for='delivery-method'>Shipping Information*</label>
            </br>
            <select name='delivery-method' id='delivery-method'>
                <option value='Standard'>Standard</option>
                <option value='Express'>Express</option>
                <option value='Overnight'>Overnight</option>
            </select>
            </br>
            <h3 for='billing-address'>Total Price: $30</h3>
            </br>
            <span class='required_notifier'>*Required</span>
            </br>
            <input type='submit' value='Order Using Email' class='button'>
            <input type='reset' class='button'>
        </div>
    </form>
    <div class="flex-container footer">
        <div>
            <p>
                <span>Phone Number</span>
                <span>(949) 123-4567</span>
            </p>
        </div>
        <div>
            <p>
                <span>Email</span>
                <span>
                    <a href='mailto:wkhaine@uci.edu'>stryeetwear@gmail.com</a>
                </span>
            </p>
        </div>
        <div>
            <p>
                <span>Address</span>
                <span>1234 Fake Address Rd.</span>
                <span>Irvine, CA 92321</span>
            </p>
        </div>
    </div>
    <script>
        insertIdentifierIntoOrderForm()

        function getPlace(zip) {
            var xhr = new XMLHttpRequest(); 
            xhr.onreadystatechange = function () 
            { 
                // 4 means finished, and 200 means okay.
                if (xhr.readyState == 4 && xhr.status == 200) 
                {
                    var result = xhr.responseText;
                    document.getElementById("region").value=result;
                }
            }
            xhr.open("GET", "getDistrict.php?zip=" + zip, true);
            xhr.send();
        }

    </script>
</body>

</html>