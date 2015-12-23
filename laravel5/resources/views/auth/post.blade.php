<form action="/validate/form" method="post">
{!!  csrf_field() !!}
	  
    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
        	@if($errors->first('email')!='')
        		<span style="color:red;font-size:12px;">
        		{{ $errors->first('email') }}
        				{{ $errors->first('ok') }}
        		<span>
        	@endif
    </div>
    <div>
        Password
        <input type="password" name="password" id="password">
        	@if($errors->first('password')!='')
        		<span style="color:red;font-size:12px;">
        		{{ $errors->first('password')}}
        		{{ $errors->first('ok')}}
        		<span>
        	@endif
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
