<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>KMI skaičiuoklė</title>
</head>

<body>
    <h1>KMI skaičiuoklė</h1>
    <p>Į lentelę įveskite duomenis</p>
    <form action="" method="POST">
        <fieldset>
            <legend>KMI skaičiuotuvas</legend>
            <label for="height">Jūsų ūgis (metrais, pvz.: 1.68)*:</label>
            <input type="number" id="height" name="height" value="<?php if (isset($_POST['height'])) {
                                                                        print($_POST['height']);
                                                                    } else {
                                                                        print 1.68;
                                                                    } ?>" min="0.01" max="3" step="0.01" required><span>m</span><br><br>
            <label for="weight">Jūsų svoris (kilogramais, pvz.: 50)*:</label>
            <input type="number" id="weight" name="weight" value="<?php if (isset($_POST['weight'])) {
                                                                        print($_POST['weight']);
                                                                    } else {
                                                                        print 50;
                                                                    } ?>" min="1" max="500" step="1" required><span>kg</span><br><br>
            <input type="submit" value="Skaičiuoti">
        </fieldset>
    </form>

    <?php

    function bmiCalc($x, $y)
    {
        return round(($y / ($x * $x)), 2);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bmi = bmiCalc($_POST['height'], $_POST['weight']);
        print("<h2>Jūsų KMI yra <span style=\"text-decoration: underline\">${bmi}</h2>");
        if ($bmi >= 30) {
            print('<p style="color: red">Tai reiškia, jog Jūs esate nutukęs</p>');
        }
        if ($bmi < 30 && $bmi >= 25) {
            print('<p style="color: orange">Tai reiškia, jog Jūs turite antsvorį</p>');
        }
        if ($bmi < 25 && $bmi >= 18.5) {
            print('<p style="color: green">Tai reiškia, jog Jūsų svoris normalus</p>');
        }
        if ($bmi < 18.5) {
            print('<p style="color: red">Tai reiškia, jog Jūsų svoris nepakankamas</p>');
        }
    }

    ?>
</body>

</html>