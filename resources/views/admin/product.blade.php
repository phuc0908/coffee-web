<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Manage Products</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="shortcut icon" href="/img/logo_admin.png" type="img/icon" />
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/material.css') }}">
    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">

</head>
<style>
    .th-action:before {
        visibility: hidden;
    }

    .th-action:after {
        visibility: hidden;
    }

    .td-des {
        padding: 10px !important;
    }

    .td-des figure table {
        border-left: groove thin;
        border-bottom: groove thin;
    }

    .td-action div {
        display: flex !important;
        justify-content: space-evenly;
        align-items: center;
    }

    .td-action {
        width: 100px !important;
    }

    .modal-content {
        width: 700px !important;
        right: 80px;
    }

    .td-image {
        position: relative;
        cursor: default;
    }

    .picture {
        position: absolute;
        display: none;
        width: 100px;
        height: 100px;
        object-fit: contain;
        top: -78px;
    }

    .txtImage:hover {
        color: rgb(77, 114, 223);
    }

    .txtImage:hover+.picture {
        display: block;
    }

    .div-action {
        display: flex;
        flex-wrap: wrap;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-------------------------------------------------------------------------------- SIDEBAR -->
        @include('admin.components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-------------------------------------------------------------------------------- TOPBAR -->
                @include('admin.components.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Dialog -->
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Product List</h1>
                        <button onclick="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModal" style="display: flex !important;align-items: center;">
                            <ion-icon name="add-circle"></ion-icon> <span style="margin-left: 3px;">Add Product</span>
                        </button>

                        <!-------------------------------------------------------------------------------- MODALS -->
                        @include('admin.modals.productmodal')

                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product DataTables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th class="th-action">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(!empty($products))
                                        @foreach ($products as $key => $value)
                                        <tr id="product-{{$value->id}}">
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->category}}</td>
                                            <td class="td-image">
                                                <span class="txtImage">
                                                    {{$value->image}}
                                                </span>
                                                <img id="dialog-image" class="picture" src="{{asset('storage/products/1722413918_milktea.png')}}" alt="Product Image">
                                            </td>
                                            <td>{{$value->price}}</td>
                                            <td class="td-des">{!! $value->description !!}</td>
                                            <td class="td-action">
                                                <div class="div-action">
                                                    <a href="#" class="btn btn-info btn-circle btn-sm" data-id="{{$value->id}}">
                                                        <i class=" fas fa-info-circle"></i>
                                                    </a>
                                                    <a href="" class="btn btn-warning btn-circle btn-sm" data-id="{{$value->id}}">
                                                        <i class=" fas fa-pen"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-circle btn-sm btn-delete" data-id="{{$value->id}}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7">Không có danh mục nào</td>
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

            <!-------------------------------------------------------------------------------- FOOTER -->
            @include('admin.components.footer')

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- The Modal Image -->
    <!-- <div id="dialog" style="display: flex">
        <div id="dialog-content">
            <!-- <span class="close" onclick="closeDialog()">&times;</span> -->
    <!-- <img id="dialog-image" src="{{asset('storage/products/1722413918_milktea.png')}}" alt="Product Image" style="width: 100px; height: 100px;">
        </div>
    </div> -->

    <!-- Delete Modal -->
    <div class="modal fade" id="myModal-delete" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="margin-top: 70px;">
                <form id="delete-form" action="" method="DELETE">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="confirm-delete-btn">Delete Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

    @include('admin.components.logoutmodal')



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('js/product.js')}}"></script>

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>


</body>

</html>