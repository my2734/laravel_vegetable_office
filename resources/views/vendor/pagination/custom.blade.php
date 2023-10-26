{{-- 
@if ($paginator->hasPages())
    <div class="product__pagination blog__pagination custom_pagination">
       
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-active"><a>{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><span>Next →</span></li>
        @endif
    </div>
@endif  --}}

@if($paginator->hasPages())
    <div class="col-lg-12">
        <div class="product__pagination blog__pagination">
            @foreach ($elements as $element)
           
            @if (is_string($element))
                <a class="disabled custom_margin-right_pagination">{{ $element }}</a>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="page-active custom_margin-right_pagination">{{ $page }}</a>
                    @else
                        <a class=" custom_margin-right_pagination" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        </div>
    </div>
@endif