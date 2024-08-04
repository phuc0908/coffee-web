 <!--ADD Modal -->
 <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <form action="{{route('admin.supplier.add')}}" method="post">
                 @csrf
                 <div class="modal-header">
                     <h4 class="modal-title">Add Supplier</h4>
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
                         <label for="phone">Phone:</label>
                         <input type="text" class="form-control" id="phone" name="phone" autocomplete="off">
                     </div>
                     <div class="form-group">
                         <label for="address">Address:</label>
                         <input type="text" class="form-control" id="address" name="address" autocomplete="off">
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="add-supplier-btn">Add Supplier</button>
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
                     <h4 class="modal-title">Edit Supplier</h4>
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
                         <label for="phone">Phone:</label>
                         <input type="text" class="form-control" id="phoneU" name="phone" autocomplete="off">
                     </div>
                     <div class="form-group">
                         <label for="address">Address:</label>
                         <input type="text" class="form-control" id="addressU" name="address" autocomplete="off">
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="edit-supplier-btn">Update Supplier</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- end modal -->