<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
// MUST use this namespace to have access to Auth class/current user
use Illuminate\Support\Facades\Auth;

use App\Models\Artist;
use App\Models\Artwork;

use URL;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::with('artworks')->get();

        return view('view-artists', [
            'title' => 'Artists',
            'artists' => $artists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-artist', [
            'title' => 'Add Artist'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistRequest $request)
    {
        $artist = new Artist;
        $artist->name = $request->name;
        $artist->styles = $request->styles;
        $artist->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = strtolower(str_replace(' ', '_', $request->name));
            $image_time = time();
            $image_extension = '.' . $image->getClientOriginalExtension();
            $full_image_name = $image_name . '_' . $image_time . $image_extension;
            $image_path = date('Y/m/d');
            $destination_path = public_path('/images/' . $image_path);
            $image->move($destination_path, $full_image_name);
            $artist->image = $image_path . '/' . $full_image_name;
        }

        $artist->save();

        return redirect('/')->with(
            'success',
            'New artist, "' . $artist->name . '" added successfully!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::with('artworks')->find($id);

        return view('show-artist', [
            'artist' => $artist,
            'title' => $artist->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::with('artworks')->find($id);

        return view('edit-artist', [
            'artist' => $artist,
            'title' => 'Edit ' . $artist->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArtistRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistRequest $request, $id)
    {
        $artist = Artist::find($id);
        $artist->name = $request->name;
        $artist->styles = $request->styles;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $image_name = strtolower(str_replace(' ', '_', $request->name));
            $image_time = time();
            $image_extension = '.' . $image->getClientOriginalExtension();
            $full_image_name = $image_title . '_' . $image_time . $image_extension;

            $image_path = date('Y/m/d');
            $destination_path = public_path('/images/' . $image_path);

            $image->move($destination_path, $full_image_name);

            $artist->image = $image_path . '/' . $full_image_name;
        } else {
            $artist->image = $request->old_image;
        }

        $artist->save();

        return redirect(URL::previous())->with(
            'success',
            'The artist, "' . $artist->name . '" was updated successfully!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $artist = Artist::find($id);
        
        // Only necessary if you want to delete all artworks
        // associated with the artist when the artist is deleted:
        $artist = Artist::with('artworks')->find($id);

        foreach ($artist->artworks as $artwork) {
            $artwork->delete();
        }
        // End of artwork deletion code
        
        $artist->delete();

        return redirect('/')->with(
            'success',
            'The artist, "' . $artist->name . '" was deleted successfully!'
        );
    }
}
