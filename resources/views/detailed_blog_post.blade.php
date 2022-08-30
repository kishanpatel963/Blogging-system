@extends('master')
@section('meta')
{!! SEO::generate() !!}
@endsection
@section('title',$blogPost->title)
@section('content')
<div class="container h-100">

    <div class="p-5 rounded">
        <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">{{ $blogPost->title }}</h2>
			    <div class="intro">Welcome to {{ $blogPost->title }}</div>
		    </div><!--//container-->
	    </section>
		<article class="blog-post px-3 py-5 p-md-5">
		    <div class="container">
				
				<div class="blog-post-body">
					<p>{!! $blogPost->description !!}</p>
			    </div>
				<header class="blog-post-header">
					<?php $dayDiff = dayDifference($blogPost->publication_date); ?>
					<div class="meta mb-3"><span class="date">{{ $dayDiff == 0 ? 'Today' : 'Published ' .$dayDiff.' days ago' }}</span><span class="time">{{readingDuration($blogPost->description)}} min read</span><span class="comment">Publice by {{ auth()->check() ? ($blogPost->user->id == auth()->user()->id ? 'You' : $blogPost->user->name) : $blogPost->user->name  }}</span></div>
				</header>
		    </div>
	    </article>
    </div>
</div>
@endsection