<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lessons;
use App\Models\Questions;
use App\Models\User;
use App\Models\User_answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find(1);

        foreach($user->courses as $user_courses){
            $user_courses_id = $user_courses->id;
        }

        $user_lessons = Lessons::where('course_id', $user_courses_id)->first();
        $questions = Questions::paginate(1);

        //dd($user_lessons);
        
        return view('dashboard', compact('user', 'questions', 'user_lessons'));
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

    public function user_answers()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $user_answer = User_answers::where('user_id', '=', $user_id)->where('ball', '>', 0)->sum('ball');
        $user->update([
            'result_test' => $user_answer
        ]);
        
        if($user_answer <= 40){
            User::create([
                'status' => 'junior'
            ]);
        }elseif($user_answer >= 40 && $user_answer <= 80){
            User::create([
                'status' => 'strong_junior'  
            ]);
        }elseif($user_answer > 80){
            User::create([
                'status' => 'middle'
            ]);
        }

        return redirect('dashboard');
    }

}