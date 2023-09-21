<x-layouts.main>

<x-slot:title>
	Postni o'zgartirish #{{ $post->id }}
</x-slot>

<x-page-header>
	Postni o'zgartirish #{{ $post->id }}
</x-page-header>

<div class="container ">
<div class="w-50 py-4">
 <div class="row">
	<div class="col-lg-7  mb-lg-0">
		
	    <div class="contact-form">
	        <div id="success"></div>
	        
	        <form action="{{ route('posts.update',['post' => $post->id])}}" method="POST" enctype="multipart/form-data">
	        	@method('PUT')
	            @csrf
	            <div class="control-group mb-4">
	                <input type="text" class="form-control p-4 " name="title" placeholder="Sarlavha"  data-validation-required-message="Please enter a subject" value="{{ $post->title }}" />
	                @error('title')
                		<p class="help-block text-danger">{{ $message }}</p>
					@enderror
	            </div>

	             <div class="control-group">
	                <input type="file" class="form-control mb-5 border-5" name="photo" placeholder="photo"  data-validation-required-message="Please enter a subject" />
	                @error('photo')
                		<p class="help-block text-danger">{{ $message }}</p>
					@enderror
	                
	            </div>

	            <div class="control-group mb-4">
	                <textarea class="form-control p-4" rows="3" name="short_content" placeholder="Qisqacha mazmun"  data-validation-required-message="Please enter your message" value="">{{ $post->short_content }}</textarea>
	                @error('short_content')
                		<p class="help-block text-danger">{{ $message }}</p>
					@enderror
	            </div>

	             <div class="control-group mb-4">
	                <textarea class="form-control p-4" rows="6" name="content" placeholder="Maqola"  data-validation-required-message="Please enter your message">{{ $post->content }}</textarea>
	                @error('content')
                		<p class="help-block text-danger">{{ $message }}</p>
					@enderror
	            </div>
	            <div class="flex">
	                <button class="btn btn-success  py-3 px-3" type="submit" id="sendMessageButton">Saqlash</button>
	                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-danger  py-3 px-3" id="sendMessageButton">Bekor qilish</a>
	            </div>
	        </form>
	    </div>
	   </div>
	  </div>
	</div>
</div>

</x-layouts.main>