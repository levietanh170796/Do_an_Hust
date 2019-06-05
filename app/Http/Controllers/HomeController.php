<?php

namespace App\Http\Controllers;

use App\Level;
use App\Subject;
use App\ContestRound;
use App\User;
use App\Question;
use App\ContestResult;
use Illuminate\Http\Request;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        if(auth()->user()->isAdmin()) {
            $total_users = count(User::all());
            $total_questions = count(Question::all());
            $total_contest_results = count(ContestResult::all());
            $total_levels = count(Level::all());
            $total_subjects = count(Subject::all());

            return view('home_admin', compact('total_users', 'total_questions', 'total_contest_results',
                                              'total_levels', 'total_subjects'));
        } else {
            if(auth()->user()->level_id == 0) {
                return redirect('user_profiles')->with('status', 'false');
            } 

            $subjects = Subject::all();
            return view('home', compact('subjects'));
            
        }
    }

    public function showChangePasswordForm() {
        return view('changepassword');
    }

    public function changePassword(Request $request) {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Mật khẩu hiện tại không chính xác. Vui lòng nhập lại!");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","Mật khẩu mới không được giống mật khẩu cũ.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Đổi mật khẩu thành công!");

    }
}
