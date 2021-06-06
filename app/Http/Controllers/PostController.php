<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
//        $posts = DB::table('posts')->get();
//        return $posts;

        $posts = Post::with('comments')->get();
//        dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function postList(){
        $posts = Post::paginate(2);
        return view('posts.post-list', compact('posts'));
    }

    public function create(){
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function show($id){
        $post = Post::findorFail($id);
        return view('posts.show', compact('post'));
    }

    public function store(CreatePostRequest $request){
//         dd($request->all());
//        $post = new Post();
        $post = Post::create([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'string' => $request->get('string'),
        ]);

        $post->tags()->sync($request->get('tags'));
//
//        $post->title = $request->get('title');
//        $post->text = $request->get('text');
//        $post->string = $request->get('string');

//
//        $post->save();



        Post::create([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'string' => $request->get('string'),
        ]);



        return redirect()->back();


    }

    public function edit($id){

        $post = Post::findOrFail($id);
//        return view('posts.edit', compact('post'));

        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect()->back();

    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }
}
