<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add form</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body>
<div class="bg-blue-200 min-h-screen flex items-center">
    <div class="w-full">
        <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Fill out our form</h2>
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            <form action="{{route('posts.update',['post'=>$post->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="title" class="block mb-2 font-bold text-gray-600">Title</label>
                    <input type="text" id="title" name="title" placeholder="Put in your title." class="border border-gray-300 shadow p-3 w-full rounded " value="{{$post->title}}">
                    @error('title')
                            <small class="text-red-400">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="url" class="block mb-2 font-bold text-gray-600">Url</label>
                    <input type="text" id="url" name="url" placeholder="Put in your url." class="border border-red-300 shadow p-3 w-full rounded " value="{{$post->url}}">
                    @error('url')
                            <small class="text-red-400">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="image" class="block mb-2 font-bold text-gray-600">Image</label>
                    <input type="file" id="image" name="image" placeholder="Put in your image." class="border border-red-300 shadow p-3 w-full rounded " value="{{$post->image}}">
                    @error('image')
                            <small class="text-red-400">{{$message}}</small>
                    @enderror
                    <a target="_blank"href="{{asset('uploads/'.$post->image)}}">

            <img width="50" height="50" src="{{asset('uploads/'.$post->image)}}"/>
        </a> 
                </div>

                <button class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Update Post</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>