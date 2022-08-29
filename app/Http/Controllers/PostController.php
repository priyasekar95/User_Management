<?php
namespace App\Http\Controllers;

use App\Http\Models\PostModel;
use Illuminate\Http\Request;


class PostController  extends Controller{
    public function index()
    {
       
        $data = PostModel::latest()->paginate(5);
    
        return view('posts.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        //     $randomNumber = random_number(100000, 999999);
        //    dd($randomNumber);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //     $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'name' => 'required',

        // ]);
     //dd($request->first_name.''.$request->last_name);
    //     PostModel::create($request->all());
    $randomnum = rand(0,99999);
    $postdate=new PostModel; 
    $postdate->first_name = $request->first_name;
    $postdate->last_name = $request->last_name;
    $postdate->name = $request->first_name.''.$request->last_name;
    $postdate->random_number = $randomnum;
    $postdate->save();
    $data = PostModel::latest()->paginate(5);
    return view('posts.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    //return view('posts.index')->with('success','Post created successfully.');
    // return redirect()->route('posts.index')
    //                     ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Text  $post
     * @return \Illuminate\Http\Response
     */
    public function show(PostModel $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Text  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(PostModel $post)
    {
      
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Text  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostModel $post)
    {
        $postdate=new PostModel; 
        $postdate->first_name = $request->first_name;
        $postdate->last_name = $request->last_name;
        $postdate->name = $request->first_name.''.$request->last_name;
        //$postdate->random_number = $randomnum;
       
    
      $post->update($request->all());
    //   print_r($data);
    //   exit();
    $data = PostModel::latest()->paginate(5);
      return view('posts.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Text  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostModel $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
   
}