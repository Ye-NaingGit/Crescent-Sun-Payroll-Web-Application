<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $salaries = Salary::all();
        $salaryCount = $salaries->count();
        $users = User::all();
        $occupations = Occupation::all();
        $userCount = $users->count();
        $occupationCount = $occupations->count();
        $jsonSalary = json_encode($salaries);
        $jsonOcc = json_encode($occupations);
        $jsonUser = json_encode($users);

        return view('dashboard',['salaries'=>$salaries, 'jsonSalary'=>$jsonSalary, 'userCount'=>$userCount, 'occupations'=>$occupations, 'users'=>$users]);
    }
    public function select(){
        $users = User::all();
        return view('salary.select', ['users'=>$users]);
    }
    public function occupationList()
    {
        $occupations = Occupation::orderby('created_at', 'ASC');
        return view('occupations.list', ['occupations' => $occupations->paginate(6)]);
    }
    public function userList()
    {
        $users = User::orderby('created_at', 'ASC');
        return view('users.list', ['users' => $users->paginate(6)]);
    }
    public function salaryList()
    {
        $salaries = Salary::orderby('created_at', 'DESC');
        return view('salary.list', ['salaries' => $salaries->paginate(6)]);
    }
}
