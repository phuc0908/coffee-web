 <!--ADD Modal IN-->
 <div class="modal fade" id="myModal-in" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <form action="{{route('admin.report.add')}}" method="post">
                 @csrf
                 <div class="modal-header">
                     <h4 class="modal-title">Add Report In</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <div class="modal-body">
                     <div class="form-group">
                         <label class="mr-sm-2" for="name">Supplier:</label>
                         <select class="custom-select mr-sm-2" id="supplier" name="supplier">
                             <option selected disabled>Choose...</option>
                             <option value="chef">Chef</option>
                         </select>
                     </div>
                     <input type="hidden" name="type" value="in">
                     <br>
                     <h4>Report Details</h4>
                     <div class="form-group">
                         <div class="table-responsive">
                             <table class="table table-add-in">
                                 <thead>
                                     <th>STT</th>
                                     <th>Material</th>
                                     <th>Price</th>
                                     <th>Number Of Unit</th>
                                     <th></th>
                                 </thead>
                                 <tbody>
                                 </tbody>
                                 <tfoot>
                                     <th colspan="3">
                                         <button class="btn btn-danger btn-sm" id="clear-in">Clear</button>
                                     </th>
                                     <th colspan="2">
                                         <button class="btn btn-dark btn-sm" id="add-row-in">Add Row</button>
                                     </th>
                                 </tfoot>
                             </table>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="add-report-btn">Add Report In</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- end modal -->

 <!--ADD Modal OUT-->
 <div class="modal fade" id="myModal-out" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <form action="{{route('admin.report.add')}}" method="post">
                 @csrf
                 <div class="modal-header">
                     <h4 class="modal-title">Add Report Out</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <div class="modal-body">
                     <div class="form-group">
                         <label class="mr-sm-2" for="name">Employee:</label>
                         <select class="custom-select mr-sm-2" id="employee" name="employee">
                             <option selected disabled>Choose...</option>
                             <option value="chef">DDDDD</option>
                         </select>
                     </div>
                     <input type="hidden" name="type" value="out">
                     <br>
                     <h4>Report Details</h4>
                     <div class="form-group">
                         <div class="table-responsive">
                             <table class="table table-add-out">
                                 <thead>
                                     <th>STT</th>
                                     <th>Material</th>
                                     <th>Price</th>
                                     <th>Number Of Unit</th>
                                     <th></th>
                                 </thead>
                                 <tbody>
                                 </tbody>
                                 <tfoot>
                                     <th colspan="3">
                                         <button class="btn btn-danger btn-sm" id="clear-out">Clear</button>
                                     </th>
                                     <th colspan="2">
                                         <button class="btn btn-dark btn-sm" id="add-row-out">Add Row</button>
                                     </th>
                                 </tfoot>
                             </table>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="add-report-btn">Add Report</button>
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
                     <h4 class="modal-title">Edit report</h4>
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
                     <button type="submit" class="btn btn-primary" id="add-report-btn">Update report</button>
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