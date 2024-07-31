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

    div.modal-content {
        width: 560px;
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
                                                <label for="name">Gmail:</label>
                                                <label class="sr-only" for="gmail">Gmail</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">@</div>
                                                    </div>
                                                    <input type="text" class="form-control" id="gmail" name="gmail">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Gender:</label> <br>
                                                <div class="custom-control custom-radio custom-control-inline" style="margin-left: 5px;">
                                                    <input type="radio" id="genderMale" name="gender" class="custom-control-input" checked value="male">
                                                    <label class="custom-control-label" for="genderMale">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="genderFemale" name="gender" class="custom-control-input" value="female">
                                                    <label class="custom-control-label" for="genderFemale">Female</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="genderOther" name="gender" class="custom-control-input" value="other">
                                                    <label class="custom-control-label" for="genderOther">Other</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="role">Role:</label>
                                                <select class="custom-select mr-sm-2" id="role" name="role">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="chef">Chef</option>
                                                    <option value="cashier">Cashier</option>
                                                    <option value="waiter">Waiter</option>
                                                    <option value="barista">Barista</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="waiter">Waiter</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="text" class="form-control" id="phone" name="phone" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="status">Status:</label>
                                                <select class="custom-select mr-sm-2" id="status" name="status">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="working">Working</option>
                                                    <option value="brobation">Brobation</option>
                                                    <option value="resigned">Resigned</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address:</label>
                                                <input type="text" class="form-control" id="address" name="address" autocomplete="off">
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
                                                <label for="name">Gmail:</label>
                                                <label class="sr-only" for="gmail">Gmail</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">@</div>
                                                    </div>
                                                    <input type="text" class="form-control" id="gmailU" name="gmail">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Gender:</label> <br>
                                                <div class="custom-control custom-radio custom-control-inline" style="margin-left: 5px;">
                                                    <input type="radio" id="genderMaleU" name="genderU" class="custom-control-input" checked value="male">
                                                    <label class="custom-control-label" for="genderMaleU">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="genderFemaleU" name="genderU" class="custom-control-input" value="female">
                                                    <label class="custom-control-label" for="genderFemaleU">Female</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="genderOtherU" name="genderU" class="custom-control-input" value="other">
                                                    <label class="custom-control-label" for="genderOtherU">Other</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="role">Role:</label>
                                                <select class="custom-select mr-sm-2" id="roleU" name="role">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="chef">Chef</option>
                                                    <option value="cashier">Cashier</option>
                                                    <option value="waiter">Waiter</option>
                                                    <option value="barista">Barista</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="waiter">Waiter</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="text" class="form-control" id="phoneU" name="phone" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="status">Status:</label>
                                                <select class="custom-select mr-sm-2" id="statusU" name="status">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="working">Working</option>
                                                    <option value="probation">Probation</option>
                                                    <option value="resigned">Resigned</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address:</label>
                                                <input type="text" class="form-control" id="addressU" name="address" autocomplete="off">
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
                                            <th>Gmail</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th class="th-action">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gmail</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Address</th>
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
                                            <td>{{$value->gmail}}</td>
                                            <td>{{$value->gender}}</td>
                                            <td>{{$value->phone}}</td>
                                            <td>{{$value->role}}</td>
                                            <td>{{$value->address}}</td>
                                            <td class="statusEmployee" data-id="{{$value->status}}">{{$value->status}}</td>
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
                                            <td colspan="8"></td>
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

            @include('admin.components.footer')

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

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
                        <button type="submit" class="btn btn-danger" id="confirm-delete-btn">Delete Employee</button>
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