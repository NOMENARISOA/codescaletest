<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ScoreController extends Controller
{
    public function GetScore(Request $request)
    {
        $frames_value = $request->get('data');
        $score_frame = [];
        $index = 0;
        foreach ($frames_value as $frameIndex => $score) {

            $index_of_strikeorspare = array_search(15, $score);
            $score_frame[$index] = (array_sum($score) > 15) ? 15 : array_sum($score);

            if ($index_of_strikeorspare !== false) {
                //STRIKE
                if ($index_of_strikeorspare == 0) {
                    $strikevalue = ScoreController::GetNexScoresValueStrike($frames_value, $frameIndex + 1, 0, 3, 0);
                    $score_frame[$index] += $strikevalue;
                }
                //SPIRE
                if ($index_of_strikeorspare > 0) {
                    $strikevalue = ScoreController::GetNexScoresValueStrike($frames_value, $frameIndex + 1, 0, 2, 0);
                    $score_frame[$index] += $strikevalue;
                }
            }

            if (isset($score_frame[$index - 1]) !== false) {
                $score_frame[$index] += $score_frame[$index - 1];
            }

            $index++;
        }



        return $score_frame;
    }

    public function GetNexScoresValueStrike($frames_value, $frameNextIndex, $iteration, $nbrIteration, $totalScore)
    {
        if ($iteration < $nbrIteration) {
            if (isset($frames_value[$frameNextIndex])) {
                $index_of_strikeorspare = array_search(15, $frames_value[$frameNextIndex]);
                if ($index_of_strikeorspare !== false && $frameNextIndex <= 4) {
                    $totalScore += 15;
                    return ScoreController::GetNexScoresValueStrike($frames_value, $frameNextIndex + 1, $iteration + 1, $nbrIteration, $totalScore);
                } else {
                    for ($i = 0; $i < ($nbrIteration - $iteration); $i++) {
                        $totalScore += $frames_value[$frameNextIndex][$i];
                    }
                    return ($totalScore > 60) ? 60 : $totalScore;
                }
            } else {
                return array_sum($frames_value[5]) - 15;
            }
        } else {
            return ($totalScore > 60) ? 60 : $totalScore;
        }
    }
}
