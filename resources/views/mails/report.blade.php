<div>
    date: {{ $date }}
</div>
@foreach ($data as $key => $row)
    <div>
        product id: {{ $key }}
        sum: {{ $row['sum'] }}
        balance: {{ $row['balance'] }}
        sold out: {{ $row['isSoldOut'] }}
    </div>
@endforeach


