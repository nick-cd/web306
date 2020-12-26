<?php

namespace App\Http\Controllers;

class MoonController extends Controller
{

    /**
     * Store request's body information in the model
     */
    private function fill($moon, \App\Http\Requests\MoonRequest $req) {
        $moon->name = $req->name;
        $moon->planet_id = $req->planet_id;

        if($req->hasFile('image')) {
            $this->storeImage($req->file('image'), $moon);
        }
    }

    /**
     * Returns the add moon view
     * 
     * @return view
     */
    public function create() {
        return view('add-moon', [
            'title' => 'Add Moon',
            'id' => app('request')->input('for_planet_id'),
            'planets' => \App\Models\Planet::pluck('name', 'id')
        ]);
    }

    /**
     * Stores information in the request payload in the database
     * 
     * @return redirect
     */
    public function store(\App\Http\Requests\MoonRequest $req) {
        $moon = new \App\Models\Moon();

        $this->fill($moon, $req);

        $moon->save();

        return redirect('/planet/' . $moon->planet_id)->with(
            'success',
            'The moon: "' . $moon->name . '" was successfully added!'
        );
    }

    /**
     * Returns the edit moon view
     * 
     * @return view
     */
    public function edit($id) {
        $moon = \App\Models\Moon::findOrFail($id);

        return view('edit-moon', [
            'title' => 'Edit Moon "' . $moon->name . '"',
            'moon' => $moon,
            'planets' => \App\Models\Planet::pluck('name', 'id')
        ]);
    }

    /**
     * Edits row in database with id $id with request payload
     * 
     * @return redirect
     */
    public function update(\App\Http\Requests\MoonRequest $req, $id) {
        $moon = \App\Models\Moon::findOrFail($id);

        $this->fill($moon, $req);

        $moon->save();

        return redirect('/planet/' . $moon->planet_id)->with(
            'success',
            'The moon, "' . $moon->name . '" was updated successfully!'
        );
    }

    /**
     * Deletes row with $id in the database
     * 
     * @return redirect
     */
    public function delete($id) {
        $moon = \App\Models\Moon::findOrFail($id);

        $moon->delete();

        return redirect(\URL::previous())->with(
            'success',
            'The moon, "' . $moon->name . '" was deleted successfully!'
        );
    }

}
