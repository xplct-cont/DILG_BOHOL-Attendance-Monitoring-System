<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>


    <img src="{{ asset('/assets/images/img/logo1.png') }}" class="center">
    <h1>Department of the Interior and Local Government</h1>
    <h2>Bohol Province</h2>
    <hr>
    <p class="title">My Attendances</p>
    <br>
    <p class="name">Name: {{ Auth::user()->name }}</p>
    <p class="id">ID Number: {{ Auth::user()->idno }}</p>

    @php
        $i = \Auth::user()->idno;
        $count_my_attendances = DB::table('tbl_people_attendance')
            ->where('idno', $i)
            ->orderBy('date', 'ASC')
            ->count();
    @endphp

    <p class="num">Number of My Attendances: {{ $count_my_attendances }}</p>

    <table id="users">
        <tr>

            <th>Date</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Total Hours</th>
            <th>Status(In/Out)</th>
        </tr>

        @foreach ($download_my_attendances as $user)
            <tr>

                <td style="text-align: center;"> {{ Carbon\Carbon::parse($user->date)->format('F d,  Y') }}</td>
                <td style="text-align: center;">{{ Carbon\Carbon::parse($user->timein)->format('h:i:s A') }}</td>
                <td style="text-align: center;">{{ Carbon\Carbon::parse($user->timeout)->format('h:i:s A') }}</td>

                <td style="text-align: center;">
                    @isset($user->totalhours)
                        @if ($user->totalhours != null)
                            @php
                                if (stripos($user->totalhours, '.') === false) {
                                    $h = $user->totalhours;
                                } else {
                                    $HM = explode('.', $user->totalhours);
                                    $h = $HM[0];
                                    $m = $HM[1];
                                }
                            @endphp
                        @endif
                        @if ($user->totalhours != null)
                            @if (stripos($user->totalhours, '.') === false)
                                {{ $h }} hr
                            @else
                                {{ $h }} hr {{ $m }} mins
                            @endif
                        @endif
                    @endisset
                </td>
                <td style="text-align: center;">{{ $user->status_timein }}/{{ $user->status_timeout }}</td>
            </tr>
        @endforeach

    </table>
</body>

</html>


<style>
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    h1 {
        text-align: center;
        font-size: 22px;
        font-weight: 400;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: -50px;
    }

    h2 {
        text-align: center;
        font-size: 18px;
        font-weight: 400;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    }

    .title {
        text-align: center;
        font-size: 20px;
        font-weight: 400;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .name {
        text-align: start;
        font-size: 15px;
        font-weight: 400;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    .id {
        text-align: start;
        font-size: 15px;
        font-weight: 400;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: 5px;
        margin-bottom: 10px;
    }

    .num {
        text-align: start;
        font-size: 15px;
        font-weight: 400;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: 5px;
        margin-bottom: 10px;
    }

    #users {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        font-size: 18px;
        text-align: center;
        width: 100%;
    }

    #users td,
    #users th {
        border: 1px solid #ddd;
        padding: 4px;
    }

    #users tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #users tr:hover {
        background-color: #ddd;
    }

    #users th {
        padding-top: 8px;
        padding-bottom: 8px;
        text-align: left;
        background-color: #234495;
        color: white;
        text-align: center;
    }
</style>
