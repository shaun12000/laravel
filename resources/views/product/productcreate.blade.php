@include('header');
@include('admin.sidebar');

<div class="container mt-5">
    <h2>Create a New Product</h2>


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
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" >
        </div>

        @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" >
        </div>

        @error('price')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter product description" ></textarea>
        </div>

        @error('description')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="description" rows="3" placeholder="Enter product quantity" ></input>
        </div>

        @error('quantity')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control-file" id="image" >
        </div>


        @error('image')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
