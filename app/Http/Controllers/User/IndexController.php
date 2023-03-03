<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\User;
use App\Models\User_answers;
use App\Models\User_lesson_create_times;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);  
        
        $questions = Questions::paginate(1);

        return view('dashboard', compact('user', 'questions'));
    }

    public function answers(Request $request)
    {
        $user_id = Auth::user()->id;
        $questions_id = Questions::all();
        
        foreach($questions_id as $id){
            if($id->correct_answers == $request->answer){
                $user_answer = User_answers::create([
                    'user_id' => $user_id,
                    'questions_id' => $request->questions_id,
                    'user_answer' => $request->answer,
                    'ball' => 10
                ]);
                $user_answer->save();
            }
        }
        
        $page = $request->questions_id + 1;
        
        return redirect("dashboard?page=$page");
    }

    public function user_answers(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $user_answer = User_answers::where('user_id', '=', $user_id)->where('ball', '>', 0)->sum('ball');
        $user->update([
            'result_test' => $user_answer
        ]);

        return redirect('dashboard');
    }

    public function calendar(Request $request)
    {
        $user_lessons_day = User_lesson_create_times::create([
            'user_id' => $request->user_id,
            'first_lesson_day' => $request->first_lesson_day,
            'second_lesson_day' => $request->second_lesson_day,
            'third_lesson_day' => $request->third_lesson_day,
        ]);

        $user_status = User::where('id', $request->user_id)->first();
        
        $user_status->update(['active_status' => 'active']);
        
        $user_lessons_day->save();

        return redirect('dashboard');
    }

}