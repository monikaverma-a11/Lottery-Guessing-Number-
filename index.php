<?php

$message = false;
$generated = [];
$userNumbers = [];
$matching = [];

if (isset($_POST['check'])) {

    $userNumbers = [
        (int)$_POST['num1'],
        (int)$_POST['num2'],
        (int)$_POST['num3'],
        (int)$_POST['num4'],
        (int)$_POST['num5'],
        (int)$_POST['num6']
    ];

    // Generate 6 different numbers
    while (count($generated) < 6) {
        $n = rand(1, 50);

        if (!in_array($n, $generated)) {
            $generated[] = $n;
        }
    }

    // Find matching numbers
    foreach ($userNumbers as $number) {
        if (in_array($number, $generated) && !in_array($number, $matching)) {
            $matching[] = $number;
        }
    }

    $message = true;
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Number Matching Game</title>

<style>

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f3f5f7;
}

.container {
    width: 90%;
    margin: 40px auto;
}

.box {
    background: white;
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 2px 8px #ccc;
}

h1 {
    text-align: center;
    color: #173b72;
    font-size: 40px;
}

h2 {
    text-align: center;
    color: green;
    font-size: 28px;
}

.inputs {
    display: flex;
    gap: 30px;
    justify-content: center;
    margin: 25px 0 40px;
}

input {
    width: 130px;
    height: 55px;
    text-align: center;
    font-size: 22px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

button {
    display: block;
    margin: auto;
    padding: 18px 45px;
    background: #123b78;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 22px;
}

.result {
    margin-top: 40px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 8px #ccc;
}

.result h2 {
    background: #eaf7e6;
    padding: 25px;
    margin: 0;
}

.row {
    padding: 22px 45px;
    border-top: 1px solid #ddd;
    font-size: 23px;
}

.label {
    color: #174384;
    font-weight: bold;
}

.value {
    color: green;
    font-weight: bold;
}

</style>

</head>

<body>

<div class="container">

<div class="box">

<h1>Number Matching Game</h1>

<h2>Enter 6 Numbers</h2>

<form method="post">

<div class="inputs">

<input type="number" name="num1" value="5" required>
<input type="number" name="num2" value="12" required>
<input type="number" name="num3" value="18" required>
<input type="number" name="num4" value="25" required>
<input type="number" name="num5" value="30" required>
<input type="number" name="num6" value="45" required>

</div>

<button type="submit" name="check">
Check Numbers
</button>

</form>

</div>


<?php if ($message): ?>

<div class="result">

<h2>Matching Result</h2>

<div class="row">
<span class="label">Generated Numbers:</span>
<span class="value">
<?php echo implode(", ", $generated); ?>
</span>
</div>

<div class="row">
<span class="label">Your Numbers:</span>
<?php echo implode(", ", $userNumbers); ?>
</div>

<div class="row">
<span class="label">Matching Numbers:</span>
<span class="value">
<?php
if (count($matching) > 0) {
    echo implode(", ", $matching);
} else {
    echo "No matches";
}
?>
</span>
</div>

<div class="row">
<span class="label">Total Matches:</span>
<span class="value">
<?php echo count($matching); ?>
</span>
</div>

</div>

<?php endif; ?>

</div>

</body>
</html>