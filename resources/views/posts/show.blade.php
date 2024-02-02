@extends('layouts.app')

@section('content')

<div class="card text-bg-theme">

     <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h4 class="m-0">{{ isset($posts->title) ? $posts->title : 'Posts' }}</h4>
        <div>
            <form method="POST" action="{!! route('posts.posts.destroy', $posts->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <a href="{{ route('posts.posts.edit', $posts->id ) }}" class="btn btn-primary" title="Edit Posts">
                    <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                </a>

                <button type="submit" class="btn btn-danger" title="Delete Posts" onclick="return confirm(&quot;Click Ok to delete Posts.?&quot;)">
                    <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                </button>

                <a href="{{ route('posts.posts.index') }}" class="btn btn-primary" title="Show All Posts">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('posts.posts.create') }}" class="btn btn-secondary" title="Create New Posts">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>

            </form>
        </div>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="text-lg-end col-lg-2 col-xl-3">Content</dt>
            <dd class="col-lg-10 col-xl-9">{{ $posts->content }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Created At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $posts->created_at }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Published At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $posts->published_at }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Title</dt>
            <dd class="col-lg-10 col-xl-9">{{ $posts->title }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Updated At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $posts->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection