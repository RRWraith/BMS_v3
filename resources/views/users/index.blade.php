@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div class="m-l-lg">Perdorues</div>
</h2>
@endsection
@section('content')

<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Liste <b>Perdoruesish</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="#krijoUser" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                    <span>Shto te ri</span>
                </a>
            </div>

        </div>
    </div>
    <table class="table table-striped table-hover table-responsive">
        <thead>
            <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Roli</th>
                    <th>Email</th>
                    <th>Nr Tel</th>
                    <th>Ndrysho</th>
            </tr>
        </thead>
        <tbody>
            @if(count($users)>0)
            @foreach ($users as $key=>$user)
            @php
            $roles = $user->getRoleNames();
            if($roles[0] == 'admin' || $roles[0] == 'menaxher') {
            continue;
            }
            @endphp
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$roles[0]}}</td>
                <td>{{$user->email}}</td>
                <td>{{'+355'}} {{rand(67, 69)}} {{rand(100, 999)}} {{rand(1000, 9999)}}</td>
                <td><a href="/users/{{$user->id}}/edit">Ndrysho {{$user->name}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>


<!-- Popup shtim Useri -->
<div id="krijoUser" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/users">
                @CSRF
                <div class="modal-header">
                    <h4 class="modal-title">Shto Perdorues</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Emri</label>
                        <input type="text" name="name" placeholder="Emri" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Password</label>
                        <input type="text" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Konfirmo Password</label>
                        <input type="text" name="c_password" placeholder="Konfirmo Password" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Kamarier</label>
                        <input type="radio" value="kamarier" name="radio" required="">
                    </div>
                    <div class="form-group">
                        <label>Ekonomist</label>
                        <input type="radio" value="ekonomist" name="radio">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Krijo">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
