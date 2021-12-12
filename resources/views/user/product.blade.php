<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                    <form action="{{ url('search') }}" method="GET" class="form-inline"
                        style="float: right; padding: 5px;">
                        @csrf
                        <input type="search" class="form-control" name="search" placeholder="search">
                        <input type="submit" value="search" class="btn btn-success">
                    </form>
                </div>
            </div>
            @foreach($data as $item)
            <div class="col-md-4">
                <div class="product-item">
                    <a href="#"><img src="productImage/{{$item->image}}" alt="product image"></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>{{$item->title}}</h4>
                        </a>
                        <h6>${{$item->price}}</h6>
                        <p>{{$item->description}}</p>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                            <form action="{{ url('addcart',$item->id) }}" method="POST">
                                @csrf
                                <input type="number" value="1" min="1" class="form-control mb-2" name="quantity">
                                <input type="submit" class="btn btn-primary" value="Add Cart">
                            </form>
                        <!-- <span>Reviews (24)</span> -->
                    </div>
                </div>
            </div>
            @endforeach

            @if(method_exists($data,'links'))
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
            @endif


        </div>
    </div>
</div>
