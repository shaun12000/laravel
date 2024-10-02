@include('header');
<body id="page-top">

  @include('admin.sidebar')
            

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

             
                        @if(session('success'))
                            <div class="alert alert-success">
                                <p>{{ session('success')}}</p>
                            </div>
               
         @endif
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>price</th>
                                            <th>quantity</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                    @foreach ($product as $products )
                                        
                                    
                                        <tr>
                                            <td>{{$products->category->name}}</td>
                                            <td>{{$products->name}}</td>
                                            <td>{{$products->price}}</td>
                                            <td>{{$products->quantity}}</td>
                                            <td>{{$products->description}}</td>
                                            <td>
                                                @if ($products->image)
                                                  <img src="{{ asset('/storage/' . $products->image)}}" alt="" height="50px" width="70px">  
                                                  @else
                                                  <p>No image found</p>
                                                @endif
                                            </td>
                                            <td> <a href="{{route('products.destroy', $products->id)}}"> <i class="fas fa-edit"> </i> </a></td>

                                            <form action="{{route('products.destroy', $products->id )}}" method="POST">
                                               
                                              @csrf
                                              @method('DELETE')
                                            <td>  <button type="submit" onclick="return confirm('sure?')"><i class="fas fa-trash-alt"> </i></button> </td>
                                            </form>
                                        </tr>
                                        @endforeach


                                        @if ($product->isEmpty())
                                            <tr>
                                                <td>No product</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

   @include('footer');

</body>