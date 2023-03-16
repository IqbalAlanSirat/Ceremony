<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ceremony;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ApiCeremonyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ceremony::orderBy('id', 'DESC')->simplePaginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            'name.required' => 'Nama diperlukan.'
        ]);

        $ceremony = new Ceremony();
        $ceremony->name = $request->name;
        $ceremony->description = $request->description;
        $ceremony->image_name = $request->image_name;
        $ceremony->start_date = $request->start_date;
        $ceremony->end_date = $request->end_date;
        $ceremony->save();
        return $ceremony;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ceremony $ceremony)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            'name.required' => 'Nama diperlukan.'
        ]);

        $ceremony->name = $request->name;
        $ceremony->description = $request->description;
        $ceremony->image_name = $request->image_name;
        $ceremony->start_date = $request->start_date;
        $ceremony->end_date = $request->end_date;
        $ceremony->save();
        return $ceremony;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ceremony $ceremony)
    {
        $ceremony->delete();
        return $ceremony->name . ' Deleted';
    }
}
