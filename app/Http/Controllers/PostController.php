<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostFormRequest;
use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenant = auth()->user()->Tenant;
        $posts = Post::get();

        return view('posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUpdatePostFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePostFormRequest $request)
    {
        #dd($request->all());

        try {
            $post = $request->user()->Post()->create($request->all());

            return redirect()->back()->with('success', 'Cadastro realizado.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar');
        }
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
