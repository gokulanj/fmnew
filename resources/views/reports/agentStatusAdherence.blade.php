<div class="alert alert-warning">
	Afef Jonathan. <a href="#" class="alert-link">03678</a>.
</div>
<table id="agentStatusAdherenceTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
       
	<thead>
		<tr>
        	<th></th>
			<th>Status</th>
			<th>Time Started</th>
			<th>Duration</th>
			
		</tr>
	</thead>
	
	<tbody>
		@foreach ($agentstat as $agentstatus)
            <tr>
                <td>{{ $agentstatus->emp_name }}</td>
                <td>Software Engineer</td>
                <td>{{ $agentstatus->emp_address }}, {{ $agentstatus->state_name }}</td>
                <td>56</td>
            </tr>
        @endforeach			
	</tbody>

</table>