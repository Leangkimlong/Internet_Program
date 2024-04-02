@php
    $isButtonDisable = false;
    $quantity = 0;
@endphp
@if (!$isButtonDisable)
    <button class="count-con" onclick="handleClick()">
        Add +
    </button>
@else    
    <div class="count-con" style="justify-content: end ;background-color: white; border: 2px solid #3BB77E;">
        {{ $quantity }}
        <div class="count-arrow">
            <button onclick="incrementQuantity()"><i class="fa-solid fa-arrow-up"></i></button>
            <button onclick="decrementQuantity()"><i class="fa-solid fa-arrow-down"></i></button>
        </div>
    </div>
@endif

<script>
    function handleClick(){
        if(!{{ $isButtonDisable }}){
            {{ $isButtonDisable }} = !{{$isButtonDisable}};
            {{ $quantity }}++;
        }
    }
    function incrementQuantity() {
        {{ $quantity }}++;
    }
    function decrementQuantity() {
        {{ $quantity }}--;
        if ({{ $quantity }} < 1) {
            {{ $isButtonDisable }} = !{{$isButtonDisable}};
        }
    }
</script>