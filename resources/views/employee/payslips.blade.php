<h2>📄 My Payslips</h2>

@foreach($payslips as $p)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        
        <p><b>Cutoff:</b> {{ $p->cut_off_start }} - {{ $p->cut_off_end }}</p>
        <p><b>Total Days:</b> {{ $p->total_days }}</p>

        <hr>

        <p><b>Gross Pay:</b> ₱{{ $p->gross_pay }}</p>
        <p><b>Deductions:</b> ₱{{ $p->total_deductions }}</p>
        <p><b>Net Pay:</b> ₱{{ $p->net_pay }}</p>

        <p><small>Generated: {{ $p->generated_at }}</small></p>
    </div>
@endforeach