<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(News::all());
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
        News::create(array(
            'Title' => Request::input('Title'),
            'Content' => Request::input('Content')
        ));
        //return response()->json(Request::all());
        return response()->json(array("success"=>true));
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
        $updateNews = News::find(Request::input('NewsID'));
        $updateNews->Title  = Request::input('Title');
        $updateNews->Content = Request::input('Content');        
        $updateNews->save();
        return response()->json(array("success"=>true));
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
        $updateNews = News::find($id);
        $updateNews->delete();
        return response()->json(array("success"=>true));
    }
}
