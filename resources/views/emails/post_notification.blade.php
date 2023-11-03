<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('New Post Notification') }}</title>
</head>
<body>
<h2>{{ __('New Post Notification') }}</h2>

<p>
    {{ __('A new post has been published on :website', ['website' => $post->website->name]) }}:
</p>

<h3>{{ $post->title }}</h3>
<p>{{ $post->description }}</p>

</body>
</html>
