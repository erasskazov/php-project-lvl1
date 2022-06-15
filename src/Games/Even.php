<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

function generateQuestionEven()
{
    return rand(0, 50);
}

function getCorrectAnswerEven(int $question)
{
    return ($question % 2 === 0) ? 'yes' : 'no';
}

function generateDataEven(int $numberOfRounds = 3)
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $numberOfRounds; $i++) {
        $questions[] = generateQuestionEven();
        $answers[] = getCorrectAnswerEven($questions[$i]);
    }
    return [$questions, $answers];
}

function startEvenGame()
{
    $questionMessage = 'Answer "yes" if the number is even, otherwise answer "no".';
    [$questions, $answers] = generateDataEven();
    startGame($questionMessage, $questions, $answers);
}
