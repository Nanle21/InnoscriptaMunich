<table>
    <thead>
    <tr>
        
        <th>Name</th>
        <th>Email</th>
        <th>Passed</th>
        <th>Failed</th>
    </tr>
    </thead>
    <tbody>
    @foreach($assets as $asset)
        <tr>
            
            <td>{{ $asset->name }}</td>
            <td>{{ $asset->email }}</td>
            <td>{{ $asset->passed }}</td>
            <td>{{ $asset->failed }}</td>
        </tr>
    @endforeach
    </tbody>
</table>