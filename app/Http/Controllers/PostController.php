<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){

        // selete * from posts
        $postsFromDB = Post::all();// collection object
        // dd($postsFromDB);


        //id, title(var char), description(TEXT), created_at, updated_at

        // this is static database not usefull in laravel
        // $allposts = [
        //     ['id' => 1, 'title' => 'PHP Basics', 'posted_by' => 'ahmed', 'created_At' => '2024-06-01'],
        //     ['id' => 2, 'title' => 'Bootstrap Table', 'posted_by' => 'mohamed', 'created_At' => '2024-06-02'],
        //     ['id' => 3, 'title' => 'Laravel CRUD', 'posted_by' => 'mahmoud', 'created_At' => '2024-06-03'],
        //     ['id' => 4, 'title' => 'JavaScript Basics', 'posted_by' => 'ali', 'created_At' => '2024-06-04']
        // ];

        return view('posts.index',['posts'=>$postsFromDB]);
    }


    // convention over configuration
    public function show(Post $post)// type hinting and route model binding
    {
        // selete * from posts where id = $postId limit 1;
        
        // $singlePostFromDB = Post::findOrFail($postId);
        
        // if id not exist in database return 404 page not found or return to posts.index page;
        // $singlePostFromDB = Post::findOrFail($postId);

        // if(is_null($singlePostFromDB)){
        //     return  to_route('posts.index');
        // }

        // how to get single post from database with laravel 
        
        // $singlePostFromDB = Post::where('id', $postId)->first();


        // $singlePostFromDB = Post::where('id', $postId)->get();//collection object


        // Post::where('title', 'php')->first(); // selet * from posts where title = 'php' limit 1;
        // Post::where('title', 'php')->get(); // selet * from posts where title = 'php' ;
        // dd(
        // );
        
        // we remove the static value 
        // $singlePost = [
        //     'id' => 1,
        //     'title' => 'PHP Basics',
        //     'description'=>'this is description',
        //     'email'=>'amhed@gmail.com',
        //     'posted_by' => 'ahmed',
        //     'created_At' => '2024-06-01'
        // ];
        return view('posts.show', ['post' => $post]);
    }

 

    
    public function create(){
        $Users = User::all();
        // dd($Users);
        return view('posts.create',['users'=>$Users]);
    }

    public function store(){
    
    // code to validate the data 
    request()->validate([
        'title' => 'required|string|max:255|min:3',
        'description' => 'required|string',
        'post_creator' => 'required|exists:users,id'
    ]);
    
    
    //1- get user data 
        // with php 
        // $data = $_POST;
        // return $data;

        
        // with laravel 
        // @dd($request->title,$request->all());
        // $request = request();


        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // dd($data, $title,$description,$postCreator);
        
        //2- store the user data in database

        // first way to store data in database with laravel
        // $post = new Post();

        // $post->title = $title;
        // $post->description = $description;

        // $post->save();// insert into posts (title, description) values ($title, $description);

        // second way to store data in database with laravel
        Post::create([
            'title' => $title,
            'description' => $description,
            'xyz' =>'some value' ,// it will be ignored because it is not fillable in post model
            'user_id' => $postCreator
        ]);

        // User::create([
        //     'name' => $postCreator,
        //     'email' => $postCreator . '@example.com',
        //     'password' => 'password'
        // ]);




        //3- redirection to postas.index 
        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
  
        $Users = User::all();
        // dd($Users);
        return view('posts.edit',['users'=>$Users],['post'=>$post]);
    }
    
    public function update($postId){

        // code to validate the data 
        request()->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string',
            'post_creator' => 'required|exists:users,id'
        ]);
        // dd($postId);
        //1- get user data 
        
        // with php 
        // $data = $_POST;
        // return $data;

        // with laravel 
        // $request = request();
        // @dd($request->title,$request->all());

        // $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;


        // dd($title,$description,$postCreator);
        // return $data;
        
        //2- update the user data in database
        $post = Post::findOrFail($postId);
        
        $post->update([
        'title' => $title,
        'description' => $description,
        'user_id' => $postCreator
    ]);
        //3- redirection to posts.show 
        return to_route('posts.show',$postId);
    }

    public function destroy($postId)
    {

        //1- delete post from database

            // select or find the post 
            // delete the post from database
        $post = Post::find($postId);  // with model event
        $post->delete();

        // Post::where('id', $postId)->delete();

        //2- redirection to posts.index
        return to_route('posts.index');
    }
}
// ['key' => 'value']