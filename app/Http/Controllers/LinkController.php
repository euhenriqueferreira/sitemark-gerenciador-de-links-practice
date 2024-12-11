<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        if($data = $request->validated()){

            if($file = $request->photo){
                $data['photo'] = $file->store('photos');
            }

            if(Link::create(array_merge($request->validated(), ['user_id'=>auth()->user()->id, 'photo'=>$data['photo']]))){
                return to_route('dashboard')->with('message', 'Link has been created!');
            }

            return back()->with('message', 'Something go wrong');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('links.edit', [
            'link'=>$link,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {

        if($data = $request->validated()){
            if($file = $request->photo){
                $data['photo'] = $file->store('photos');
            }

            if($link->fill(array_merge($request->validated(), ['photo'=>$data['photo']]))->save()){
                return back()->with('message', 'Link has been edited!');
            }

            return back()->with('message', 'Something go wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return to_route('dashboard')->with('message', 'Link deleted!');
    }

    public function up(Link $link){
        $link->moveUp();
        return back();
    }

    public function down(Link $link){
        $link->moveDown();
        return back();
    }
}
