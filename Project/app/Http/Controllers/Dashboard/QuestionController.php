<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy("id", "DESC")->get();
        return view('dashboard.questions.home', [
            'questions' => $questions
        ]);
    }
    public function add(Request $request)
    {
        Question::create([
            'title' => $request->title,
            'text' => $request->text,
        ]);
        return redirect()->back()->with('success', 'سوال اضافه  شد');
    }

    public function delete($id)
    {

        $questions = Question::find($id);
        $questions->delete();
        return redirect()->back()->with('success', 'سوال حذف شد');
    }
}
