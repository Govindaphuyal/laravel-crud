<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::query()->paginate(20);
        // return view('posts.index',compact('posts'));
         return view('posts.index',['posts'=>$posts]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
         $request->validate([
            'title'=>'required|string|min:2|max:100',
            'url'=>'required|alpha_dash|min:2|max:100',
            'image'=>'required|image|mimes:jpg,png,jpeg|max:2048'

        ]);
        $imageName = md5($request->image . time()) . '.' . $request->image->extension();
        $request->file('image')->move(public_path('uploads'),$imageName);
        
        $post=new Post();
        $post->title=$request->title;
        $post->url=$request->url;
        $post->image=$imageName ;

        $post->save();
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::query()->where('id', '=', $id)->first();

    if (!$post) {
        abort(404);
    }
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::query()->where('id','=',$id)->first();
        if(!$post){
            abort(404);
        }
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::query()->where('id', '=', $id)->first();

        if (!$post) {
            abort(404);
        }
        
        $request->validate([
            'title' => 'required|string|min:2|max:100',
            'url' => 'required|alpha_dash|min:2|max:100',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        
        if ($request->file('image')) {
            File::delete(public_path('uploads/' . $post->image));
            $imageName = md5($request->image . time()) . '.' . $request->image->extension();
            $request->file('image')->move(public_path('uploads'), $imageName);
            $post->image = $imageName;
        }
        
        $post->title = $request->title;
        $post->url = $request->url;
        
        $post->save();
        
        return redirect()->route('posts.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::query()->where('id', '=', $id)->first();

    if (!$post) {
        abort(404);
    }

    // Delete associated image if exists
    // if ($post->image && File::exists(public_path('uploads/' . $post->image))) {
        File::delete(public_path('uploads/' . $post->image));
    // }

    $post->delete();

    return redirect()->route('posts.index');
    }
}
