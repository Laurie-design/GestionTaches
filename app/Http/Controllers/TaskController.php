<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexTache()
    {
        $tasks = Task::all();
        return view('Tasks.listetache',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tasks.ajoutertache');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect()->route('tache.list')->with('success','Tache ajoutée avec succès!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        return view('Tasks.modifiertache', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $task = Task::find($request->id);
    $task->name = $request->name;
    $task->save();

    return redirect('/tache/list')->with('status', 'Tâche mise à jour avec succès !');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tache.list')->with('success', "Tache supprimée avec succès.");
}
}