
<table id="agentAdherenceTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
			<tr>
                <th colspan="6">Sites:</th>
                
            </tr>
            <tr>
                <th>Agent ID</th>
                <th>Agent Name</th>
                <th>Scheduled Minutes</th>
                <th>Out Of Adherence</th>
                <th>Mins Out Of Adherence</th>
                <th>% Time in Adherence</th>
            </tr>
        </thead>     
        <tbody> 
        	@foreach ($emp_list as $emps)
            	<tr>
                <td>{{ $emps->emp_id }}</td>
                <td>{{ $emps->emp_name }}</td>
                <td>{{ $emps->state_name }}</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            @endforeach

            <tr>
            	<td></td>
                <td class="text-align-right">Total:</td>
                <td class="text-align-center">2345.50</td>
                <td class="text-align-center">189</td>
                <td class="text-align-center">2345.50</td>
                <td class="text-align-center">$512.25</td>               
            </tr>
             <tr>
             	<td></td>
                <td class="text-align-right">Grand Total:</td>
                <td class="text-align-center">2345.50</td>
                <td class="text-align-center">189</td>
                <td class="text-align-center">2345.50</td>
                <td class="text-align-center">$512.25</td>               
            </tr>
        </tbody>
    </table>