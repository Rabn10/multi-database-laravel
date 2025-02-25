<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{

    //function to store employee data
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $usercode = session('usercode');
        $dbConnection = $this->getDatabaseConnection($usercode);

        $employee = Employee::on($dbConnection)->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->back()->with('message', 'Employee Created Successfully');
    }

    //function to get one employee data
    public function getOneEmployee($id) {

        $usercode = session('usercode');
        $dbConnection = $this->getDatabaseConnection($usercode);

        $employee = Employee::on($dbConnection)->find($id);
        return view('edit_page', compact('employee'));
    }

    //function to update employee data
    public function updateEmployee(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->save();

        return redirect('/dashboard')->with('message', 'Employee Updated Successfully');
    }

    //function to delete employee data
    public function deleteEmployee($id) {

        $usercode = session('usercode');
        $dbConnection = $this->getDatabaseConnection($usercode);
        $employee = Employee::on($dbConnection)->find($id);
        $employee->delete();
        return redirect()->back()->with('message', 'Employee Deleted Successfully');
    }

    private function getDatabaseConnection($usercode){
        $prefix = strtoupper(substr($usercode, 0, 1));

        return match($prefix){
            'A' => 'mysql',
            'B' => 'mysql2',
            'C' => 'mysql3'
        };

    }
}
