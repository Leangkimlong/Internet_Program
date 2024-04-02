<div class="prod-con">
    <div class="prod-imgCon">
        <img src="{{ asset('storage/img/' . $p->image) }}" alt="">
        {{-- <img src="storage/img/{{ $p->image }}" alt=""> --}}
    </div>
    <div class="prod-text" >
        <p class="p1">Hodo Foods</p>
        @if (Str::endsWith(url()->current(), '/edit'))
            <a href="/products/add?id={{$p->id}}" style="text-decoration: none">
                <p class="p2">{{ $p->name }}</p>    
            </a>
        @else
            <p class="p2">{{ $p->name }}</p>    
        @endif
        <div class="prod-star">
            @for ($i = 0; $i < 5; $i++)
                @if ($i < (int) $p->star)
                    {{-- <img src="storage/img/001-star1.png" alt=""> --}}
                    <img src="{{ asset('storage/img/001-star1.png') }}" alt="">
                @else
                    {{-- <img src="storage/img/001-star5.png" alt="">      --}}
                    <img src="{{ asset('storage/img/001-star5.png') }}" alt="">
                @endif
            @endfor
            <p class="p6">({{ $p->star }})</p>
        </div>
        <p class="p3">500 gram</p>
        <div class="prod-price">
            <div class="wrapper">
                @if (preg_match('/-\d{1,2}%/',$p->promotion))
                    @php
                        $discount = (int) preg_split('/[-%]/', $p->promotion)[1];
                        $disPrice = $p->pricing * (1 - $discount/100);
                    @endphp
                    <p class="p4">${{ number_format($disPrice, 2) }}</p>
                    <p class="p5">${{ number_format($p->pricing,2) }}</p>
                @else
                    <p class="p4">${{ number_format($p->pricing,2) }}</p>
                @endif
            </div>
            @include('components.count')
        </div>
    </div>
    @if ($p->promotion)
        <div class="prod-disp"
            @switch($p->promotion)
                @case("Hot")
                    style="background-color: #FD6E6E"
                    @break
                @case("Sale")    
                    style="background-color: #FDC040"
                    @break
                @default
                    style="background-color: #3BB77E"
                    @break
            @endswitch
        >
            <p>{{ $p->promotion }}</p>
        </div>
    @endif
</div>