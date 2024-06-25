@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ballot</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">PRESIDENT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($candidates as $candidate)
                        @if($candidate->position == 'PRESIDENT')
                        <td>
                            <div class="col-md-10">
                                <div class="card card-widget widget-user shadow">
                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username">{{$candidate->name}}</h3>
                                        <h5 class="widget-user-desc">{{$candidate->position}}</h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="{{$candidate->image}}" width="514px" height="514px" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"></h5>
                                                    <span class="description-text">CANDIDATE</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"><button class="btn btn-success vote-btn" data-position="President" data-candidate-id="{{$candidate->id}}">VOTE</button></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{$candidate->position}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @endif
                    @endforeach
                </tr>
            </tbody>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                      VICE PRESIDENT
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($candidates as $candidate)
                        @if($candidate->position == 'VISE PRESIDENT')
                        <td>
                            <div class="col-md-10">
                                <div class="card card-widget widget-user shadow">
                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username">{{$candidate->name}}</h3>
                                        <h5 class="widget-user-desc">{{$candidate->position}}</h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="{{$candidate->image}}" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"></h5>
                                                    <span class="description-text">CANDIDATE</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"><button class="btn btn-success vote-btn" data-position="Vice President" data-candidate-id="{{$candidate->id}}">VOTE</button></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{$candidate->position}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @endif
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.vote-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const position = this.getAttribute('data-position');
            const candidateId = this.getAttribute('data-candidate-id');
            // Disable other vote buttons for the same position
            document.querySelectorAll(`.vote-btn[data-position="${position}"]`).forEach(function (btn) {
                btn.disabled = true;
                btn.classList.remove('btn-success');
                btn.classList.add('btn-secondary');
            });
            // Optionally, you can send the vote to the server here using AJAX
            // axios.post('/vote', { position: position, candidate_id: candidateId })
            //      .then(response => console.log(response))
            //      .catch(error => console.log(error));
        });
    });
});
</script>
@endsection
