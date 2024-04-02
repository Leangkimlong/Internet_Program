<div class="cat-con"
    @if ($loop->index < 10)
        style="background-color: {{$bgColors[0][$loop->index]}}"
    @endif >
    <div class="cat-imgCon">
        <img src="storage/img/{{ $p->image }}" alt="">
    </div>
    <p>{{ $p->name }}</p>
    <p>{{ $p->count }}</p>
</div>

