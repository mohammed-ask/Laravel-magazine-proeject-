@include('header')

	
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry">
		<?php foreach($row as $rows){ ?>
		    
			<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
				<a href="{{url('single/'.$rows->slag)}}">
				<figure>
					<img src="{{url('upload/'.$rows->image)}}" style="height:400px;object-fit:cover" alt="Image" class="img-responsive">
				</figure>
				<span class="fh5co-meta" style="color: #f7c873">{{$rows->category}}</span>	
				<h2 class="fh5co-article-title" >{{$rows->title}}</h2>
				<span class="fh5co-meta fh5co-date">{{date("jS M,Y",strtotime($rows->created_at))}}</span>
				</a>
			</article>
     
        <?php } ?>
			
			<div class="clearfix visible-xs-block"></div>
		</div>
		
		@include('pagination')
		
	</div>
@include('footer')
	