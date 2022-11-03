<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\AdminPasswordRequest;

class AdminController extends Controller
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
    public function index()
    {
        return view('admin.index');
    }

    public function change_password_form()
    {
        return view('admin.profile.change_password');
    }

    public function password_update(AdminPasswordRequest $request){
        $data = $request->all();
        $user = User::where(['id' => auth()->user()->id])->first();

        $current_password = $data['old_password'];

		if (!Hash::check($current_password, $user->password)) {
            return redirect()->back()->withInput()->with('error', 'Old password is wrong');
		}

		$password = bcrypt($data['password']);
		$user->password = $password;
		if($user->save()){
			return redirect()->back()->with('success', 'Admin Password is successfully updated.');
		}
		else{
			return redirect()->back()->withInput()->with('error', 'Something went wrong');
		}

	}
}
