<HTML>
<h3>Welcome to Wiser Capital Platform</h3>

Hi {{$user->first_name}} {{$user->last_name}},

<p><strong>Credentials:</strong></p>

<table>
	<tr>
		<th>App URL:</th>
		<td>{{ $URL }}</td>
	</tr>
	<tr>
		<th>Username:</th>
		<td>{{ $user->email }}</td>
	</tr>
	<tr>
		<th>Password:</th>
		<td>{{ $password }}</td>
	</tr>
</table> 


<p>Once you are successfully logged in, we recommend updating your password. You can find your profile settings by clicking on your name in the top-right corner.</p>
<p>If you have any questions, please contact our support at support@wisercapital.com or call 805.899.3400.</p>

</p>-Wiser Capital Support</p>
</HTML>