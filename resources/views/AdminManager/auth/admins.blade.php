@include('admin.admin_header')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách nhân viên</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Backup Data</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        @if (session('message'))
            <h5 class="alert alert-success">{{ session('message') }} </h5>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên Admin</th>
                <th scope="col">Email</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @foreach($admins as $row)
            <tr>
                <th scope="row">{{ $row->id }}</th>
                <td>{{ $row->name}}</td>
                <td>{{ $row->email}}</td>
                @if($row->lv == '0')
                    <td>Nhân viên</td>
                    @else
                    <td>Quản lý</td>
                    @endif
                <td>
                    <button type="button" class="btn btn-success"><a href="/admin/admins/edit/{{ $row->id }}"><i class="fas fa-edit"></i></a></button>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></button>
                </td>
            
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn chắc chắn muốn xóa nhân viên này chứ?
                                    {{ $row->id }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <form method="POST" action="admin/admins/delete/{{ $row->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>   
                                </div>
                            </div>
                        </div>
                    </div>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')