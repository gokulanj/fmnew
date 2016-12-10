<div class="alert alert-warning">
	Afef Jonathan. <a href="#" class="alert-link">03678</a>.
</div>
<h3>
	Out of Adherence Report 1
</h3>
<table id="outOfAdherenceTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Transaction Time</th>
			<th>Transaction Length/Secs</th>
			<th>Scheduled Activity</th>
			<th>Actual Activity</th>			
		</tr>
	</thead>	
	<tbody>
		@foreach ($empoutOf as $empoutOfs)
            <tr>
                <td>{{ $empoutOfs->state_name }}</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$115,750</td>
            </tr>
        @endforeach		
	</tbody>
</table>