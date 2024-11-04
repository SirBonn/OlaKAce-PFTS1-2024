<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'agemin' => 'required|string'
            ]);

            $people = People::create([
                'name' => $request['name'],
                'age_min' => $request['agemin']
            ]);

            return redirect()->route('admin')->with('success', 'People created successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin')->with('error', 'People could not be created: ' . $e->getMessage());
        }

    }
}
