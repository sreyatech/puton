<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
  @include('admin.css')
</head>

<body>
    
        <!-- partial -->
        @include('admin.sidebar')
        
        @include('admin.navbar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">

            @include('admin.body')
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