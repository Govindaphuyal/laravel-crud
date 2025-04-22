<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
    <div class="container my-5 py-5">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover table-bordered table-sm table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Title</th>
                                <th scope="col">Url</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->url }}</td>
        <td><a target="_blank"href="{{asset('uploads/'.$post->image)}}">

            <img width="50" height="50" src="{{asset('uploads/'.$post->image)}}"/>
        </a>
        </td>
        <td><a href=""class="btn btn-sm btn-primary">Edit</a>
        <a class="btn btn-sm btn-danger">delete</a>
    </td>
    </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
                <div class="my-3">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
</html>