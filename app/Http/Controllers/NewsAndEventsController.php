<?php

namespace App\Http\Controllers;

use App\Models\NewsAndEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use File;

class NewsAndEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsAndEvents = NewsAndEvents::latest()->get();
        foreach ($newsAndEvents as $key => $value) {
            $value['date'] = $value->created_at->format('d M,Y');
        }

        return view('news-and-events.index', compact('newsAndEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news-and-events.create');
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
           $file->move(public_path('uploads/news-and-events/'), $filename);
        }

        $newsAndEvents = NewsAndEvents::create([
            'title' => $request->title,
            'image' => 'uploads/news-and-events/'.$filename,
            'url'   => $request->url,
            'text'  => $request->text
        ]);

        return Redirect::route("news-and-events.index")->with('success-message','News And Events Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsAndEvents $newsAndEvents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsAndEvents $newsAndEvents, $id)
    {
        $newsAndEvent = NewsAndEvents::findOrFail($id);

        return view('news-and-events.edit', compact('newsAndEvent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsAndEvents $newsAndEvents, $id)
    {
        $oldImage = NULL;
        $newsAndEvents = NewsAndEvents::findOrFail($id)->first();
        if($newsAndEvents != '') {
            $oldImage = $newsAndEvents->image;
        }

        if ($request->hasFile('image'))
        {
           $file = $request->file('image');
           $filename = time().'.'.$file->getClientOriginalExtension();
           $file->move(public_path('uploads/news-and-events/'), $filename);

           $image_path = public_path($oldImage);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $newsAndEvents = NewsAndEvents::findOrFail($id)->update([
            'title' => $request->title,
            'image' =>  isset($filename) ? 'uploads/news-and-events/'. $filename : $oldImage,
            'url'   => $request->url,
            'text'  => $request->text
        ]);

        return Redirect::route("news-and-events.index")->with('success-message','News And Events Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsAndEvents $newsAndEvents, $id)
    {
        $newsAndEvents = NewsAndEvents::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'record delete successfully.'
        ]);
    }
}
