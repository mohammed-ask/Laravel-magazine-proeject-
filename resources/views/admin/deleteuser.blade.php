@include('admin.header')

@include('admin.sidebar')

        <!-- /. NAV TOP  -->
        
        
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>{{$pagetitle}}</h2>   
                    </div>
                  
                </div> 
                            
                 <!-- /. ROW  -->
                  <hr />
              <div class="container-fluid col-lg-12">
                      <?php if($data['id'] != 10){ ?>
                       <form action="{{url('admin/users/delete',$data['id'])}}" method="post" enctype="multipart/form-data" >
                       @csrf
                       <div class="form-group row">
                           <label for="name" class="col-sm-2 col-form-label">Delete Category</label>
                           <div class="col-sm-10">
                               <input id="name" type="text" class="form-control" value="{{$data['name']}}" name="name">
                           </div>
                           @error('name')
                              <div class="error" style="font-size:17px;color:red">{{ $message }}</div>
                           @enderror
                       </div>
                       <div class="form-group row">
                           <label for="email" class="col-sm-2 col-form-label">Edit E-mail</label>
                           <div class="col-sm-10">
                               <input id="email" type="text" class="form-control" value="{{$data['email']}}" name="email">
                           </div>
                           @error('email')
                              <div class="error" style="font-size:17px;color:red">{{ $message }}</div>
                           @enderror
                       </div>
                       
                       
                        <br>
                        <button type="submit" class="btn btn-danger" style="float:right">Delete</button>
                    </form>
                     <?php }
                  else{ ?>
                  <div style="font-size:18px;color:red; font-weight: bold;">This User Cannot be Deletd 😅</div>
                  <?php } ?>
                </div> 
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
@include('admin.footer')