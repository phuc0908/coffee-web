 <!--ADD Modal -->
 <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <form action="{{route('admin.product.add')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-header">
                     <h4 class="modal-title">Add Product</h4>
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
                         <label for="description">Description:</label>
                         <textarea id="editor" name="description">
                            </textarea>
                     </div>

                     <div class="form-group">
                         <label for="pric">Price:</label>
                         <input type="text" class="form-control" id="pric" name="price">
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="add-Product-btn">Add Product</button>
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
                     <h4 class="modal-title">Edit Product</h4>
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
                         <label for="description">Description:</label>
                         <textarea id="editorU" name="description">
                                                </textarea>
                     </div>

                     <div class="form-group">
                         <label for="pric">Price:</label>
                         <input type="text" class="form-control" id="pricU" name="price">
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="add-Product-btn">Update Product</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- end modal -->


 <!--INFO Modal -->
 <div class="modal fade" id="myModal-info" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            
         </div>
     </div>
 </div>
 <!-- end modal -->