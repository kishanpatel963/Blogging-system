<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogPostRequest;
use Illuminate\Support\Carbon;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOTools;

class BlogController extends Controller
{

    public function index(Type $var = null)
    {
        SEOTools::setTitle('Square1 | Home');
        SEOTools::setDescription('This is blog main page of Square1');
        SEOTools::opengraph()->setUrl('https://www.square1.io/ie');
        SEOTools::setCanonical('https://www.square1.io');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://www.square1.io/fonts/square1_icon.svg');

        if (request()->isXmlHttpRequest()) {
            $blogPost = Blog::where('user_id',Auth::user()->id)
                        ->orderBy('id', 'DESC')
                        ->limit(config('database.display-shows-limit'))
                        ->offset(intval(request()->get('offset', config('database.display-shows-limit'))))
                        ->get();
            if ($blogPost) {
                return response()->json([
                    'status' => 'success',
                    'isMoreShowsExists' => $blogPost->count(),
                    'view' => view('load_blog_post', compact('blogPost'))->render()
                ]);
            }else{
                return response()->json([
                    'status' => 'error', 
                    'message' => 'No more shows are available'
                ]);
            }
        }else{
            $blogPost = Blog::where('user_id',Auth::user()->id)
                        ->orderBy('id', 'DESC')
                        ->limit(config('database.display-shows-limit'))
                        ->get();
            return view('blogPost.blog_index',compact('blogPost'));
        }
    }

    
    public function create()
    {
        return view('blogPost.create_update_blog');
    }

    public function store(BlogPostRequest $request)
    {
        $data = [];
        $data['user_id'] = Auth::user()->id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['publication_date'] = Carbon::parse($request->publication_date)->format('Y-m-d H:i:s');
        $blogPost = Blog::create($data);

        if ($blogPost) {
            return response()->json(['status' => 'success',
            'message' => 'Blog Created',
            'url' => url('/')]);
        }else{
            return response()->json(['status' => 'failed',
            'message' => 'Blog Not Created']);
        }
    }

    public function edit($id)
    {
        $blogPost = Blog::where('id',$id)->first();
        return view('blogPost.create_update_blog',compact('blogPost'));
    }

    public function update(BlogPostRequest $request,$id)
    {
        $blogPost = Blog::find($id);
        $blogPost->title = $request->title;
        $blogPost->description = $request->description;
        $blogPost->publication_date = Carbon::parse($request->publication_date)->format('Y-m-d H:i:s');
        $blogPost->save();
        
        if ($blogPost) {
            return response()->json(['status' => 'success',
            'message' => 'Blog Updated',
            'url' => url('/')]);
        }else{
            return response()->json(['status' => 'failed',
            'message' => 'Blog Not Updated']);
        }
    }

    public function destroy($id)
    {
        $blogPost = Blog::find($id);
        $blogPost->delete();

        return response()->json(['status' => 'success',
            'message' => 'Blog deleted']);
    }
}
