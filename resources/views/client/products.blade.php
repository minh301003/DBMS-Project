<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tiny Shop| Chuyên đồ điện tử</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('./vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ url('./vendor/font-awesome/css/font-awesome.min.css') }}" type="text/css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ url('./css/app.css') }}" type="text/css">
</head>

@include('client.header')
<main role="main">
        <!-- Danh sách sản phẩm -->
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Danh sách Sản phẩm</h1>
                <p class="lead text-muted">Các sản phẩm với chất lượng, uy tín, cam kết từ nhà Sản xuất, phân phối và
                    bảo hành
                    chính hãng.</p>
            </div>
        </section>

        <!-- Giải thuật duyệt và render Danh sách sản phẩm theo dòng, cột của Bootstrap -->
        <div class="row bg-white">
            
            <div class="danhsachsanpham py-5 bg-light col-lg-12">
                <div class="container">
                    <div class="row">
                    @foreach ($products as $row)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="/products/{{ $row->id }}">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="350"
                                        src="{{ url( $row->productImages[0]->image) }}">
                                </a>
                                <div class="card-body">
                                    <a class="text-success" style="text-decoration:none" href="/products/{{ $row->id }}">
                                        <h5>{{$row->name}}</h5>
                                    </a>
                                    <h6>Điện thoại</h6>
                                    <p class="card-text ">Sản phẩm của {{$row->catalog->catalog_name }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-secondary"
                                                href="/products/{{ $row->id }}">Xem chi tiết</a>
                                        </div>
                                        <small class="text-muted text-right">
                                            <s>50,600,000.00</s>
                                            <b>{{ number_format($row->price)}} VND</b>
                                        </small>
                                    </div>
                                    <form action="{{ route('cart.store') }}" method="GET" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $row->id }}" name="id">
                                            <input type="hidden" value="{{ $row->name }}" name="name">
                                            <input type="hidden" value="{{ $row->price }}" name="price">
                                            <input type="hidden" value="{{ $row->productImages[0]->image }}" name="img">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="btn btn-success" style="margin-top: 10px;"><i class=" fas fa-light fa-cart-shopping"></i>Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        

        <!-- End block content -->
</main>



@include('client.footer')
