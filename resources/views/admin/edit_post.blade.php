@include('admin.header')
<link href="{{url('assets/summernote/summernote-lite.min.css')}}" rel="stylesheet" />
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
                      <?php if($old_data){ ?>
                       <form action="{{url('admin/posts/edit',$old_data['id'])}}" method="post" enctype="multipart/form-data" >
                       
                       <div class="form-group row">
                           <label for="title" class="col-sm-2 col-form-label">Post Title</label>
                           <div class="col-sm-10">
                               <input id="title" type="text" class="form-control" value="{{$old_data['title']}}" name="title">
                           </div>
                           @error('title')
                              <div class="error" style="font-size:17px;color:red">{{ $message }}</div>
                           @enderror
                       </div>
                       
                       <div class="form-group row">
                           <label for="file" class="col-sm-2 col-form-label">Featured Image</label>
                           <div class="col-sm-10">
                              <img src="{{url('upload/'.$old_data['image'])}}" style="width:125px" />
                               <input id="file" type="file" class="form-control" name="file">
                           </div>
                           @error('file')
                              <div class="error" style="font-size:17px;color:red">{{ $message }}</div>
                           @enderror
                       </div>
                       
                       <div class="form-group row">
                           <label for="Category ID" class="col-sm-2 col-form-label">Post Category</label>
                           <div class="col-sm-10">
                               <select id="category_id" name="category_id" class="form-control">
                                 @foreach($cat as $data)
                                   <option value="{{$data}}" <?php if($category->category== $data){echo "selected";}?>>{{$data}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                        @csrf
                        <textarea id="summernote" name="content" value="">{{$old_data['content']}}</textarea>
                        @error('content')
                              <div class="error" style="font-size:17px;color:red">{{ $message }}</div>
                           @enderror
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                     <?php }
                  else {
                  ?>
                  <div style="font-size:18px;color:red"> Sorry, such Post does not exist 😭 </div>
                  <?php } ?>
                </div> 
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
@include('admin.footer')
<script src="{{url('assets/summernote/summernote-lite.min.js')}}"></script>
<script>
$(document).ready(function() {
  $('#summernote').summernote({height:400});
});
</script>