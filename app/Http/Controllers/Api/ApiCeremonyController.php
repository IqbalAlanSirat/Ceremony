<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ceremony;
use Illuminate\Http\Request;

class ApiCeremonyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ceremony::simplePaginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
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
