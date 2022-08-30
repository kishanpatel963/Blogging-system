@extends('master')
 @if (isset($blogPost))
 @section('title','Update Blog Post')
 @else
 @section('title','Create Blog Post')
 @endif
<style>
    label.error {
         color: #dc3545;
         font-size: 14px;
    }
</style>
@section('content')
    <section class="cta-section theme-bg-light py-5">
        <div class="container text-center">
            @if (isset($blogPost))
            <h2 class="heading">Update Bolg Post</h2>
            @else
            <h2 class="heading">Create Bolg Post</h2>
            @endif
            
        </div>
    </section>
    @if (isset($blogPost))
    {!! Form::model($blogPost,['route' => ['updateBlog',$blogPost->id], 'method' => 'PUT','id' => 'from_data']) !!}
    @endif
    {{ Form::open(['route'=>'storeBlog','method'=>'POST','id' => 'from_data']) }}
        <section class="blog-list px-3 py-5 p-md-5">
            <div class="alert alert-warning alert-dismissible fade show" id="alertBox" role="alert" style="display: none">
                <p id="alertData"></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
		    <div class="container">
                <div class="form-group form-floating mb-3">
                    {{ Form::label('floatingName', 'Title') }}
                    {{ Form::text('title', isset($blogPost->title) ? $blogPost->title : old('title'), ['class' => 'form-control','placeholder' => 'Title','required' => true,'autofocus' => true]) }}
                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    {{ Form::label('floatingDescription', 'Description') }} 
                   {{ Form::textarea('description', isset($blogPost->description) ? $blogPost->description : old('description'), ['class' => 'form-control','rows' => '6','id' => 'post_desc','placeholder' => 'description','required' => true,'autofocus' => true,'data-msg' => 'Please write something :)']) }}
                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>
        
                <div class="form-group form-floating mb-3">
                    {{ Form::label('floatingDate', 'Publication Date') }}
                    {{ Form::text('publication_date', isset($blogPost->publication_date) ? $blogPost->publication_date : old('publication_date'), ['class' => 'form-control','id' => 'post_date','placeholder' => 'Publication Date','required' => true,'autofocus' => true]) }}
                    @if ($errors->has('publication_date'))
                        <span class="text-danger text-left">{{ $errors->first('publication_date') }}</span>
                    @endif
                </div>
                {!! Form::submit(isset($blogPost) ? 'Update' : 'Create',['class'=>'w-100 btn btn-lg btn-primary','id' => 'post_data'])!!}
            </div>
        </section>
    {{Form::close()}}   
@endsection

@section('pagejs')
{!! Html::script('assets/js/create_update_post.js') !!}
@endsection