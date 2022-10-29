<thead>
    <tr>
        @foreach ($fields as $key => $field)
            <th>{!!$field['name']!!}</th>
        @endforeach
    </tr>
</thead>