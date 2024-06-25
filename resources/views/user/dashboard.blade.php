@extends('user.layout.layout')

@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ballot</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">President</th>
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
                                        <h5 class="widget-user-desc"></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="{{url($candidate->image)}}" width="514px" height="514px" alt="User Avatar">
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
                                                    <form method="POST" action="{{ url('vote') }}">
                                                        @csrf
                                                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                                        <input type="hidden" name="position" value="{{ $candidate->position }}">
                                                        <button type="submit" class="btn {{ isset($votes['PRESIDENT']) ? 'btn-secondary' : 'btn-success' }} vote-btn" data-position="President" data-candidate-id="{{$candidate->id}}" {{ isset($votes['PRESIDENT']) ? 'disabled' : '' }}>VOTE</button>
                                                    </form>
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
                    <th scope="col">Vice President</th>
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
                                        <h3 class="widget-user-username">{{$candidate->name}}</h5>
                                        <h5 class="widget-user-desc"></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="{{url($candidate->image)}}" alt="User Avatar">
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
                                                    <form method="POST" action="{{ url('vote') }}">
                                                        @csrf
                                                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                                        <input type="hidden" name="position" value="{{ $candidate->position }}">
                                                        <button type="submit" class="btn {{ isset($votes['VISE PRESIDENT']) ? 'btn-secondary' : 'btn-success' }} vote-btn" data-position="Vice President" data-candidate-id="{{$candidate->id}}" {{ isset($votes['VISE PRESIDENT']) ? 'disabled' : '' }}>VOTE</button>
                                                    </form>
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
        button.addEventListener('click', handleVote);
        button.addEventListener('touchstart', handleVote);
    });

    function handleVote(event) {
        const button = event.target;
        const position = button.getAttribute('data-position');
        const candidateId = button.getAttribute('data-candidate-id');

        // Disable other vote buttons for the same position
        document.querySelectorAll(`.vote-btn[data-position="${position}"]`).forEach(function (btn) {
            btn.disabled = true;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-secondary');
        });
    }
});
</script>
@endsection
