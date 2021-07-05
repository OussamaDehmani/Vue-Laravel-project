<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Http\Resources\Document as DocsRessource;

class DocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DocsRessource::collection(Document::orderby('created_at','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Document::create($request->all());
         $docs=Document::orderby('created_at','desc')->get();
         return response()->json($docs);
        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doc=Document::find($id);
        //return $request->title;
        if($request->title){$doc->title = $request->title;}
        if($request->subtitle){ $doc->subtitle = $request->subtitle;}
        if($request->summary){ $doc->summary = $request->summary;}
        
       
       
        $doc->update();
       // $affectedRows = Post::where("id", $id)->update(["title" => $request('subtitle'),"title" => $request('subtitle'),"title" => $request('summary')]);
        return Document::orderby('updated_at','desc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc=Document::find($id);
        $doc->delete();
        return Document::orderby('created_at','desc')->get();
        
     
    }


        public function edit($id)
    {
        $doc=Document::find($id);
        
       return response()->json($doc);
        
     
    }
}
