<?php

class RockPaperScissors
{
    public $choices = array("rock", "paper", "scissors");
    public $result;

    public function run()
    {
        // This function functions as your game "engine"
        // Now it's on to you to take the steering wheel and determine how it will work

        if (isset($_POST["game"])) {
            if ($_POST["game"] == $this->opponent()) {
                $this->draw();
            } elseif ($_POST["game"] == "scissors" && $this->opponent() == "paper") {
                $this->youWin();
            } elseif ($_POST["game"] == "rock" && $this->opponent() == "scissors") {
                $this->youWin();
            } elseif ($_POST["game"] == "paper" && $this->opponent() == "rock") {
                $this->youWin();
            } else {
                $this->youLose();
            }
        }
    }

    public function opponent()
    {
        return $this->choices[array_rand($this->choices)];
    }

    public function youWin()
    {
        $this->result = "Well done, you win! This time...";
    }

    public function youLose()
    {
        $this->result = "Too bad. You lose.";
    }

    public function draw()
    {
        $this->result = "You're lucky, it's a draw.";
    }
}
