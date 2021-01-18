<?php

class GuessingGame
{
    public $maxGuesses;
    public $secretNumber;
    public $result;
    public $guesses;


    // TODO: set a default amount of max guesses
    public function __construct(int $maxGuesses = 3)
    {
        // We ask for the max guesses when someone creates a game
        // Allowing your settings to be chosen like this, will bring a lot of flexibility
        $this->maxGuesses = $maxGuesses;

        if (!empty($_SESSION["guesses"])) {
            $this->guesses = $_SESSION["guesses"];
        }

        if (!empty($_SESSION["secretNumber"])) {
            $this->secretNumber = $_SESSION["secretNumber"];
        }
    }

    public function run()
    {
        // This function functions as your game "engine"
        // It will run every time, check what needs to happen and run the according functions (or even create other classes)
        if (empty($this->secretNumber)) {
            $this->generateSecretNumber();
        }

        if (!empty($_POST["input"])) {
            //the attempts will be +1 everytime user submit a number
            $this->guesses++;

            if ($_POST["input"] == $this->secretNumber) {
                $this->playerWins();
            } else if ($_POST["input"] < $this->secretNumber) {
                $this->guessHigher();
            } else if ($_POST["input"] > $this->secretNumber) {
                $this->guessLower();
            }
        }

        //if the user enter the correct number in the last attempts, 
        //the above compparasion will still run first before change to a new secret number

        $_SESSION["guesses"] = $this->guesses;

        if ($this->guesses == $this->maxGuesses) {
            $this->playerLoses();
            $this->reset();
        }

        if (isset($_POST["reset"])) {
            $this->reset();
        }
    }

    public function generateSecretNumber()
    {
        $this->secretNumber = rand(1, 10);
        $_SESSION["secretNumber"] = $this->secretNumber;
    }

    public function playerWins()
    {
        $this->result = 'You guessed it!';
        $this->reset();
    }

    public function playerLoses()
    {
        $this->result = "You LOSE... The secret number is {$this->secretNumber} ";
        $this->reset();
    }

    public function guessHigher()
    {
        $this->result = "Wrong... Guess higher!";
    }

    public function guessLower()
    {
        $this->result = "Wrong wrong wrong... Guess lower!";
    }

    public function reset()
    {
        $this->guesses = 0;
        $_SESSION["guesses"] = 0;
        $this->generateSecretNumber();
    }

    public function allAttemptsUsed()
    {
        return "All attempts are used, play again?";
    }
}
