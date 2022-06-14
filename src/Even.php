<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function greetings()
{
    line('Welcome to the Brain Games!');
    $name = prompt($question = 'May I have your name?', false, ' ');
    line("Hello, {$name}!");
    return $name;
}

function isEven($number)
{
    return $number % 2 === 0;
}

function generateQuestion()
{
    $number = rand();
    line("Question: {$number}");
    return $number;
}

function getAnswer()
{
    $answer = prompt("Your answer");
    return $answer;
}

function isCorrect($number, $answer)
{
    switch ([isEven($number), $answer]) {
        case [true, 'yes']:
        case [false, 'no']:
            return true;
            break;
        default:
            return false;
    }
}

function runEven($numberOfQuestions = 3)
{
    $name = greetings();
    line('Answer "yes" if the number is even, otherwise answer "no"');
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $number = generateQuestion();
        $answer = getAnswer();
        if (!isCorrect($number, $answer)) {
            line("Let's try again, {$name}");
            exit;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, {$name}");
}
