<?php
$totalBricks = 0;
$totalOddBricks = 0;
$totalEvenBricks = 0;

if (isset($_GET['numberOfLayers'])) {
    for ($i = 1; $i <= $_GET['numberOfLayers']; $i++) {
        $totalBricks = $totalBricks + $i;

        if ($i % 2 == 0) {
            $totalEvenBricks = $totalEvenBricks + $i;
        } else {
            $totalOddBricks = $totalOddBricks + $i;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pyramid generator</title>

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-image: url('bg.png');
        }

        #content {
            padding: 1.5rem;
        }

        #generator-control-wrapper {
            background-color: white;
        }

        #header {
            background-color: purple;
            padding: 1.25rem;
            margin-bottom: .5rem;
            border-radius: .5rem;
        }

        #header h2 {
            margin: 0;
        }

        #main {
            display: flex;
            column-gap: 1.25rem;
        }

        #generator-control-wrapper {
            display: flex;
            row-gap: 1.25rem;
            flex-flow: column;
            padding: 1.25rem;
            min-width: 20%;
            height: fit-content;
        }

        #input-wrapper {
            display: flex;
            flex-flow: column;
        }

        #input-wrapper>input {
            padding: 0.5rem .25rem;
        }

        #input-wrapper>div {
            margin-top: .5rem;
            display: flex;
            column-gap: .25rem;
        }

        #input-wrapper>div>button {
            padding: .5rem 1.25rem;
            width: 50%;
        }

        #pyramid-info {
            display: flex;
            row-gap: .2rem;
            flex-flow: column;
        }

        #pyramid-info>span {
            display: flex;
            justify-content: space-between;
        }

        #pyramid-info>span>p {
            margin: 0;
        }

        #pyramid-output-wrapper {
            display: flex;
            flex-grow: 1;
            justify-content: center;
        }

        #pyramid-output-wrapper #rows {
            display: flex;
            justify-content: center;
            flex-flow: column;
        }


        .row {
            display: flex;
            margin: 0 auto;
        }

        .row>p {
            margin: 0;
            width: 3.25rem;
            border: 1px solid black;
            text-align: center;
        }

        .yellow {
            background-color: yellow !important;
        }

        .oddNumber {
            background-color: red;
        }

        .evenNumber {
            background-color: blue;
        }
    </style>
</head>

<body>
    <div id="content">

        <div id="header">
            <h2>Pyramid generator</h2>
        </div>

        <div id="main">
            <div id="generator-control-wrapper">
                <form id="input-wrapper" method="GET">
                    <label for="">Number of layers</label>
                    <input type="text" name="numberOfLayers">
                    <div>
                        <button type="submit" name="submit">Submit</button>
                        <button type="submit" name="clear">Clear</button>
                    </div>
                </form>
                <div id="pyramid-info">
                    <span>
                        <p>Total Bricks:</p>
                        <p><?= $totalBricks ?></p>
                    </span>
                    <span>
                        <p>Total Bricks [Odd Number]:</p>
                        <p><?= $totalOddBricks ?></p>
                    </span>
                    <span>
                        <p>Total Bricks [Even Number]:</p>
                        <p><?= $totalEvenBricks ?></p>
                    </span>
                </div>
            </div>

            <div id="pyramid-output-wrapper">
                <div id="rows">
                    <?php if (isset($_GET['numberOfLayers'])) : ?>
                        <?php for ($i = 1; $i <= $_GET['numberOfLayers']; $i++) : ?>
                            <div class="row <?= $i % 2 == 0 ? 'evenNumber' : 'oddNumber' ?>">
                                <?php for ($j = 1; $j <= $i; $j++) : ?>
                                    <?php $totalBricks++; ?>
                                    <p class="<?= $j == 1 || $j == $i ? 'yellow' : '' ?>"><?= $i ?></p>
                                <?php endfor ?>
                            </div>
                        <?php endfor ?>
                    <?php endif ?>
                </div>
            </div>


        </div>

    </div>
</body>

</html>