<h1>CoinAPI Data List</h1>

<ul>
    @foreach ($asset as $currency)
    <li> {{$currency->asset_id}}. {{$currency->asset_quote}} - 1:{{$currency->asset_rate}} (MYR:{{$currency->asset_quote}})</li>
    @endforeach
</ul>