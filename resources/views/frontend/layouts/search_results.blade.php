@foreach ($products as $item)
<a href="{{route('product.details', ['id' => $item->id, Str::slug($item->title)]) }}" class="search-item"
     style="padding:8px; border-bottom:1px solid #eee; cursor:pointer; display:flex; align-items:center;">
    <img src="/storage/{{ $item->image }}" width="40" height="40" style="margin-right:10px; object-fit:cover;">
    <span>{{ $item->title }}</span>
</a>
@endforeach
