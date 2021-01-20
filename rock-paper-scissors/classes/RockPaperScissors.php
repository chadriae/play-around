<?php

class RockPaperScissors
{
    public $result;
    public $playerScore;
    public $opponentScore;
    public $choices = array("rock", "paper", "scissors");

    public function __construct()
    {
        if (!empty($_SESSION["playerScore"])) {
            $this->playerScore = $_SESSION["playerScore"];
        }

        if (!empty($_SESSION["opponentScore"])) {
            $this->opponentScore = $_SESSION["opponentScore"];
        }
    }

    public function run()
    {
        // This function functions as your game "engine"
        // Now it's on to you to take the steering wheel and determine how it will work
        // $_SESSION['playerScore'] = $this->playerScore;
        // $_SESSION['opponentScore'] = $this->opponentScore;

        if (isset($_POST["game"])) {
            if ($_POST["game"] == "scissors") {
                if ($this->opponent() == "scissors") {
                    $this->draw();
                } elseif ($this->opponent() == "paper") {
                    $this->youWin();
                } elseif ($this->opponent() == "rock") {
                    $this->youLose();
                }
            }
            if ($_POST["game"] == "rock") {
                if ($this->opponent() == "scissors") {
                    $this->youWin();
                } elseif ($this->opponent() == "paper") {
                    $this->youLose();
                } elseif ($this->opponent() == "rock") {
                    $this->draw();
                }
            }
            if ($_POST["game"] == "paper") {
                if ($this->opponent() == "scissors") {
                    $this->youLose();
                } elseif ($this->opponent() == "paper") {
                    $this->draw();
                } elseif ($this->opponent() == "rock") {
                    $this->youWin();
                }
            }
        }

        if (isset($_POST['reset'])) {
            $this->reset();
        }
    }

    public function opponent()
    {
        return $this->choices[array_rand($this->choices)];
    }

    public function youWin()
    {
        $this->result = "Well done, you win! This time...";
        $_SESSION['playerScore']++;
    }

    public function youLose()
    {
        $this->result = "Too bad. You lose.";
        $_SESSION['opponentScore']++;
    }

    public function draw()
    {
        $this->result = "You're lucky, it's a draw.";
    }

    public function reset()
    {
        $_SESSION["playerScore"] = 0;
        $_SESSION["opponentScore"] = 0;
    }
}
