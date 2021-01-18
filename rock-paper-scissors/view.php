<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Casino royale - rock, paper, scissors</title>
</head>

<body>
    <form method="post">
        <label><input type="checkbox" name="game" value="scissors" />Scissors</label>
        <label><input type="checkbox" name="game" value="paper" />Paper</label>
        <label><input type="checkbox" name="game" value="rock" />Rock</label>
        <br><br>
        <button type="submit" name="fight">FIGHT!</button>
    </form>

    <p class="result">
        You just chose: <?php if (isset($_POST["fight"])) {
                            echo $_POST["game"];
                        }
                        ?>
        <br><br>
        Your opponent drew: <?php if (isset($_POST["fight"])) {
                                echo $game->opponent();
                            }
                            ?>
        <br><br>
        Result is: <?php if (isset($_POST["fight"])) {
                        echo $game->result;
                    }
                    ?>
    </p>
</body>

</html>