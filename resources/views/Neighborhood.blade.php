@extends('master')
@section('isi')


<div class="row">
    <div class="col-md-12">
         
    <div class="au-card-inner d-flex align-items-center justify-content-between">
    <h3 class="title-2 m-0">My Neighborhood - Ideasi Edii</h3>
  
</div>

    </div>
</div>

<hr>

   
    <div class="au-message-list">
    @forelse ($neighbors as $neighbor)
        <div class="au-message__item read">
            <div class="au-message__item-inner">
                <div class="au-message__item-text">
                    <div class="avatar-wrap">
                        <div class="avatar">
                            <img src="{{ $neighbor->profile_picture ? asset('images/profile/' . $neighbor->profile_picture) : asset('images/profile/user-1.jpg') }}" alt="John Smith">
                        </div>
                    </div>
                    <div class="text">
                        <h5 class="name"> {{ $neighbor->name }}</h5>
                        <p>{{ $neighbor->email }}</p>
                    </div>
                </div>
                <div class="au-message__item-time">
                    <a href="" class="au-btn au-btn-icon au-btn--green">
                        <i class="zmdi zmdi-plus"></i>Follow
                    </a>
                </div>
            </div>
        </div>
      
        @endforeach
    </div>
@endsection