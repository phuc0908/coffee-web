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