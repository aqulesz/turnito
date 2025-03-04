<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>turnito</title>
    <style>

        body {
            display: grid;
            place-items: center;
            height: 100vh;
            font-family: sans-serif;
        }

    </style>
</head>
<body>
    <?php 
    
        $days = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

        $hours = [];
        $startTime = strtotime('9 am');
        $endTime   = strtotime('10 pm');

        while($endTime >= $startTime){
            $hours[] = date("h:ia", $startTime);
            $startTime = strtotime('+30 minutes', $startTime);
        }


        
    ?>

    <h2>Seleccione un dia y hora</h2>
    <form action="" method="post" >
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname"><br><br>
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname"><br><br>

        <select name="select">
             <?php
                foreach ($days as $day) {
                echo "<option name='day' value='$day'>$day</option>";
                }
            ?>
        </select>

        <select name="select">
            <?php
                foreach ($hours as $hour) {
                echo "<option name='hour' value='$hour'>$hour</option>";
                }
            ?>
        </select>

        <input type="submit" value="Submit">
</form>
<?php 



$data=array();

if(!isset($_SESSION['data'])){
 $_SESSION['data'] = array();
}

if (isset($_POST)) {
  $_SESSION['data'][] = $_POST['fname']; 
  $_SESSION['data'][] = $_POST['lname'];
  $_SESSION['data'][] = $_POST['day']; 
  $_SESSION['data'][] = $_POST['hour']; 
}

?>

<?php 
    foreach ($data[0] as $data) {
    echo "<p>$data</p>";
} ?>

</body>
</html>