
<div class="col-md-2 py-2">
    <ul class="list-group list-group-flush">
        @foreach($categories as $category)
        <li class="list-group-item">
            <a class="link" href="{{route('sort',[$category->id])}}">{{$category->title}}</a>
        </li>
@endforeach
    </ul>
</div>

