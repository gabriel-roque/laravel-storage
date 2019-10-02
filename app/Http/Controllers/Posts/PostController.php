<?php

namespace App\Http\Controllers\Posts;

use App\Models\Posts\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
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
        try {
            $path = $request['file_image']->getClientOriginalName();

            $path = $request->file('file_image')->storeAs(
                'images/'.date('Y-m-d h:m:s'), $path
            );

            Post::create([
                'name' => $request->name,
                'path_file' => $path
            ]);
        } catch (\Exception $e) {
            return redirect(route('posts.index'));
        } finally {
            return redirect(route('posts.index'));
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
        $path_file = Post::findOrFail($id)->path_file;
        try {
            Storage::delete($path_file);
            Post::destroy($id);
        } catch (\Exception $e) {
            return redirect(route('posts.index'));
        } finally {
            return redirect(route('posts.index'));
        }
    }

    public function download($id)
    {
        $path_file = Post::findOrFail($id)->path_file;

        try {
            return Storage::download($path_file);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
