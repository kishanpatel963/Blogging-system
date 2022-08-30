<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Console\Command;

class GetBlogPostHourlyBaseBlogPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogpost:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrive BlogPost From herokuapp';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email','Square1@gmail.com')->first();
        $httpClient = new \GuzzleHttp\Client();
        $request =  $httpClient
                    ->get("https://sq1-api-test.herokuapp.com/posts");
        $response = json_decode($request->getBody()->getContents(),true);
        $blogPost = [];
        foreach ($response as $key => $value) {
            foreach ($value as $data => $column) {
                $blogPost[] = [
                    'user_id'          => $user->id,
                    'title'            => $column['title'],
                    'description'      => $column['description'],
                    'publication_date' => $column['publication_date'],
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now(),
                ] ;
            }
        }

        if (count($blogPost) > 0) {
            $post = Blog::insert($blogPost);
            if ($post) {
                $this->info('Blog Post Create Successfully');
            }else{
                $this->error('Something Went Wrong');
            }
        }else{
            $this->error('Blog Post Not Found');
        }
    }
}
