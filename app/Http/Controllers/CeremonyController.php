<?php

namespace App\Http\Controllers;

use App\Models\Ceremony;
use App\Http\Requests\StoreCeremonyRequest;
use App\Http\Requests\UpdateCeremonyRequest;

class CeremonyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Ceremony/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Ceremony/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCeremonyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ceremony $ceremony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ceremony $ceremony)
    {
        return inertia('Ceremony/Form', [
            'ceremony' => $ceremony
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCeremonyRequest $request, Ceremony $ceremony)
    {
        //
    }

    public function form(Ceremony $ceremony)
    {

    }
}
