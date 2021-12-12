<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

</head>

<body>
    <style>
        .form-control{
            background-color: gray!important;
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

            <h1 class="h1">Add Product</h1>
            <div class="container">

                <form action="{{ url('uploadproduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Product title : </label>
                        <input type="text" class="text-white form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product price : </label>
                        <input type="tel" class="text-white form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product description : </label>
                        <textarea type="text" rows="5" class="text-white form-control" id="description" name="description"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product quantity : </label>
                        <input type="text" class="text-white form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="text-white" id="file" name="file" required>
                    </div>

                    <input type="submit" class="btn btn-primary">
                </form>
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
