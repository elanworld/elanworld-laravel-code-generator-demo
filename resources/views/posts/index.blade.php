@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {!! session('success_message') !!}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card text-bg-theme">

        <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h4 class="m-0">Posts</h4>
            <div>
                <a href="{{ route('posts.posts.create') }}" class="btn btn-secondary" title="Create New Posts">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>

        @if(count($postsObjects) == 0)
            <div class="card-body text-center">
                <h4>No Posts Available.</h4>
            </div>
        @else
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Content</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($postsObjects as $posts)
                        <tr>
                            <td class="align-middle">{{ $posts->content }}</td>

                            <td class="text-end">

                                <form method="POST" action="{!! route('posts.posts.destroy', $posts->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('posts.posts.show', $posts->id ) }}" class="btn btn-info" title="Show Posts">
                                            <span class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('posts.posts.edit', $posts->id ) }}" class="btn btn-primary" title="Edit Posts">
                                            <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Posts" onclick="return confirm(&quot;Click Ok to delete Posts.&quot;)">
                                            <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            {!! $postsObjects->links('pagination') !!}
        </div>

        @endif

    </div>
@endsection
