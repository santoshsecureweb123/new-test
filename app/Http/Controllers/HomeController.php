<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    } 
    public function post_insert(Request $request)
    {
       $data=$request->all();
       $rule=array(
       'post_title'=>'required',
       'post_description'=>'required'
       );
  /*  $message=array(
        'post_title.required'=>'Title Is Required',
        'post_description.required'=>'Title Is Required'
    );*/
        $validate=Validator::make($data,$rule);
        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate);
//            return redirect('/home')->withErrors($validate);
        }
        else {
            $value=array_except($data,['_token']);
            DB::table('postdata')->insert($value);
            return redirect('/home')->with('success','Post Data insert succesfully');
        }
    }
    
    public function show_post(){
        $post_data=DB::table('postdata')->get()->all();
//        echo '<pre>'; print_r($post_data);
        return view('showpost',compact('post_data'));
    }
    public function edit_post($id){
       $post_data = DB::table('postdata')->where('id',$id)->first();
//         echo '<pre>'; print_r($post_data);
        return view('edit_post',compact('post_data'));
    }  
    
    public function update_post(Request $request,$id){
        $data=$request->all();
        $value=array_except($data,['_token']);
        DB::table('postdata')->where('id', $id)->update($value);
         return Redirect::to('/posts');
       
    }
}
