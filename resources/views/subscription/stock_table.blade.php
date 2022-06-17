@if(sizeof($stock) > 0)
    @foreach($stock as $i => $s)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $s['Ticker'] }}</td>
            <td>{{ $s['Name'] }}</td>
            <td>
                @if(!in_array($s['id'],$current_stock))
                    <input type="checkbox" class="selectStock"  name="stock[{{$s['id']}}]" id="{{ $s['id'] }}" value="{{ $s['id'] }}">
                    @else
                    <input type="checkbox" class="disabled" disabled checked>
                @endif
            </td>
        </tr>
    @endforeach
@endif