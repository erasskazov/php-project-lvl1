<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greetings()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    return $name;
}

function getPlayerAnswer()
{
    $answer = prompt("Your answer");
    return $answer;
}

function isCorrect(string $playerAnswer, $correctAnswer)
{
    return ($playerAnswer === $correctAnswer);
}

function startGame(string $questionMessage, array $questions, array $correctAnswers, int $numberOfRounds = 3)
{
    $name = greetings();
    line($questionMessage);

    for ($i = 0; $i < $numberOfRounds; $i++) {
        line("Question: {$questions[$i]}");
        $playerAnswer = getPlayerAnswer();
        $correctAnswer = (string) ($correctAnswers[$i]);
        if (isCorrect($playerAnswer, $correctAnswer)) {
            line("Correct!");
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswers[$i]}'");
            line("Let's try again, {$name}!");
            exit;
        }
    }
    line("Congratulations, {$name}!");
}
