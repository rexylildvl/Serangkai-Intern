<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Aktivitas</th>
            <th>Kendala</th>
            <th>Progress</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logbooks as $log)
            <tr>
                <td>{{ $log->tanggal }}</td>
                <td>{{ $log->aktivitas }}</td>
                <td>{{ $log->kendala }}</td>
                <td>{{ $log->progress }}%</td>
                <td>{{ $log->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
