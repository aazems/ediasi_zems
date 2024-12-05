@extends('master')
@section('isi')

<div class="card">
    <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Create New Insight - Stories</h5>
              <div class="card">
                <div class="card-body">
                     <div class ="row">
                     <div class ="col-md-12">
                     
                        <form action="{{ route('ideasis.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                                            
                                                <div class="mb-3">
                                                    <div class ="row">
                                                    <div class ="col-md-6">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                                        @error('title')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class ="col-md-6">
                                                    <label for="title_en" class="form-label">Title (English)</label>
                                                        <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en') }}" required>
                                                        @error('title_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <div class ="row">
                                                    <div class ="col-md-6">
                                                        <label for="subtitle" class="form-label">Subtitle</label>
                                                        <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}">
                                                    </div>
                                                    <div class ="col-md-6">
                                                        <label for="subtitle_en" class="form-label">Subtitle (English)</label>
                                                        <input type="text" name="subtitle_en" id="subtitle_en" class="form-control" value="{{ old('subtitle_en') }}">
                                                        
                                                    </div>
                                                    </div>
                                                </div>


                                                <div class="mb-3">
                                                    <div class ="row">
                                                        <div class ="col-md-6">
                                                        
                                                           <label for="content" class="form-label">Content</label>
                                                            <textarea name="content" id="content" rows="4" class="form-control" required>{{ old('content') }}</textarea>
                                                            @error('content')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class ="col-md-6">
                                                        
                                                            <label for="content_en" class="form-label">Content (English)</label>
                                                            <textarea name="content_en" id="content_en" rows="4" class="form-control" required>{{ old('content_en') }}</textarea>
                                                            @error('content_en')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="mb-3">
                                                    <div class ="row">
                                                           <div class ="col-md-6">
                                                            
                                                                <label for="image" class="form-label">Background Image</label>
                                                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                                                @error('image')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class ="col-md-6">
                                                                <label for="redirect_link" class="form-label">Redirect Link</label>
                                                                <input type="text" name="redirect_link" id="redirect_link" class="form-control" value="{{ old('redirect_link') }}">
                                                                
                                                            </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <p class="text-muted">Preview:</p>
                                                    <img id="imagePreview" src="#" alt="Preview Image" class="img-fluid rounded border d-none" style="max-width: 100%; height: auto;">
                                                </div>
                                                
                                                <br>

                                                <div class="d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary">Post</button>
                                                </div>

                        </form>

                      </div>
                     </div>
                </div>
               </div>     
    </div>
</div>

@endsection




