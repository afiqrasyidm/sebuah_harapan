<html>

<head></head>

<body>
<h3>Total user: {{ $total }}</h3>

<table style="width:100%">
	<tr style="border: 1px solid black;">
	    <th>Name</th>
	    <th>email</th>
	</tr>
	@foreach($users as $user)
	<tr style="border: 1px solid black;">
	   	<td>{{ $user->name }}</td>
	    <td>{{ $user->email }}</td> 
	</tr>
	@endforeach

</table>
</body>
</html>