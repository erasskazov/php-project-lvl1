<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greetings()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, {$name}!");
    return $name;
}

function getAnswer()
{
    $answer = prompt("Your answer");
    return $answer;
}

function isCorrect($playerAnswer, $correctAnswer)
{
    return ($playerAnswer === $correctAnswer);
}

function startGame($questionMessage, $questions, $correctAnswers, $numberOfRounds = 3)
{
    $name = greetings();
    line($questionMessage);

    for ($i = 0; $i < $numberOfRounds; $i++) {
        line("Question: {$questions[$i]}");
        $playerAnswer = getAnswer();
        if (isCorrect($playerAnswer, $correctAnswers[$i])) {
            line("Correct!");
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswers[$i]}'");
            line("Let's try again, {$name}!");
            exit;
        }
    }
    line("Congratulations, {$name}!");
}
