<html>
<head>
    <title>Age Calculation</title>
    <style>
        * {
            font-family: calibri;
        }
    </style>
</head>
<body>
    <h1>Age Calculation</h1>
    <?php
    if (!isset($_POST['sub'])) {
        ?>
        <form action="Age calculation.php" method="post">
            <h3>Enter Your Date Of Birth in the Format of mm/dd/yyyy</h3>
            <input type="text" name="dob"><br><br>
            <input type="submit" name="sub">
        </form>
        <?php
    } else {
        $date = explode('/', $_POST['dob']);
        $datest = strtotime($_POST['dob']); // Entered date is stored in this variable
        $now = strtotime('today');
        if (sizeof($date) != 3) {
            die("Enter Valid Date Of Birth");
        }
        if (!checkdate($date[0], $date[1], $date[2])) {
            die("Enter Valid Date Of Birth");
        }
        if ($datest >= $now) {
            die('Enter Date of Birth earlier than today');
        }
        $days = floor(($now - $datest) / 86400);
        $years = floor($days / 365);
        $months = floor(($days - ($years * 365)) / 30);
        echo "You are $years years and $months months old";
    }
    ?>
</body>
</html>