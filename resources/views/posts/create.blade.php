<x-layouts.main>

<x-slot:title>
	Post yaratish
</x-slot>

<x-page-header>
	Yangi post yaratish
</x-page-header>

<div class="container ">
<div class="w-50 py-4">
 <div class="row">
	<div class="col-lg-7  mb-lg-0">
	    <div class="contact-form">
	        <div id="success"></div>
	        
	        <form action="{{ route('posts.store')}}" method="POST" enctype=”multipart/form-data”>
	            @csrf
	            <div class="control-group mb-4">
	                <input type="text" class="form-control p-4 " name="title" placeholder="Sarlavha"  data-validation-required-message="Please enter a subject" value="{{ old('title') }}" />
	                @error('title')
                		<p class="help-block text-danger">{{ $message }}</p>
					@enderror
	            </div>

	            <div class="control-group mb-4">
	            		<label>Kategoriyalar</label><br />
	            	<select name="category_id" class=" p-4 ">
	            		@foreach($categories as $category)
	            			<option value="{{ $category->id }}">{{ $category->name }}</option>
	            		@endforeach
	            	</select>
	                
	            </div>

	            <div class="control-group mb-4">
	            		<label>Teglar</label><br />
	            	<select name="tags[]" class=" p-1 " multiple>
	            		@foreach($tags as $tag)
	            			<option value="{{ $tag->id }}">{{ $tag->name }}</option>
	            		@endforeach
	            	</select>
	             
	            </div>

	             <div class="control-group">
	                <input type="file" class="form-control mb-5 border-5" name="photo" placeholder="photo"  data-validation-required-message="Please enter a subject" />
	                @error('photo')
                		<p class="help-block text-danger">{{ $message }}</p>
					@enderror
	                
	            </div>

	            <div class="control-group mb-4">
	                <textarea class="form-control p-4" rows="3" name="short_content" placeholder="Qisqacha mazmun"  data-validation-required-message="Please enter your message" value="">{{ old('short_content') }}</textarea>
	                @error('short_content')
                		<p class="help-block text-danger">{{ $message }}</p>
					@enderror
	            </div>

	             <div class="control-group mb-4">
	                <textarea class="form-control p-4" rows="6" name="content" placeholder="Maqola"  data-validation-required-message="Please enter your message">{{ old('content') }}</textarea>
	                @error('content')
                		<p class="help-block text-danger">{{ $message }}</p>
					@enderror
	            </div>
	            <div>
	                <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Saqlash</button>
	            </div>
	        </form>
	    </div>
	   </div>
	  </div>
	</div>
</div>

</x-layouts.main>