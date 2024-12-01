<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = People::all();
        return View::make('people.index')
            ->with('people',$people);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View::make('people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama'      => 'required',
            'no_telepon'=> 'required|max:12'
        ];

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to(route('peoples.create'))
                ->withErrors($validate)
                ->withInput($request->all());
        } else {
            $person = People::create($request->all());
            $person->save();
        }

        return Redirect::to(route('peoples.index'))
            ->with('success','Successfully created people!');
    }

    /**
     * Display the specified resource.
     */
    public function show(People $people)
    {
        return View::make('people.show')
            ->with('person',$people);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(People $people)
    {
        return View::make('people.edit')
            ->with('person',$people);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, People $people)
    {
        $rules = [
            'nama'      => 'required',
            'no_telepon'=> 'required|max:12'
        ];

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to(route('peoples.create'))
                ->withErrors($validate)
                ->withInput($request->all());
        } else {
            $people->update($request->all());
        }

        return Redirect::to(route('peoples.index'))
            ->with('success','Successfully updated people!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $people)
    {
        $people->delete();

        return Redirect::to('/peoples')
            ->with('success','Successfully deleted people!');
    }
}
