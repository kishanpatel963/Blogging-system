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
    @endif