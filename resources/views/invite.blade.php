// make use of the named route so that if the URL ever changes, 
// the form will not break #winning

<form action="{{} route('invite') }}" method="POST">
	{{ csrf_field() }}
	<input type="email" name="email">
	<button type="submit">Send Invite</button>
</form>