<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Lessons;
use App\Models\Levels;
use App\Models\Questions;
use App\Models\User;
use App\Models\User_answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->email_verified_at === null){
            return view('email_verify', compact('user'));
        }else{
            $questions = Questions::paginate(1);
            $courses = Courses::all();
            $lessons = [];
            $user_courses = Courses::where('id', $user->courses_id)->first();
            
            if($user->result_test != 0){
                $lessons = Lessons::where([
                    ['course_id', '=', $user_courses->id],
                    ['level_id', '=', $user->level],
                ])->paginate(1);
            }
            
            return view('dashboard', compact('user', 'questions', 'lessons', 'courses', 'user_courses'));
        }
        
    }

    public function courses_info()
    {
        return view('courses_info');
    }

    public function answers(Request $request)
    {
        $user_id = Auth::user()->id;
        $questions_id = Questions::all();

        foreach($questions_id as $id){
            if($id->correct_answers == $request->answer){
                $user_answer = User_answers::create([
                    'user_id' => $user_id,
                    'questions_id' => $request->question_id,
                    'user_answer' => $request->answer,
                    'ball' => 10
                ]);
                $user_answer->save();
            }else{
                $user_answer = User_answers::create([
                    'user_id' => $user_id,
                    'questions_id' => $request->question_id,
                    'user_answer' => $request->answer,
                    'ball' => 0
                ]);
                $user_answer->save();
            }
        }
        
        $page = $request->question_id + 1;
        
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
                'level' => 1
            ]);
        }elseif($user_answer >= 40 && $user_answer <= 80){
            $user->update([
                'level' => 2
            ]);
        }elseif($user_answer >= 100){
            $user->update([
                'level' => 3
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