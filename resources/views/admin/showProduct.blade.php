<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

</head>

<body>
    <style>
        .form-control {
            background-color: gray !important;
            color: white;
            border: white 1px solid;
        }

    </style>

    <!-- partial -->
    @include('admin.sidebar')

    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="container p-5">

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
            @endif

            <h1 class="h1 border-bottom">All Products</h1>
            <div class="container">

                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product title</th>
                                <th>Product price</th>
                                <th>Product description</th>
                                <th>Product quantity</th>
                                <th>Product image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->quantity}}</td>
                                <td><img style="height: 100px; width:100px;" src="productImage/{{$item->image}}" alt="image"></td>
                                <td><a href="{{ url('updateproduct',$item->id) }}" class="btn btn-warning">Update</a></td>
                                <td><a href="{{ url('deleteproduct',$item->id) }}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                

            </div>

        </div>

    </div>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
</body>

</html>
