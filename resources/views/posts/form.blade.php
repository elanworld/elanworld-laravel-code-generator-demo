
<div class="mb-3 row">
    <label for="content" class="col-form-label text-lg-end col-lg-2 col-xl-3">Content</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" type="text" id="content" value="{{ old('content', optional($posts)->content) }}" minlength="1" maxlength="4294967295" required="true" placeholder="Enter content here...">
        {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="published_at" class="col-form-label text-lg-end col-lg-2 col-xl-3">Published At</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('published_at') ? ' is-invalid' : '' }}" name="published_at" type="text" id="published_at" value="{{ old('published_at', optional($posts)->published_at) }}" placeholder="Enter published at here...">
        {!! $errors->first('published_at', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="title" class="col-form-label text-lg-end col-lg-2 col-xl-3">Title</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" type="text" id="title" value="{{ old('title', optional($posts)->title) }}" minlength="1" maxlength="400" required="true" placeholder="Enter title here...">
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

