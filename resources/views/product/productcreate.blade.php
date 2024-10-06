@include('header')
@include('admin.sidebar')

<div class="container mt-5">
    <h2>Create a New Product</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                <p class="text-danger">{{ $err }}</p>  
            @endforeach
        </div>
    @endif

    <!-- Product create form -->
    <form enctype="multipart/form-data" id="productform">
        @csrf

        <div class="form-group">
            <label for="category">Select a category:</label>
            <select id="category" name="category_id" required>
                @foreach ($allcategory as $allcat)
                    <option value="{{ $allcat->id }}">{{ $allcat->name }}</option>
                @endforeach
            </select> 
        </div>

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter product description"></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter product quantity" required>
            @error('quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control-file" id="image" required>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="message"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        // Set the CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#productform').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Create a FormData object for file uploads
            let formData = new FormData(this);

            // AJAX request to store the product
            $.ajax({
                url: "{{ route('products.store') }}", // Laravel route for storing products
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Show success message
                    $('#message').html('<p style="color:green;">Product created successfully!</p>');
                    
                    // Clear the form after successful submission
                    $('#productform')[0].reset();
                },
                error: function(xhr) {
                    // Show error message
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '<ul style="color:red;">';
                    $.each(errors, function(key, value) {
                        errorMessage += '<li>' + value[0] + '</li>';
                    });
                    errorMessage += '</ul>';
                    $('#message').html(errorMessage);
                }
            });
        });
    });
</script>
