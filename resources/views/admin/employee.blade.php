<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Manage Employees</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="shortcut icon" href="/img/logo_admin.png" type="img/icon" />
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/material.css') }}">
    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}">

</head>
<style>
    .th-action:before {
        visibility: hidden;
    }

    .th-action:after {
        visibility: hidden;
    }

    .td-action {
        display: flex !important;
        justify-content: space-evenly;
    }

    tr.even {
        background-color: #f5f5f5;
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
                        <h1 class="h3 mb-0 text-gray-800">Employee List</h1>
                        <button onclick="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModal" style="display: flex !important;align-items: center;">
                            <ion-icon name="add-circle"></ion-icon> <span style="margin-left: 3px;">Add Employee</span>
                        </button>

                        <!--ADD Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form action="{{route('admin.employee.add')}}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Employee</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="gend">Gender:</label>
                                                <input type="text" class="form-control" id="gend" name="gender" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role:</label>
                                                <input type="text" class="form-control" id="role" name="role" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="phon">Phone:</label>
                                                <input type="text" class="form-control" id="phon" name="phone" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="addr">Address:</label>
                                                <input type="text" class="form-control" id="addr" name="address" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="stat">Status:</label>
                                                <input type="text" class="form-control" id="stat" name="status" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="add-material-btn">Add Employee</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->

                        <!--EDIT Modal -->
                        <div class="modal fade" id="myModal-edit" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form id="edit-form" action="" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Employee</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" class="form-control" id="nameU" name="name" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="gend">Gender:</label>
                                                <input type="text" class="form-control" id="gendU" name="gender" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role:</label>
                                                <input type="text" class="form-control" id="roleU" name="role" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="phon">Phone:</label>
                                                <input type="text" class="form-control" id="phonU" name="phone" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="addr">Address:</label>
                                                <input type="text" class="form-control" id="addrU" name="address" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="stat">Status:</label>
                                                <input type="text" class="form-control" id="statU" name="status" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="edit-material-btn">Update Employee</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->

                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Employee DataTables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Address</th>
                                            <th>Created at</th>
                                            <th>Status</th>
                                            <th class="th-action">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Address</th>
                                            <th>Created at</th>
                                            <th>Status</th>
                                            <th class="th-action">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(!empty($employees))
                                        @foreach ($employees as $key => $value)
                                        <tr id="employee-{{$value->id}}">
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->gender}}</td>
                                            <td>{{$value->role}}</td>
                                            <td>{{$value->address}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td class="statusEmployee" class="statusEmployee" data-id="{{$value->status}}">{{$value->status}}</td>
                                            <td class="td-action">
                                                <a href="#" class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                                <a href="" class="btn btn-warning btn-circle btn-sm" data-id="{{$value->id}}">
                                                    <i class=" fas fa-pen"></i>
                                                </a>
                                                <a href="" data-toggle="modal" data-target="#myModal-delete" class="btn btn-danger btn-circle btn-sm btn-delete" id="btn-delete" data-id="{{$value->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="8">Không có dữ liệu</td>
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

    <!-- Delete Modal -->
    <div class="modal fade" id="myModal-delete" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="margin-top: 70px;">
                <form id="edit-form" action="" method="DELETE">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="confirm-delete-btn" data-id="{{$value->id}}">Delete Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="{{route('admin.login')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        ...
    </div>

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
    <script src="{{asset('js/employee.js')}}"></script>

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>

</body>

</html>