
@extends('master')
@section('isi')


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


<div class="card">
<div class="card-header">
    List of Stories
</div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table mt-4 table-bordered wrap">
        <thead>
            <tr>
            <th style="width: 5%;">ID</th>
            <th style="width: 10%;">Status</th>
            <th style="width: 10%;">Tgl Posting</th>
            <th style="width: 20%;">Title</th>
            <th style="width: 25%;">SubTitle</th>
            <th style="width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ideasis as $idea)
            <tr>
                <td>{{ $idea->id }}</td>
                @if ($idea->is_approved == 1)
                        <td><span class ="badge bg-success text-white">Approved</span></td>
                    @elseif ($idea->is_approved == 2)
                        <td><span class ="badge bg-danger text-white">Reject</span></td>
                    @else
                        <td><span class ="badge bg-dark text-white">Pending</span></td>
                @endif    
                
                <td>{{ $idea->created_at }}</td>
                <td>{{ $idea->title }}<br>
                    <strong>{{ $idea->title_en }}</strong></td>
                <td>{{ $idea->subtitle }}<br>
                <strong>{{ $idea->subtitle_en }}</strong></td>
                
                <td>
                    <a href="{{ route('ideasis.show', $idea->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('ideasis.edit', $idea->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('ideasis.destroy', $idea->id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-button">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>

@endsection 

