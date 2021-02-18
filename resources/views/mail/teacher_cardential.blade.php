<h1>Dear Teacher {{  $teacher->name }},</h1>
<h4>You are receiving this mail because you are enrolled as a Teacher Of IIUC Smart Classroom</h4>

<p>Your Login Cardentials are given below : </p>

<p><b>Your mail : </b> {{ $teacher->email }}</p>
<p><b>Your Password : </b>{{ $teacher->email }}{{ $teacher->phone }}</p>

<a href="http://localhost:8000/teacher/login">Login here using the Following Cardentials</a>


