@extends('emails/layouts/default')

@section('content')

    <p>Below is a summary of what's been uploaded via the bulk form.</p>

    <table style="border: 1px solid black; padding: 5px;" width="100%" cellspacing="0" cellpadding="3">
        <tr>
            <td><strong>#</strong></td>
            <td><strong>Serial/Asset Tag Message</strong></td>
        </tr>

        @foreach($assets as $key => $asset)
            <tr>
                <td><?php echo $key+1; ?></td>
                <td>{{ $asset }}</td>
            </tr>

        @endforeach

    </table>

    @if ($snipeSettings->show_url_in_emails=='1')
        <p><a href="{{ url('/') }}">{{ $snipeSettings->site_name }}</a></p>
    @else
        <p>{{ $snipeSettings->site_name }}</p>
    @endif

@stop
