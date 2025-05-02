<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload (Single + Multiple)</title>
</head>
<body>
    <h1>Single Image Upload</h1>
    <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <h1>Multiple Images Upload</h1>
    <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required>
        <button type="submit">Upload</button>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h2>Uploaded Photos</h2>
    @if($photos->count())
        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
            @foreach($photos as $photo)
                <div style="border: 1px solid #ccc; padding: 10px;">
                    <img src="{{ asset('images/' . $photo->image) }}" alt="photo" width="150">
                    <form action="{{ route('photos.delete', $photo->id) }}" method="POST" onsubmit="return confirm('Delete this photo?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red;">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div style="margin-top: 20px;">
            {{ $photos->links() }}
        </div>
    @else
        <p>No photos uploaded yet.</p>
    @endif
</body>
</html>
