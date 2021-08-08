@extends('welcome')
@section('content')
<div class="single">
		<div class="container">
			<div class="col-md-8 about-left">
				<div class="single-top">
						<a href="#"><img class="img-responsive" src="{{asset('public/uploads/'.$category_post->image)}}" alt="{{Str::slug($category_post->title)}}" width="100%" height="200"></a>
					<div class=" single-grid">
						<h4>{{$category_post->title}}</h4>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>Admin</span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i>{{$category_post->post_date}}</span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>Views:{{$category_post->views}}</span></li>
		  					</ul>		  						
						<p>{!!$category_post->desc!!}</p>
					</div>

					<div class="comments heading">
						<h3>Bình luận</h3>
						<div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="5"></div>   
						<!-- <div class="media">
					      	<div class="media-body">
						        <h4 class="media-heading">	Richard Spark</h4>
						        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs .  </p>
					      	</div>
					      <div class="media-right">
					        <a href="#">
								<img src="images/si.png" alt=""> </a>
					      </div>
					 	</div> -->
    				</div>
    				<!-- <div class="comment-bottom heading">
    					<h3>Để lại bình luận</h3>
    					<form>	
						<input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
						<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
						<input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
						<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
							<input type="submit" value="Gửi">
					</form>
    				</div> -->
				</div>	
			</div>
			<div class="col-md-4 about-right heading">
				<div class="abt-2">
                        <h3>Bài viết liên quan</h3>
                            @foreach($related_post as $key => $rel_post)
                            <div class="might-grid">
                                <div class="grid-might">
                                    <a href="{{route('bai-viet.show',['id' =>$rel_post->id,'slug' =>Str::slug($rel_post->title)])}}"><img src="{{asset('public/uploads/'.$rel_post->image)}}" class="img-responsive" alt="{{Str::slug($rel_post->title)}}" width="100%"></a>
                                </div>
                                <div class="might-top">
                                    <h4><a href="{{route('bai-viet.show',['id' =>$rel_post->id,'slug' =>Str::slug($rel_post->title)])}}">{{$rel_post->title}}</a></h4>
                                    <p>{!!substr($rel_post->short_desc,0,150)!!}....</p> 
                                </div>
                                <div class="clearfix"></div>
                            </div>  
                            @endforeach                         
                    </div>
			</div>
		</div>					
</div>
@endsection