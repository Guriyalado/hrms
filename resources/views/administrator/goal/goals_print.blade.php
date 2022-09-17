<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('Job Report') }}</title>


</head>
<body onload="window.print();">
    <div id="printable_area" class="col-md-12 table-responsive">

    <table  class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('id') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Body') }}</th>
                <th>{{ __('Time Bounding') }}</th>
                <th>{{ __('Department') }}</th>
                
                
            </tr>
        </thead>
        <tbody>
            
            @foreach($goals as $goal)
            <tr>
                
                <td>{{ $goal['id'] }}</td>
                <td>{{ $goal['title'] }}</td>
                <td>{{ $goal['body'] }}</td>
                <td>{{ $goal['time_bounding'] }}</td>
                <td>{{ $goal['department'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>