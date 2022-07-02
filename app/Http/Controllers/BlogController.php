<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blog;
    private $blogs;

    public function index(){
        return view('blog.add');
    }
    public function create(Request $request){
        Blog::newblog($request);
        return redirect('/add-blog')->with('message','Blog info create Successfully.');
    }
    public function manage(){
        $this->blog = Blog::all();
        return view('blog.manage',['blogs'=>$this->blog]);
    }
    public function edit($id){
        $this->blogs = Blog::find($id);
        return view('blog.edit', ['blog' => $this->blogs]);
    }
    public function update(Request $request, $id){
        Blog::updateblog($request,$id);
        return redirect('manage-blog')->with('message','Blog updated Successfully.');
    }
    public function delete($id){
        Blog::deleteBlog($id);
        return redirect('manage-blog')->with('message','Blog Deleted Successfully.');
    }
}
