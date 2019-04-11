<div class="card bg-light" style="max-height: 500px;overflow: auto;">
    <div class="card-body" >
        <h1 class="text-center">Top 100 Most Requested Pages</h1>
        <ul>
            @if(isset($urls))
                @foreach ($urls as $url)
                    <li>
                        <a href="{{$url->short_url}}" target="_blank">{{$url->long_url}}</a>
                        <p>Last request {{$url->last_requested->diffForHumans()}}</p>
                    </li>
                @endforeach 
            @endif           
        </ul>
    </div>
</div>
