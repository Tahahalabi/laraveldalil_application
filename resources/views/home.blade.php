<ul>
    @foreach ($getAllCategoreis as $category)
        <li>
            <a href="/category?cid={{$category->id}}&pid={{$defaultProvince->id}}&smid=">{{$category->name}}</a>
        </li>
    @endforeach
</ul>