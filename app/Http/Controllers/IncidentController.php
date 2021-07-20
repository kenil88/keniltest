<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Incident;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incident = Incident::all();

        foreach ($incident as $incidents) {
            $incidentdata['id'] = $incidents->id;
            $incidentdata['location'] = json_decode($incidents->location, true);
            $incidentdata['title'] = $incidents->title;
            $incidentdata['category'] = $incidents->category;
            $incidentdata['people'] = json_decode($incidents->people, true);
            $incidentdata['comments'] = $incidents->comments;
            $incidentdata['incidentDate'] = $incidents->incidentDate;
            $incidentdata['createDate'] = $incidents->createDate;
            $incidentdata['modifyDate'] = $incidents->modifyDate;
        }

        return response(['incident' => $incidentdata, 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location' => 'required',
            'category' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Please enter valid data'], 400);
        }
        $incident = Incident::create($request->all());

        return response()->json(['message' => 'Record added successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}