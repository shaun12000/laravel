@include('header');
@include('admin.sidebar');

<div class="container mt-5">
    <h2>Create a category</h2>


@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger">

    @foreach ($errors->all() as $err)
      <p class="text-danger">{{$err}} </p>  
    @endforeach

</div>
    
@endif

    <!-- Product create form -->
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" >
        </div>

        @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror

        <div class="form-group">
            <label for="price">Slug</label>
            <input type="" name="slug" class="form-control" id="price" placeholder="Enter slug" >
        </div>

        @error('url')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



   

<div class="container">
    <h1>Category List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        
            @if($allcategory->isEmpty())
                <tr>
                    <td colspan="3">No categories found.</td>
                </tr>
            @else
                @foreach($allcategory as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>


</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
