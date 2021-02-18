<h1>Dear Student {{  $user->name }},</h1>
<h4>You are receiving this mail because you are enrolled as a student Of IIUC Smart Classroom</h4>

<p>Your Login Cardentials are given below : </p>

<p><b>Your Id : </b> {{ $user->student_id }}</p>
<p><b>Your Password : </b>{{ $user->student_id }}{{ $user->phone }}</p>

<a href="http://localhost:8000/login">Login here using the Following Cardentials</a>

<h2>Dont forget to change your password after your first Login in the Site.</h2>
<p>Update your Password Using the following link</p>
<a href="http://localhost:8000/my-profile">Update Password</a>
