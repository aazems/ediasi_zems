@extends('master')
@section('isi')


<div class="row">
    <div class="col-md-12">
         
            <div class="au-card-inner d-flex align-items-center justify-content-between">
                <h3 class="title-2 m-0">Review My Stories - Ideasi Edii</h3>
            </div> 

    </div>
</div>

<hr>

<div class="col-md-12">
    <div class="card">
        <img class="card-img-top" src="{{ $ideasis->image ? asset('images/stories/'.$ideasis->image) : asset('images/stories/default.jpg') }}" alt="">



        <div class="card-body">
        
            <h3 class="card-title">Title : {{ $ideasis->title }} 
                @if ($ideasis->is_approved == 1)      
                <span class = "badge badge-success">Tayang</span>
                @elseif ($ideasis->is_approved == 2)      
                <span class = "badge badge-danger">Reject</span> 
                @else     
                <span class = "badge badge-dark">Pending</span>
                @endif 
            </h3> 
            <h5 class ="mb-3">Subtitle : {{ $ideasis->subtitle }}</h5>
            <span class ="text-primary mb-3">Author :   dibuat tanggal : {{ $ideasis->created_at }} </span>
            <hr>

            <p class="card-text">
            {{ strip_tags($ideasis->content) }}
            </p>

        </div>

        <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="d-flex">
        <div class="image">
           <img src="{{ $ideasis->user_image ? asset('images/profile/'.$ideasis->user_image) : asset('images/profile/user-1.jpg') }}" style="width: 40px; height: 40px;" alt="Michelle Moreno" class="rounded-circle">   
           &nbsp; {{ $ideasis->user_name }}
           </div>
        </div>
              <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">Close</a>
        </div>
       </div>
    </div>
</div>


@endsection 