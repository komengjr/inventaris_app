 <form class="row g-3" action="{{ route('masteradmin_menu_save') }}" method="post" enctype="multipart/form-data">
     @csrf

     <div class="col-6">
         <label class="form-label" for="inputAddress">Menu</label>
         <select name="menu" class="form-control" id="">
             <option value="">Pilih Menu</option>

         </select>
     </div>
     <div class="col-6">
         <label class="form-label" for="inputAddress">Sub Menu</label>
         <input class="form-control" id="inputAddress" type="text" name="sub_menu" placeholder="dashboard"
             required />
     </div>
     <div class="col-6">
         <label class="form-label" for="inputAddress">Menu Link</label>
         <input class="form-control" id="inputAddress" type="text" name="link" placeholder="page/detail"
             required />
     </div>
     <div class="col-6">
         <label class="form-label" for="inputAddress">Menu Icon</label>
         <input class="form-control" id="inputAddress" type="text" name="icon" placeholder="fa fa-book"
             required />
     </div>
     <div class="col-12">
         <div class="form-check">
             <input class="form-check-input" id="gridCheck" type="checkbox" required />
             <label class="form-check-label" for="gridCheck">Check me</label>
         </div>
     </div>
     <div class="col-12">
         <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Save</button>
     </div>
 </form>
