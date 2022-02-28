@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <form>
      <div class="card">
        <div class="card-header card_header bg-dark">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="fab fa-gg-circle"></i>All Team Member Information
            </div>
            <div class="col-md-4 card_header_btn">
              <a class="btn btn-sm btn-secondary chb_btn" href="{{ url('dashboard/teammember/add') }}"><i class="fas fa-plus-circle"></i> Add TeamMember</a>
            </div>
          </div>
        </div>
        <div class="card-body card_body">
          <div class="row">
            <div class="col-md-12">
              <table id="allDataTable" class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                  <tr>
                    <th>Team Member</th>
                    <th>Designation</th>
                    <th>Order By</th>
                    <th>Image</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($all as $data)
                  <tr>
                    <td>{{ $data->team_name }}</td>
                    <td>{{ $data->team_designation }}</td>
                    <td>{{ $data->team_order }}</td>
                    <td>
                      @if($data->team_image)
                        <img height="40" src="{{ asset('uploads/teammembers/'.$data->team_image) }}"/>
                      @else
                        <img height="40" src="{{ asset('uploads/avatar.png') }}"/>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group">
  						<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Manage
                        </button>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('dashboard/teammember/view/'.$data->team_id) }}">View</a>
                                <a class="dropdown-item" href="{{ url('dashboard/teammember/edit/'.$data->team_id) }}">Edit</a>
                                <a class="dropdown-item" href="#" id="delete" data-bs-toggle="modal" data-bs-target="#softDeleteModal" data-id="{{ $data->team_id }}">Delete</a>
                        </div>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card-footer card_footer bg-dark">
          <a href="#" class="btn btn-sm btn-success">Print</a>
          <a href="#" class="btn btn-sm btn-secondary">PDF</a>
          <a href="#" class="btn btn-sm btn-primary">Excel</a>
          <a href="#" class="btn btn-sm btn-warning">CSV</a>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="softDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="{{url('dashboard/teammember/softdelete')}}">
      @csrf
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fab fa-gg-circle"></i> Confirm Message</h5>
      </div>
      <div class="modal-body modal_body">
        Are you want to sure delete data?
        <input type="hidden" name="modal_id" id="modal_id">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark">Confirm</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
