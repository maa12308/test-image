    @if (count($items) > 0)
   
    <div class="container">
        <div class="row">
        @foreach ($items as $item)
            
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                <img src="{{ $item->image }}" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title">{{ $item->bland }}</h5>
                    <a class="btn btn-secondary btn-block" {!! link_to_route('items.show','詳細', ['item' => $item->id]) !!}</a>
                    </div>
                </div>
            </div>
            
            
        @endforeach
        </div>
    </div>
    
    @endif
    
    <div class="pagination justify-content-center">
    {{ $items->links() }}
    </div>