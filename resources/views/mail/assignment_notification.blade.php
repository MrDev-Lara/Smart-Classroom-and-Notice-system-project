<h1>Assignment Notice</h1>

<p>Hello Dear,</p>
<p>New Assignment <b>{{ $assignment->assignment_title }} </b>Have been Posted in <b>{{ $room->course_name }}</b></p>
<p>Assignment Post Date : <b>{{ $assignment->assignment_post_date }} {{ $assignment->assignment_post_time }}</b></p>
<a href="http://localhost:8000/submit-assignment/{{ $assignment->id }}" style="background-color:blue;padding:20px;color:white;text-decoration: :none;">View Assignment</a>

<h4>You are receiving this mail because you are enrolled in this Classroom.</h4>