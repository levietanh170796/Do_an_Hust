<?php

namespace App\Http\Controllers;

use App\QuestionsOption;
use Illuminate\Http\Request;

class QuestionsOptionsController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\QuestionsOption  $questionsOption
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionsOption $questionsOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionsOption  $questionsOption
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionsOption $questionsOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionsOption  $questionsOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionsOption $questionsOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionsOption  $questionsOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionsOption $questionsOption)
    {
        //
    }
}
