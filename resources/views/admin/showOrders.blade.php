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
                            <th>Customer name</th>
                            <th>Customer phone</th>
                            <th>Customer address</th>
                            <th>Product title</th>
                            <th>Product quantity</th>
                            <th>Product price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->product_title}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->status}}</td>
                            <td><a href="{{ url('updatestatus',$item->id) }}" class="btn btn-warning">Delivered</a></td>
                            <td><a href="{{ url('deleteorder',$item->id) }}" onclick="return confirm('are you sure to delete this??')" class="btn btn-danger">Delete</a></td>
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
