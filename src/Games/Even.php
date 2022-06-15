<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

function generateQuestionEven($numberOfRounds = 3)
{
    $questions = [];
    for ($i = 0; $i < $numberOfRounds; $i++) {
        $questions[] = rand(0, 50);
    }
    return $questions;
}

function getCorrectAnswerEven($questions, $numberOfRounds = 3)
{
    $answers = [];
    for ($i = 0; $i < $numberOfRounds; $i++) {
        $answers[] = ($questions[$i] % 2 === 0) ? 'yes' : 'no';
    }
    return $answers;
}

function startEvenGame()
{
    $questionMessage = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = generateQuestionEven();
    $correctAnswers = getCorrectAnswerEven($questions);
    startGame($questionMessage, $questions, $correctAnswers);
}
