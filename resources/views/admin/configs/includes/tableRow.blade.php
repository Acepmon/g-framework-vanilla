@if (is_array($arr))
    @foreach($arr as $key => $value)
        @if (is_array($value))
            <tr>
                <th colspan="2" class="active text-capitalize" style="padding-left: {{ 20 * $level }}px">{{$key}}</th>
            </tr>
            @include('admin.configs.includes.tableRow', ['arr' => $value, 'level' => $level + 1])
        @else
            <tr>
                <th class="text-capitalize" style="padding-left: {{ 20 * $level }}px">{{$key}}</th>
                <td>{{$value}}</td>
            </tr>
        @endif
    @endforeach
@endif
