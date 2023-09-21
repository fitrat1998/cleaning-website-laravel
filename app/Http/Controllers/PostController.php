<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Collection;
// use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
       $this->authorizeResource(Post::class, 'post');
    }

    
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index')->with('posts',$posts);
    }

    
    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(), 
            'tags' => Tag::all(), 
        ]);
    }

    
    public function store(StorePostRequest $request)
    {

        if($request->hasfile('photo')){
            $name = $request->file('photo')->getClientOriginalName();
            $photo = $request->file('photo')->storeAs('post-photos',$name);
        }


        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $photo ?? null
        ]);

        if(isset($request->tags)){
            foreach($request->tags as $tag){
                $post->tags()->attach($tag);
            }
        }

        return redirect()->route('posts.index');
    }

    
    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    
    public function edit(Post $post)
    {
       return view('posts.edit')->with('post',$post);
    }

    
    public function update(StorePostRequest $request, Post $post)
    {

        if($request->hasfile('photo')){

            if(isset($post->photo)){
                Storage::delete($post->photo);
            }

            $name = $request->file('photo')->getClientOriginalName();
            $photo = $request->file('photo')->storeAs('post-photos',$name);
        }

        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $photo ?? $post->photo
        ]);

        return redirect()->route('posts.show', ['post'=> $post->id ]);
    }

    
    public function destroy(Post $post)
    {
        
        if(isset($post->photo)){
            Storage::delete($post->photo);
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}
