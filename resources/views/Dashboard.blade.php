
@extends('master')
@section('isi')


<style>
.card {
    position: relative; /* Ensure the card is a relative container */
    overflow: hidden; /* Prevent floating elements from overflowing */
}


.floating-profile {
    width: 100%;
    position: absolute; /* Float above the image */
    top: 130px; /* Adjust vertical position */
    left: 0px; /* Adjust horizontal position */
    padding: 10px; /* Add spacing */
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background for visibility */
    border-radius: 0rem; /* Rounded edges for the profile box */
    color: #fff; /* White text for visibility */
    z-index: 10; /* Ensure it floats above the image */
    display: flex; /* Use flexbox for alignment */
    align-items: center; /* Vertically align the content */
}

.floating-profile .image img {
    width: 40px; /* Fixed size for profile picture */
    height: 40px;
    border-radius: 50%; /* Circle shape for the profile picture */
    object-fit: cover; /* Ensure the image scales properly */
}

.floating-profile h6 {
    margin: 0; /* Remove extra margin */
    font-size: 1rem; /* Adjust text size */
}

.floating-profile .time {
    font-size: 0.85rem; /* Smaller text for timestamp */
}

    .card-img-top {
        width: 100%; /* Lebar penuh sesuai card */
        height: 200px; /* Tinggi tetap untuk semua gambar */
        object-fit: cover; /* Potong gambar sesuai dimensi tanpa merusak aspek rasio */
        border-top-left-radius: 0.25rem; /* Sesuai styling Bootstrap */
        border-top-right-radius: 0.25rem; /* Sesuai styling Bootstrap */
    }
</style>

<div class="row">
    <div class="col-md-12">
         
    <div class="au-card-inner d-flex align-items-center justify-content-between">
    <h3 class="title-2 m-0">Stories - Ideasi Edii</h3>
    <a href="{{ route('ideasis.create') }}" class="au-btn au-btn-icon au-btn--green">
        <i class="zmdi zmdi-plus"></i>Add Stories
    </a>
</div>

    </div>
</div>

<hr>
<!-- <div class="card-container d-flex flex-nowrap"> -->
<div class="container">
    <div class="row">
        @foreach ($ideasis as $index => $idea)
            <!-- Mulai baris baru untuk setiap kelipatan 3 -->
            @if ($index % 3 === 0 && $index !== 0)
                </div><div class="row">
            @endif
            
            <div class="col-md-4 d-flex mb-4">
                <div class="card w-100">
                <img 
                        class="card-img-top" 
                        src="{{ $idea->image ? asset('images/stories/'.$idea->image) : asset('images/stories/default.jpg') }}" 
                        alt="Card image cap">

                        <div class="floating-profile d-flex align-items-center">
                            <div class="image img-cir img-40 me-4">
                                <img src="{{ $idea->user_image ? asset('images/profile/'.$idea->user_image) : asset('images/profile/user-1.jpg') }}" alt="Michelle Moreno" class="img-fluid rounded-circle">
                            </div>
                            <div>
                                <h6 class="mb-1 text-white">&nbsp; {{ $idea->user_name }} </h6>
                                
                            </div>
                        </div>
                
                    <div class="card-body">
                        <h4 class="card-title mb-2">{{ $idea->title }}</h4>
                     
                        <h6 class ="text-primary"> {{ $idea->created_at }} </h6>
                        <br>
                        <p class="card-text"><small>{{ Str::limit(strip_tags($idea->content, 100)) }}</small></p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                   
                                <!-- <a href="#" class="text-decoration-none like-button" 
                                data-id="{{ $idea->id }}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#likeModal">
                                   <div class="noti-wrap">
                                   <div class="noti__item js-item-menu">
                                        <i class="fas fa-thumbs-up"></i> 
                                    <span class="quantity">1</span>
                                    </div>
                                    </div>
                                </a>
                      -->
                                
                                
                                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#likeModal{{ $idea->id }}">
                                    <!-- &nbsp; <small>Comment</small> &nbsp;<span class="badge badge-danger">{{ $idea->comment_count }}</span> -->
                                    <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="fas fa-thumbs-up"></i>
                                        <span class="quantity">{{ $idea->like_count }}</span>
                                    </div>
                                    </div>
                                </a>



                                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal{{ $idea->id }}">
                                    <!-- &nbsp; <small>Comment</small> &nbsp;<span class="badge badge-danger">{{ $idea->comment_count }}</span> -->
                                    <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="fas fa-comment-alt"></i>
                                        <span class="quantity">{{ $idea->comment_count }}</span>
                                    </div>
                                    </div>
                                </a>

                                </div>
                            <a href="{{ route('ideasis.show2', $idea->id) }}" class="btn btn-outline-primary btn-sm">Stories</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




@endsection 

@foreach ($ideasis as $idea)
    <!-- Modal untuk setiap item -->
    <div class="modal fade" id="commentModal{{ $idea->id }}" tabindex="-1" aria-labelledby="commentModalLabel{{ $idea->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel{{ $idea->id }}">Comments for {{ $idea->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class = "fas fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menambahkan komentar -->
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $idea->id }}">
                        <input type="hidden" name="user" value="{{ auth()->id() }}">
                        
                        <div class="mb-3">
                            <label for="comment" class="form-label">Add Comment</label>
                            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </div>
                    </form>

                    <hr>

       
                </div>
            </div>
        </div>
    </div>




    <!-- Modal Like -->


    <div class="modal fade" id="likeModal{{ $idea->id }}" tabindex="-1" aria-labelledby="likeModalLabel{{ $idea->id }}" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="likeModalLabel{{ $idea->id }}">like for {{ $idea->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class = "fas fa-close"></i></button>
                </div>

                <form action="{{ route('like.store') }}" method="POST" class="d-inline delete-form">
                @csrf
                <div class="modal-body">
                    <!-- Form untuk menambahkan komentar -->
                   
                        <input type="hidden" name="id_post" value="{{ $idea->id }}">
                        <input type="hidden" name="user_post" value="{{ auth()->id() }}">
                        
                        Apakah Anda yakin ingin menyukai postingan ini?
       
                </div>

                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="likeModal{{ $idea->id }}" tabindex="-1" aria-labelledby="likeModalLabel{{ $idea->id }}" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="likeModalLabel">Konfirmasi Like</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('like.store') }}" method="POST" class="d-inline delete-form">
            @csrf
            <div class="modal-body">
                Apakah Anda yakin ingin menyukai postingan ini?

                <input type="text" name="id_post" id ="id_post" value="{{ auth()->id() }}">
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
                
            </div>
              </form>
        </div>
    </div>
</div> -->

@endforeach

