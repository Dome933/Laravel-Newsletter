<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>
    <div id="postsSection" class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <h2 class="post-title">{{ $post['title'] }}</h2>
                        <p class="post-content">{{ $post['content'] }}</p>
                        <p class="post-meta">Published on: {{ $post['published_at'] }}</p>
                        <a href="{{ $post['url'] }}">Read more</a>
                    </div>
                    <hr class="my-4">
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>