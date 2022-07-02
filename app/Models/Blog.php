<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    private static  $blog;
    private static  $imagename;
    private static  $directory;
    private static  $imageurl;

    public static function getimageurl($image){
        self::$imagename = $image->getClientOriginalName();
        self::$directory = 'blog-images/';
        $image->move(self::$directory, self::$imagename);
        self::$imageurl = self::$directory.self::$imagename;
        return self::$imageurl;
    }

    public static function newblog($request){
        self::$blog = new Blog();
        self::$blog->title = $request->title;
        self::$blog->author = $request->author;
        self::$blog->description = $request->description;
        self::$blog->image = self::getimageurl($request->file('image'));
        self::$blog->save();
    }

    public static function updateblog($request, $id){
        self::$blog = Blog::find($id);
        if($request -> file('image')){
            if(file_exists(self::$blog->image)){
                unlink(self::$blog->image);
            }
            self::$imageurl = self::getimageurl($request->file('image'));
        }else{
            self::$imageurl = self::$blog->image;
        }
        self::$blog->title = $request->title;
        self::$blog->author = $request->author;
        self::$blog->description = $request->description;
        self::$blog->image = self::$imageurl;
        self::$blog->save();
    }

    public static function deleteBlog($id){
        self::$blog = Blog::find($id);
        if(file_exists(self::$blog->image)){
            unlink(self::$blog->image);
        }
        self::$blog->delete();
    }
}
