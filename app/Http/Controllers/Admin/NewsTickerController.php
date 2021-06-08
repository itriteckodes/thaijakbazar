<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsTicker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsTickerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsticker=NewsTicker::where('country_id',Session::get('country_id'))->first();
        return view('admin.news-ticker.index')->with('newsticker',$newsticker);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsTicker  $newsTicker
     * @return \Illuminate\Http\Response
     */
    public function show(NewsTicker $newsTicker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsTicker  $newsTicker
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsTicker $newsTicker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsTicker  $newsTicker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsTicker $newsTicker)
    {
        $newsTicker->update($request->all());
        toastr()->info('News Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsTicker  $newsTicker
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsTicker $newsTicker)
    {
        //
    }
}
