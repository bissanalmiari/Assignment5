<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Display a list of students
    public function index(Request $request)
{
    $query = Student::query();
    if ($request->ajax()) {
        if ($request->has('search') && !empty($request->search)) {
            $search = trim($request->input('search'));
            $query->where('name', 'LIKE', "%{$search}%");
        }
        if ($request->has('min_age') && $request->has('max_age')) {
            $min_age = $request->input('min_age');
            $max_age = $request->input('max_age');
            $query->whereBetween('age', [$min_age, $max_age]);
        } elseif ($request->has('min_age')) {
            $min_age = $request->input('min_age');
            $query->where('age', '>=', $min_age);
        } elseif ($request->has('max_age')) {
            $max_age = $request->input('max_age');
            $query->where('age', '<=', $max_age);
        }
        $students = $query->get();
        return response()->json($students, 200);
    }
    if ($request->has('search') || $request->has('min_age') || $request->has('max_age')) {

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($request->has('min_age') && $request->has('max_age')) {
            $min_age = $request->min_age;
            $max_age = $request->max_age;
            $query->whereBetween('age', [$min_age, $max_age]);
        } elseif ($request->has('min_age')) {
            $min_age = $request->min_age;
            $query->where('age', '>=', $min_age);
        } elseif ($request->has('max_age')) {
            $max_age = $request->max_age;
            $query->where('age', '<=', $max_age);
        }
    }
    $students = $query->get();
    return view('index', compact('students'));
}


    // Show the form to create a new student
    public function create()
    {
        return view('create');
    }

    // Store a newly created student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age'  => 'required|integer|min:1|max:100',
        ]);

        Student::create([
            'name' => $request->name,
            'age'  => $request->age,
        ]);

        return redirect()->route('index')->with('success', 'Student added successfully!');
    }

    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
