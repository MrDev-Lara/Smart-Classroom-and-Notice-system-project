<h1>Important Notice</h1>

<p>Hello Dear,</p>
<p>New Notices Have been Posted by <b> {{ $teacher->name }} </b></p>
<p>Notice Post Date : <b>{{ $notice->notice_post_date }} {{ $notice->notice_post_time }}</b></p>
<h2>{{ $notice->notice_title }}</h2>
<p>{{ $notice->notice_description }}</p>
<a href="http://localhost:8000/view-notice/{{ $notice->id }}" style="background-color:blue;padding:20px;color:white;text-decoration: :none;">View Notice in Website</a>

<h4>You are receiving this mail because you are a student Of IIUC</h4>