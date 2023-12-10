@extends('.frontend.layout.main')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-center">Teams List</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Team Name</th>
                        <th>University Name</th>
                        <th>Approve Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $key => $team)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$team->team_name}}</td>
                            <td>{{$team->university_name}}</td>
                            <td>{!!$team->admin_approved ? '<span class="badge text-bg-success">Approved</span>' :
                                '<span class="badge text-bg-danger">Pending</span>' !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
