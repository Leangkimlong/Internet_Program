<div id="formInsertData" >
    <form class="contain" method="POST" enctype="multipart/form-data" 
            @if ($product)
                action="/products/store?id={{$product->id}}"
            @else
                action="/products/store"
            @endif>
        @csrf
        <div class="grid-item name">
            <label for="name">Name</label>
            <input @if ($product)
                value="{{$product->name}}"
            @endif id="name" type="text" name="name">
        </div>
        <div class="grid-item price">
            <label for="price">Price</label>
            <input @if ($product)
                
                value="{{$product->pricing}}"
            @endif name="price" id="price" type="text">
        </div>
        <div class="grid-item promotion">
            <label for="promotion">Promotion</label>
            <input @if ($product)
                @if (preg_match('/-\d{1,2}%/',$product->promotion))
                    value="{{(int) preg_split('/[-%]/', $product->promotion)[1]}}"
                @elseif(preg_match('/-%/',$product->promotion))
                    value="";
                @else
                    value="{{$product->promotion}}"            
                @endif
            @endif 
            type="text" name="promotion" id="promotion">
        </div>
        <div class="grid-item category">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $c)
                    <option value="{{$c->id}}"
                        @if ($product)
                            @if ($c->id == $product->category_id)
                                selected
                            @endif
                        @endif 
                    >{{$c->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="grid-item image">
            <label for="image">Image</label>
            <input id="image" type="file" name="image">
        </div>
        <div class="grid-item description">
            <label for="description">Description</label>
            <textarea  name="description" id="description" cols="30" rows="4">@if($product){{$product->description}} @endif
            </textarea>
        </div>
        <div class="grid-item button">
            @if ($product)
                <a href="/products/edit" style="">
                    Cancel
                </a>
                <button type="submit" class="insert">Update</button>
            @else       
                <a href="/" style="">
                    Cancel
                </a>
                <button type="submit" class="insert">Insert</button>
            @endif
        </div>
    </form>
</div>

<script>
    function toggleDisplay(){
        var form = document.getElementById('form');
        var contain = document.getElementById('contain');

        form.style.display = 'none';
        contain.style.display = 'flex';
    }
</script>

<style>
    #formInsertData a{
        text-decoration: none;
        border: 1px solid black;
        padding: 5px 10px;
        background-color: rgb(240, 240, 240);
        color: black;
    }
    #formInsertData .contain {
        display: grid;
        grid-template-columns: repeat(2, 300px);
        grid-template-areas: 
            "name name"
            "price promotion"
            "category category"
            "image image"
            "description description"
            "button button";
        grid-gap: 15px;
        padding: 50px 10px;
        border: black 1px solid;
        width: fit-content;
    }

    #formInsertData .grid-item textarea {
        resize: none;
        flex-grow: 1;
    }

    #formInsertData .grid-item {
        padding: 0px;
        background-color: white;
        text-align: start;
        display: flex;
        gap: 10px;
        width: 100%;
    }

    #formInsertData .grid-item input {
        flex-grow: 1;
    }

    #formInsertData .grid-item label {
        width: 80px;
    }

    #formInsertData .name {
        grid-area: name;
    }

    #formInsertData .price {
        grid-area: price;
    }

    #formInsertData .promotion {
        grid-area: promotion;
    }

    #formInsertData .category {
        grid-area: category;
    }

    #formInsertData .image {
        grid-area: image;
    }

    #formInsertData .description {
        grid-area: description;
    }
    #formInsertData .button {
        grid-area: button;
        display: flex;
        justify-content: flex-end;

    }
    #formInsertData .button .insert{
        background-color: royalblue;
        color: white;
    }
    #formInsertData .button button{
        padding: 5px 10px;
        cursor: pointer;
    }
</style>
