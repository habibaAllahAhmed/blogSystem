<div class="post  position-relative border rounded-3 border-light p-3 ">
    <div class="row">
        <div class="col-lg-2  text-center">
            <div class="item">
                @if($post->deleted_at !==null)
                <span class="badge text-bg-danger position-absolute " style="width: fit-content; top:10px; right:10px;">Deleted</span>
                @endif
                <h5>{{ $post->author_name }}</h5>
                <img src="{{ Vite::asset('resources/images/default.png') }}" class="img-fluid" style="width: 100px;" alt="">
            </div>
        </div>
        <div class="col-lg-10">
            <div class="item">
                <h4>{{ $post->title }}</h4>
                <h5>{{ $post->date }}</h5>
                <p>{{ $post->body }}</p>
                @if($operations)
                <div class="operations">
                    @if($post->deleted_at ==null)
                    <a href="{{route('post.edit', ['id' => $post->id]) }}" class="btn btn-info">Edit</a>
                    <a href="{{route('post.delete', ['id' => $post->id]) }}" class="btn btn-warning">Delete</a>
                    @endif
                    @if($post->deleted_at !==null)
                    <a href="{{route('post.restore', ['id' => $post->id]) }}" class="btn btn-primary">restore</a>
                    @endif
                    <a href="{{route('post.force_delete', ['id' => $post->id]) }}" class="btn btn-danger">Force delete</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>