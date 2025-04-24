<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Crud::paginate(10);
        return view('show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // validaton
         $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email',
            'city' => 'required|alpha',
            'age' => 'required|integer',
        ]);
    
        $user = new Crud();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->city=$request->city;
        $user->age=$request->age;
        $user->save();
        // return redirect()->route('crud.index');
        return response()->json(['success' => 'User added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Crud $crud)
    {
        $user = Crud::find($crud->id);
        return view('single', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crud $crud)
    {
        // $user = Crud::find($crud->id);
        // return view('update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crud $crud)
    {
         // validaton
         $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email',
            'city' => 'required|alpha',
            'age' => 'required|integer',
        ]);

        $user = Crud::find($crud->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->city=$request->city;
        $user->age=$request->age;
        $user->save();
        // return redirect()->route('crud.index');
        return response()->json(['success' => 'User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crud $crud)
    {
        $user = Crud::find($crud->id);
        $user->delete();
        return redirect()->route('crud.index');
        // return response()->json(['success' => 'User deleted successfully']);
    }
}
