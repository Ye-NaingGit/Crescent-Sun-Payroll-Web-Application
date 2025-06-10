<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function buffer(){
        $user = request('selected');
        return redirect(route('payment',['user'=>$user]));
    }

    public function payment(User $user)
    {
        return view('salary.payment', ['user' => $user]);
    }

    public function pay(User $user)
    {
        $validated = request()->validate(
            [
                'employeeID' => 'required',
                'employeeName' => 'required',
                'adminName' => 'required',
                'adminID' => 'required',
                'baseSalary' => 'required',
                'attendence' => 'required',
                'attendence_bonus' => 'required',
                'bonus' => 'required',
                'bonus_information' => '',
                'fine' => 'required',
                'fine_information' => '',
                'total' => 'required'
            ]
        );
        $salary = Salary::create(
            [
                'employeeID' => $validated['employeeID'],
                'employeeName' => $validated['employeeName'],
                'adminID' => $validated['adminID'],
                'adminName' => $validated['adminName'],
                'baseSalary' => $validated['baseSalary'],
                'attendence' => $validated['attendence'],
                'attendence_bonus' => $validated['attendence_bonus'],
                'bonus' => $validated['bonus'],
                'bonus_information' => $validated['bonus_information'],
                'fine' => $validated['fine'],
                'fine_information' => $validated['fine_information'],
                'total' => $validated['total']
            ]
        );

        return redirect()->route('salary.list');
    }

    public function details(Salary $salary){
        return view('salary.details',['salary'=>$salary]);
    }
}
