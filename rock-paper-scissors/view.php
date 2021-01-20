<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Casino royale - rock, paper, scissors</title>
</head>

<body>
    <div class="border p-6" id="game">
        <form method="post">
            <ul>
                <li><input type="checkbox" name="game" value="scissors" id="myCheckbox1" /><label for="myCheckbox1"><img src="images/scissors.png" /></label></li>
                <li><input type="checkbox" name="game" value="paper" id="myCheckbox2" /><label for="myCheckbox2"><img src="images/paper.png" /></label></li>
                <li><input type="checkbox" name="game" value="rock" id="myCheckbox3" /><label for="myCheckbox3"><img src="images/rock.png" /></label></li>
            </ul>
            <br><br>
            <div class="place-self-center m-4" id="buttons">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="syubmit" name="fight">FIGHT!</button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" name="reset">Reset the game</button>
            </div>
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
            <br><br>
            Your score: <?php if (isset($_POST["fight"])) {
                            echo $_SESSION['playerScore'];
                        }
                        ?>
            <br><br>
            Opponents score: <?php if (isset($_POST["fight"])) {
                                    echo $_SESSION['opponentScore'];
                                }
                                ?>

        </p>
    </div>
</body>

</html>