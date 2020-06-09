<table class="table">
        <thead class="alert-danger">
            <tr>
                <th>Kết quả</th>
                <th>Cash</th>
                <th>Thời gian</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                @if( $item['status'] == 1 )
                <td><b class="text-success">Thắng</b></td>
                @else
                <td><b class="text-danger">Thua</b></td>
                @endif
                @if( $item['status'] == 1 )
                <td>+{{ number_format($item['cash'], 0, ',', '.') }}</td>
                @else
                <td>-{{  number_format($item['cash'], 0, ',', '.') }}</td>
                @endif
                <td>{{ $item['created_at'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="cangiua">{{ $data->links() }}</div>