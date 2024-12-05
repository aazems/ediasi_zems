
@extends('master')
@section('isi')


<div class="row">
    <div class="col-md-12">
         
    <div class="au-card-inner d-flex align-items-center justify-content-between">
    <h3 class="title-2 m-0">Message - Ideasi Edii</h3>
    <!-- <a href="" class="au-btn au-btn-icon au-btn--green">
        <i class="zmdi zmdi-plus"></i>Add Message
    </a> -->
</div>

    </div>
</div>

<hr>


<div class="col-lg-12">
    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
        <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
            <div class="bg-overlay bg-overlay--blue"></div>
            <h3>
                <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
            <button class="au-btn-plus">
                <i class="zmdi zmdi-plus"></i>
            </button>
        </div>
        <div class="au-inbox-wrap js-inbox-wrap">
            <div class="au-message js-list-load">
                <div class="au-message__noti">
                    <p>You Have
                        <span>{{ count($comments) }}</span>

                        messages
                    </p>
                </div>
                <div class="au-message-list"> 
                    @foreach ($comments as $index => $idea)

                    <div class="au-message__item">
                        <div class="au-message__item-inner">
                            <div class="au-message__item-text">
                                <div class="avatar-wrap">
                                    <div class="avatar">
                                        <img 
                                        class="card-img-top" 
                                        src="{{ $idea->image ? asset('images/profile/'.$idea->image) : asset('images/profile/user-1.jpg') }}" 
                                        alt="Card image cap">
                                    </div>
                                   
                                </div>
                                <div class="text">
                                    <span> {{ $idea->commentator_name }}</span>
                                    <h5 class="name text-justify">{{ $idea->idea_title }}</h5>
                                    <p>{{ $idea->comment }}</p>
                                    
                                </div>
                            </div>
                            <div class="au-message__item-time">
                                 <span> {{ $idea->created_date }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="au-message__footer">
                    <button class="au-btn au-btn-load js-load-btn">load more</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection