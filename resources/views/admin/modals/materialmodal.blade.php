 <!--ADD Modal -->
 <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <form action="" method="post">
                 @csrf
                 <div class="modal-header">
                     <h4 class="modal-title">Add Material</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <div class="modal-body">
                     <div class="form-group">
                         <label for="name">Name:</label>
                         <input type="text" class="form-control" id="name" name="name">
                     </div>
                     <div class="form-group">
                         <label for="cate">Category:</label>
                         <input type="text" class="form-control" id="cate" name="category">
                     </div>
                     <div class="form-group">
                         <label for="imag">URL Image:</label>
                         <input type="file" class="form-control-file" id="imag" name="image">
                     </div>

                     <div class="form-group">
                         <label for="unit">Unit:</label>
                         <input type="text" class="form-control" id="unit" name="unit">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="add-material-btn">Add Material</button>
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
                     <h4 class="modal-title">Edit Material</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <div class="modal-body">
                     <div class="form-group">
                         <label for="name">Name:</label>
                         <input type="text" class="form-control" id="nameU" name="name">
                     </div>
                     <div class="form-group">
                         <label for="cate">Category:</label>
                         <input type="text" class="form-control" id="cateU" name="category">
                     </div>
                     <div class="form-group">
                         <label for="imag">URL Image:</label>
                         <input type="file" class="form-control-file" id="imagU" name="image">
                     </div>
                     <div class="form-group">
                         <label for="unit">Unit:</label>
                         <input type="text" class="form-control" id="unitU" name="unit">
                     </div>
                 </div>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="edit-material-btn">Update Material</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- end modal -->