<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function index() 
    {
        SEOTools::setTitle('Square1 | Home');
        SEOTools::setDescription('This is blog main page of Square1');
        SEOTools::opengraph()->setUrl('https://www.square1.io/ie');
        SEOTools::setCanonical('https://www.square1.io');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://www.square1.io/fonts/square1_icon.svg');

        $blogPost = new Blog();
        $column = request()->has('sort') && request()->get('sort') !== 'DEFAULT' ? 'publication_date' : 'id'; 
        $sort = 'DESC';
        if (request()->isXmlHttpRequest()) {
            $sort = request()->get('sort') == 'DEFAULT' ? 'DESC' : request()->get('sort');
            $blogPost = $blogPost->orderBy($column,$sort)
                        ->when(!request()->has('offset'),function($query){
                            $query->limit(config('database.display-shows-limit'));
                        })->when(request()->get('offset') ,function($query){
                            $query->limit(config('database.display-shows-limit'))->offset(intval(request()->get('offset', config('database.display-shows-limit'))));
                        })->get();

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
            $blogPost = $blogPost->orderBy('id', 'DESC')
                        ->limit(config('database.display-shows-limit'))
                        ->get();
            return view('index',compact('blogPost'));
        }
    }

    public function detailedBlogPost($id)
    {
        $blogPost = Blog::find($id);

        SEOTools::setTitle($blogPost->title);
        SEOTools::setDescription($blogPost->description);
        SEOTools::opengraph()->setUrl('https://www.square1.io/ie');
        SEOTools::setCanonical('https://www.square1.io');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://www.square1.io/fonts/square1_icon.svg');
        

        return view('detailed_blog_post',compact('blogPost'));
    }
}
