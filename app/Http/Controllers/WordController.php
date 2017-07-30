<?php

namespace App\Http\Controllers;


use DB;
use App\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::all();
        $count = DB::table('words')->count();

        return view('welcome', compact('words', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),  [

                //'body' => 'required|unique:words', 
                'body' => 'required', 
                
            ]);

         //if the word has already been entered, it won't save       
        Word::firstOrCreate(request(['body', 'notes'])); 
        \flash()->overlay('Success!!!');
        
       

        //need a popup when a record is not created
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        
        return view('show', compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $word = Word::find($id);

        // show the edit form and pass the nerd
        return view('edit', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        //Word::create(request(['body', 'notes']));
        
        $word->body = $request->body;
        $word->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = Word::find($id);   

        $word->delete();
        return redirect('/');
    }
}
