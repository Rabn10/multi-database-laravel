<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class userController extends Controller
{

    //register page
    public function registerPage() {
        return view('register');
    }

    //login page
    public function loginPage() {
        return view('login');
    }

    //function to register user
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'usercode' => 'required'
        ]);

        $dbConnection = $this->getDatabaseConnection($request->usercode);

        $user = User::on($dbConnection)->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'usercode' => $request->usercode
        ]);

        return redirect()->back()->with('message', 'User Register Successfully');

    }


    //function to login user
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'usercode' => 'required'
        ]);

        $dbConnection = $this->getDatabaseConnection($request->usercode);

        $user = User::on($dbConnection)->where('email', $request->email)->first();

        if (!$user || !\Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
        $token = $user->createToken('LoginToken')->plainTextToken;

        session([ 'id' => $user->id, 'user_token' => $token, 'username' => $user->name,'usercode' => $request->usercode]);

        return redirect()->route('dashboard')
        ->with('message', 'Login successfully');
    }

    //logout function
    public function logout(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        if ($user) {
            // Revoke the user's tokens
            $user->tokens()->delete();
        }

        // Clear session data
        session()->forget(['user_token', 'username', 'usercode']);
        
        // Redirect to login with a success message
        return redirect()->route('login')->with('message', 'Logged out successfully');
    }


    //dashboard function
    public function dashboard(Request $request)
    {
        if(session::has('id') && session::has('usercode')){
            $usercode = session('usercode');
            $dbConnection = $this->getDatabaseConnection($usercode);
            // $employees = Employee::on($dbConnection)->get();

            $query = Employee::on($dbConnection);

            if($request->has('search')) {
                $search = $request->input('search');
                $query->where('name', 'like', "%$search%");
            }

            $employees = $query->paginate(5);

            return view('userdashboard', compact('employees'));
        }
        return redirect()->route('login');
    }


    //private function to get database connection
    private function getDatabaseConnection($usercode){
        $prefix = strtoupper(substr($usercode, 0, 1));

        return match($prefix){
            'A' => 'mysql',
            'B' => 'mysql2',
            'C' => 'mysql3'
        };

    }
}
