@include('header');
@include('admin.sidebar');

<div class="container mt-5">
    <h2>Create a New Product</h2>

    <!-- Product create form -->
    <form action="/your-product-store-endpoint" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input name="number" class="form-control" id="description" rows="3" placeholder="Enter product description" required></input>
        </div>

        <div class="form-group">
            <label for="description">Quantity</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter product quantity" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control-file" id="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
