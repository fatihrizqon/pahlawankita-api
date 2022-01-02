<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Result;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $correct_answer = Hero::all()->random(1);
        $options        = Hero::all()->random(3);
        $options        = $options->merge($correct_answer)->sort()->values()->all();

        return response()->json([
            'success' => true,
            'answer'  => $correct_answer,
            'options' => $options
        ], 200);
    }

    public function top10()
    {
      $results = Result::where('score', '>', 0)->orderBy('score', 'desc')->take(3)->get();
      if($results){
        return response()->json([
            'success' => true,
            'data'    => $results,
        ], 200);
      }else{
        $results = '';
        return response()->json([
            'success' => true,
            'data'    => $results,
            'message' => 'The records is empty.'
        ], 200);
      }
    }

    public function results()
    {
      $results = Result::where('score', '>=', 0)->orderBy('score', 'desc')->take(50)->get();

      if($results){
        return response()->json([
            'success' => true,
            'data'    => $results,
        ], 200);
      }else{
        $results = '';
        return response()->json([
            'success' => true,
            'data'    => $results,
            'message' => 'The records is empty.'
        ], 200);
      }
    }

    public function saveresult(Request $request)
    {
      $username = $request->username;
      $score    = $request->score;

      $check_username = Result::where('username',$username)->first();
      if($check_username){
        $rand_id  = rand(0, 2000);
        $username = $username.$rand_id;
        $result = Result::create([
         'username' => $username,
         'score'    => $request->score,
        ]);
        return response()->json([
            'success' => true,
            'data'    => $result,
            'message' => $username." your score is ".$score." and has been saved."
        ], 200);
      }else{
        $result = Result::create([
         'username' => $request->username,
         'score'    => $request->score,
        ]);

        return response()->json([
            'success' => true,
            'data'    => $result,
            'message' => $username." your score is ".$score." and has been saved."
        ], 200);
      }
    }
}

/*
1. Start the quiz.
2. Receiving question from API.
3. Sending answer. Correct, results +1 back to Step 2. Wrong, Quiz stopped and shows the final results.
4. Save the result? Yes, enter username combined with unique ID (Stored on leaderboard). No, just show the result.

Question format:
    [Picture]
    "Description"
    Choose the answers: A, B, C, D.
*/
