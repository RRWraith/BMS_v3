@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Krijo Perdorues</div>
     </h2> 
@endsection
@section('content')
@role('menaxher|admin')
<form method="POST" action="/menaxher">
    @csrf
    First Name: <br> <input type="text" name="name" placeholder="Emri" class="form input"> <br><br>
    Email: <br><input type="text" name="email" placeholder="Email"> <br><br>
    Password: <br><input type="text" name="passwrod" placeholder="Password"> <br><br>
    Confirm Password:<br><input type="text" name="c_password" placeholder="Confrim password"> <br><br>

    <button type="submit">Create User</button>
</form>

{{-- <form>
    <input type="radio" name="roli1" value="kamarier" checked> Kamarier<br>
    <input type="radio" name="roli2" value="ekonomist"> Ekonomist<br>
</form> --}}
@endrole
@endsection
