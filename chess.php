<?php
$chessFiguresW = array('♖', '♘', '♗', '♕', '♔', '♗', '♘', '♖');
$chessFiguresB = array('♜', '♞', '♝', '♛', '♚', '♝', '♞', '♜');
$letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
$num = array(8, 7, 6, 5, 4, 3, 2, 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            margin: 0 auto;
            width: 900px;
            height: 900px;
        }

        .blackFig {
            line-height: 100px;
            text-align: center;
            font-size: 60px;
            text-shadow: 1px 1px 2px yellow;

        }

        .whiteFig {
            line-height: 100px;
            text-align: center;
            font-size: 60px;
            text-shadow: 2px 2px 2px black;
            color: white;
        }

        .row {
            width: 100px;
            height: 100px;
            border: 1px solid black;
            margin: 0;
        }

        .wrap {
            width: 900px;
            height: 800px;
            display: flex;
            background-color: bisque;
        }

        .desk {
            width: 800px;
            height: 800px;
            display: inline-flex;
            flex-flow: row wrap;
            justify-content: space-between;

        }

        .leftBlock, .rightBlock {
            width: 50px;
            height: 800px;
            display: inline-flex;
            flex-direction: column;
        }

        .downBlock, .topBlock {
            width: 900px;
            height: 50px;
            background-color: bisque;
            display: flex;
        }

        .downBlock1, .downBlock3, .topBlock1, .topBlock3 {
            width: 50px;
            height: 50px;
            display: inline-flex;
        }

        .downBlock2, .topBlock2 {
            width: 800px;
            height: 50px;
            display: inline-flex;
            flex-direction: row;
        }

        .fieldNum {
            text-align: center;
            line-height: 100px;
            font-size: 20px;
            font-family: Verdana;

        }

        .fieldLetRow {
            line-height: 50px;
            width: 100px;
            text-align: center;
            font-size: 20px;
            font-family: Verdana;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="topBlock">
        <div class="topBlock1"></div>
        <div class="topBlock2">
            <?php for ($i = 0; $i < 8; $i++): ?>
                <div class="fieldLetRow"><?= $letters[$i] ?></div>
            <?php endfor; ?>
        </div>
        <div class="topBlock3"></div>
    </div>
    <div class="wrap">
        <div class="leftBlock">
            <?php for ($i = 0; $i < 8; $i++): ?>
                <div class="fieldNum"><?= $num[$i] ?></div>
            <?php endfor; ?>
        </div>
        <div class="desk">
            <?php for ($i = 0; $i < 8; $i++): ?>
                <?php for ($j = 0; $j < 8; $j++): ?>
                    <?php $color = $i % 2 === 0 ? ($j % 2 === 0 ? '#FFFFFF' : '#8B4513') : ($j % 2 === 0 ? '#8B4513' : '#FFFFFF') ?>
                    <div class="row" style=" background-color: <?=$color?>">
                        <?php switch ($i) {
                            case 0:
                                $classFig = "blackFig";
                                $fig = $chessFiguresB[$j];
                                break;
                            case 1:
                                $classFig = "blackFig";
                                $fig = ♟;
                                break;
                            case 6:
                                $classFig = "whiteFig";
                                $fig = ♙;
                                break;
                            case 7:
                                $classFig = "whiteFig";
                                $fig = $chessFiguresW[$j];
                                break;
                            case 2:
                            case 3:
                            case 4:
                            case 5:
                                $classFig = "";
                                $fig = "";
                                break;
                        }
                        ?>
                        <div class="<?= $classFig ?>"><?= $fig ?></div>
                    </div>
                <?php endfor; ?>
            <?php endfor; ?>
        </div>
        <div class="rightBlock">
            <?php for ($i = 0; $i < 8; $i++): ?>
                <div class="fieldNum"><?= $num[$i] ?></div>
            <?php endfor; ?>
        </div>
    </div>
    <div class="downBlock">
        <div class="downBlock1"></div>
        <div class="downBlock2">
            <?php for ($i = 0; $i < 8; $i++): ?>
                <div class="fieldLetRow"><?= $letters[$i] ?></div>
            <?php endfor; ?>
        </div>
        <div class="downBlock3"></div>
    </div>
</body>
</html>






