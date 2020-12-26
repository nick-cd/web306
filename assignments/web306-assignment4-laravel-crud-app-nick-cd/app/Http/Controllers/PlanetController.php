<?php

namespace App\Http\Controllers;

class PlanetController extends Controller
{
    /**
     * Store request's body information in the model
     */
    private function fill($planet, \App\Http\Requests\PlanetRequest $req) {
        $planet->name = $req->name;
        $planet->planet_type = $req->planet_type;
        $planet->distance_from_sun = $req->distance_from_sun;
        $planet->avg_temp = $req->avg_temp;

        if($req->hasFile('image')) {
            $this->storeImage($req->file('image'), $planet);
        }
    }

    /**
     * Returns the planets view
     * 
     * @return view
     */
    public function index() {
        return view('planets', [
            'title' => 'List of Planets',
            'planets' => \App\Models\Planet::get()
        ]);
    }

    /**
     * Returns the view planet view
     * 
     * @return view
     */
    public function view($id) {
        $planet = \App\Models\Planet::findOrFail($id);
        $moons = \App\Models\Moon::get()->where('planet_id', $planet->id);

        return view('view-planet', [
            'title' => 'Planet "' . $planet->name . '" Information',
            'planet' => $planet,
            'moons' => $moons
        ]);
    }

    /**
     * Returns the add planet view
     * 
     * @return view
     */
    public function create() {
        return view('add-planet', [
            'title' => 'Add Planet'
        ]);
    }

    /**
     * Stores information in the request payload in the database
     * 
     * @return redirect
     */
    public function store(\App\Http\Requests\PlanetRequest $req) {
        $planet = new \App\Models\Planet();

        $this->fill($planet, $req);

        $planet->save();

        return redirect('/planet/' . $planet->id)->with(
            'success',
            'The planet: "' . $planet->name . '" was successfully added!'
        );
    }

    /**
     * Returns the edit moon view
     * 
     * @return view
     */
    public function edit($id) {
        $planet = \App\Models\Planet::findOrFail($id);

        return view('edit-planet', [
            'title' => 'Edit Planet "' . $planet->name . '"',
            'planet' => $planet
        ]);
    }

    /**
     * Edits row in database with id $id with request payload
     * 
     * @return redirect
     */
    public function update(\App\Http\Requests\PlanetRequest $req, $id) {
        $planet = \App\Models\Planet::findOrFail($id);

        $this->fill($planet, $req);

        $planet->save();

        return redirect('/planet/' . $id)->with(
            'success',
            'The planet, "' . $planet->name . '" was updated successfully!'
        );
    }

    /**
     * Deletes row with $id in the database
     * 
     * @return redirect
     */
    public function delete($id) {
        $planet = \App\Models\Planet::findOrFail($id);

        $planet->delete();

        return redirect("/")->with(
            'success',
            'The planet, "' . $planet->name . '" was deleted successfully!'
        );
    }

}
