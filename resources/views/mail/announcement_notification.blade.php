<h1>Room Announcement Notice</h1>

<p>Hello Dear,</p>
<p>New Announcement <b>{{ $roompost->posts }} </b>Have been Posted in <b>{{ $room->course_name }}</b></p>
<p>Announcement Post Date : <b>{{ $roompost->date }}</b></p>
<a href="http://localhost:8000/view-post-attachments-by-student/{{ $roompost->id }}">View Post</a>

<h4>You are receiving this mail because you are enrolled in this Classroom.</h4>