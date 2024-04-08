<?php

namespace App\Http\Controllers;

use App\Models\NewsAndEvents;
use Illuminate\Http\Request;

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
           $file->move(public_path('images/news-and-events/'), $filename);
        }

        $newsAndEvents = NewsAndEvents::create([
            'title' => $request->title,
            'image' => 'images/news-and-events/'.$filename,
            'url'   => $request->url,
            'text'  => $request->text
        ]);

        return redirect()->route("news-and-events.index")->with('message','News And Events Created Successfully.');
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
    public function edit(NewsAndEvents $newsAndEvents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsAndEvents $newsAndEvents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsAndEvents $newsAndEvents)
    {
        //
    }
}
