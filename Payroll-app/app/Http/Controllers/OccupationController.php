<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    public function create()
    {
        return view('occupations.create');
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:2|max:40',
                'baseSalary' => 'required',
                'permission' => 'required'
            ]
        );

        $occupation = Occupation::create(
            [
                'name' => $validated['name'],
                'baseSalary' => $validated['baseSalary'],
                'permission' => $validated['permission']
            ]
        );

        return redirect()->route('occupations.create')->with('success', 'Occupation Created Successfully');
    }

    public function edit(Occupation $occupation)
    {
        return view('occupations.edit', ['occupation' => $occupation]);
    }

    public function update(Occupation $occupation)
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:2|max:40',
                'baseSalary' => 'required',
                'permission' => 'required'
            ]
        );

        $occupation->update($validated);

        return redirect()->route('occupations.edit', ['occupation'=>$occupation])->with('success', 'Occupation Updated Successfully');
    }

    public function destroy(Occupation $occupation)
    {
        $occupation->delete();
        return redirect()->route('occupations.list');
    }
}
