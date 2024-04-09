<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = Resource::latest()->get();
        foreach ($resources as $key => $value) {
            $value['date'] = $value->created_at->format('d M,Y');
        }

        return view('resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image'))
        {
           $file = $request->file('image');
           $filename = time().'.'.$file->getClientOriginalExtension();
           $file->move(public_path('uploads/resources/'), $filename);
        }

        $pdfFilename = NULL;
        if ($request->hasFile('pdf'))
        {
           $pdfFile = $request->file('pdf');
           $pdfFilename = time().'.'.$pdfFile->getClientOriginalExtension();
           $pdfFile->move(public_path('uploads/resources-pdf/'), $pdfFilename);
        }

        $resource = Resource::create([
            'title'      => $request->title,
            'image'      => isset($filename) ? 'uploads/resources/'. $filename : NULL,
            'pdf'        => isset($pdfFilename) ? 'uploads/resources-pdf/'.$pdfFilename : NULL,
            'teaser'     => $request->teaser,
            'rich_text'  => $request->rich_text
        ]);

        return Redirect::route("resources.index")->with('success-message','Resources Created Successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
