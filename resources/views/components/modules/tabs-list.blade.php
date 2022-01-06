<ul class="nav nav-tabs" role="tablist">
    @for($i = 0; $i < $count; $i++ )
        <li class="nav-item">
            <a class="nav-link {{$i + 1 == 1 ? 'active' : '' }}" href="#tab-{{$i + 1}}" data-bs-toggle="tab" role="tab">
                @lang($lang . $i + 1)
            </a>
        </li>
    @endfor
</ul>
