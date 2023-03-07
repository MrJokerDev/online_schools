<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Courses;
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
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $questions = Questions::paginate(1);
        $courses = Courses::where('id', $user->courses_id)->first();
        $lessons = Lessons::where('course_id', $courses->id)->get();
        
        dd($lessons);
        return view('dashboard', compact('user', 'questions', 'lessons'));
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
            $user->update([
                'status' => 'junior'
            ]);
        }elseif($user_answer >= 40 && $user_answer <= 80){
            $user->update([
                'status' => 'strong_junior'
            ]);
        }elseif($user_answer > 80){
            $user->update([
                'status' => 'middle'
            ]);
        }

        return redirect('dashboard');
    }

    public function user_courses(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        
        $user->update([
            'courses_id' => $request->courses
        ]);
        return redirect('dashboard');
    }

}