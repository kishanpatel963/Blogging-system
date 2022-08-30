@extends('master')
@section('title','Welcome To Blog')
@section('content')
    <div class="p-5 rounded">
        <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">{{Auth::user()->name.'`s blog'}}</h2>
			    <div class="intro">Welcome to blog.</div>
		    </div><!--//container-->
	    </section>
		<div style="position:relative;" id="blogData" data-url={{ route('blogIndex') }}>
			<section class="blog-list px-3 py-5 p-md-5">
				<div class="container">
						@if (count($blogPost) > 0)
						@foreach ($blogPost as $key => $item)
						<div class="item mb-5 ">
							<div class="media">
								<div class="media-body ">
										<h3 class="title mb-1"><a href="{{ route('detailedPost', $item->id) }}">{{ $item->title }}</a></h3>
										<?php $dayDiff = dayDifference($item->publication_date); ?>
										<div class="meta mb-1"><span class="date">{{ $dayDiff == 0 ? 'Today' : 'Published ' .$dayDiff.' days ago' }} </span><span class="time">{{readingDuration($item->description)}} min read</span><span class="comment"><a href="">Publice by {{ auth()->check() ? ($item->user->id == auth()->user()->id ? 'You' : $item->user->name) : $item->user->name  }}</a></span></div>
										<div class="intro">{!! Str::limit($item->description,200, "...") !!}</div>
										<a class="more-link" href="{{ route('detailedPost', $item->id) }}">Read more &rarr;</a>
										@if (isAdmin())
										<div class="d-flex justify-content-end">
											<a class="text-warning" href="{{ route('editBlog', $item->id) }}"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a class="text-danger deleteBlogPost" href="#" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
										</div>
										@endif
								</div>
							</div>
						</div>
						@endforeach
						@else
						<div class="item mb-5">
							<div class="media">
								<div class="media-body text-center">
									<h3 class="title mb-1">Post Is Not Available</h3>
								</div>
							</div>
						</div>
						@endif
				</div>
			</section>
		</div>
		<section class="blog-list d-flex justify-content-center">
			<div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12 text-center showsLoader" style="display: none">
				<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i>
			</div>
		</section>
    </div>
@endsection
@section('pagejs')
<script>
	var showViewLimitOffset = parseInt('<?php echo config('database.display-shows-limit'); ?>');
	var isMoreShowsExists = '{{ (count($blogPost) >= config("database.display-shows-limit"))? "true": "false" }}';
</script>
{!! Html::script('assets/js/index_data.js') !!}
@endsection