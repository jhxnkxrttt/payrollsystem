<h2>⏱ My Attendance</h2>

@foreach($logs as $log)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        
        <p><b>Date:</b> {{ $log->date }}</p>
        <p><b>Time In:</b> {{ $log->time_in ?? '---' }}</p>
        <p><b>Time Out:</b> {{ $log->time_out ?? '---' }}</p>
        <p><b>Status:</b> {{ $log->status }}</p>

    </div>
@endforeach