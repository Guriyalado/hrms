<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $goal->title }} {{ __('Details') }}</title>

    

</head>
<body>
    <div class="header">
        <img src="{{ url('public/backend/img/logo.png') }}">
    </div>
    <div class="footer"><p>{{ __('Page:') }} <span class="pagenum"></span></p></div>
    <div class="container">
        <table>
            <tr>
                <td>
                    <p>
                        {{ $goal->title }}
                        <br>
                        {{ $goal->body }}
                        <br>
                        {{ $goal->designation }}
                    </p>
                </td>
                <td>
                    @if(!empty($goal->avatar))
                    <img src="{{ url('public/profile_picture/' . $goal->avatar) }}" class="img-responsive img-thumbnail">
                    @else
                    <img src="{{ url('public/profile_picture/blank_profile_picture.png') }}" alt="blank_profile_picture" class="img-responsive img-thumbnail">
                    @endif
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tbody>
                 <tr>
                            <td>{{ __('Title') }}</td>
                            <td>{{ $goal->title }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Body') }}</td>
                            <td>{{ $goal->body }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Time Bounding') }}</td>
                            <td>{{ $goal->time_bounding }}</td>
                        </tr>
                       
                        <tr>
                           <td>{{ __('Designation') }}</td>
                            <td>
                               {{ $employee->designation }}
                            </td>
                        </tr>
               
               
            </tbody>
        </table>
    </div>
</body>
</html>