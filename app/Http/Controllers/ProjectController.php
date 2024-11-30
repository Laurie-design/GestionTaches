<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function indexProjet()
    {
        $projects = Project::all();
        return view('Projects.listeProjet',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Projects.ajouterProjet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->save();

        return redirect()->route('projet.list')->with('success','Projet ajoutée avec succès!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $projects = Project::findOrFail($id);
        return view('Projects.modifierProjet', compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $project = Project::find($request->id);
    $project->name = $request->name;
    $project->save();

    return redirect('/projet/list')->with('status', 'Projet mise à jour avec succès !');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projet.list')->with('success', "Projet supprimée avec succès.");
}
}