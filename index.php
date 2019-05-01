<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Clothes Store</title>
    <meta name="description" content="My clothes store main page">
    <link href="https://fonts.googleapis.com/css?family=Eczar:400,500" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">


    <style>
        select {
            height: 4vh;
            width: 10vw;
        }

        tr {
            cursor: pointer;
        }
    </style>
</head>


<body>
    <header class='header'>
        <h3 class='title' style='width: 40vh; line-height: 1em;'>Stryeet Wear</br>
        <span style='font-size: 15px;'>by Daniel Davies and William Khaine</span></h3>
        <ul>
            <li><a href='./about.html' class='visiting'>About</a></li>
            <li><a href='./index.html'>Products</a></li>
        </ul>
    </header>
    <div class="flex-container">
        <h1>Products</h1>
    </div>
    <div class="flex-container">
        <em>
            <h4>Choose from our clothing collection below. Once you have made your choice, click on a table row for purchase
                information.
            </h4>
        </em>

    </div>

    <div class="flex-container">

        <table id="customers">
            <tr>
                <th>Product Details</th>
                <th>Product Image</th>
            </tr>
            <?php
            $servername = "localhost";
            $user = "root";
            $pass = "Danio123";
            $dbname = "inf124";
            
            // Create connection
            $pdo=new PDO('mysql:host=localhost;dbname=inf124',$user,$pass);
            
            $stmt = $pdo->query("SELECT * FROM products");
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                echo ("<tr><td><div class='flex-container'><h1 class='namebox' style='margin: 0%;'>".$row['name']."</h1></div><div class='flex-container' style='margin: 0%'><h3 class='namebox' style='margin: 0%'>$".$row['cost']."</h3></div><div style='display: flex; justify-content: start;'><p><b><em>Product ID</em></b>:<u class='idbox'>".$row['pid']."</u></p></div><div style='display: flex; justify-content: start;'><p>".$row['description']."</p></div><div class='flex-container'><h2>Select your color:</h2></div><div class='flex-container'><select onclick='event.stopPropagation();'><option value='Red'>Red</option><option value='White'>White</option><option value='Blue'>Blue</option></select></div></td><td class='cover'><img class='cover' src='".$row['img']."' /></td></tr>");
            }?>
            
        </table>
    </div>
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




    <script src="scripts.js"></script>
    <script>addRowHandlers()</script>
</body>

</html>