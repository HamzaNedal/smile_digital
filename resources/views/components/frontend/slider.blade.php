@if($sliders->isNotEmpty()) 
<div class="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
   
      <div class="carousel-inner">
        @foreach ($sliders as $slider)
        @push('loop')
            <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : ''  }}"></li>
        @endpush
  
            <div class="carousel-item {{ $loop->first ? 'active' : ''  }}" style="background-image: url({{ asset('background_image/'.$slider->parent->background_image) }})">
                {{-- <img src="{{ asset('background_image/'.$slider->parent->background_image) }}" class="d-block w-100 h-100" alt="{{ $slider->name }}"> --}}
                {{-- <img src="{{ asset('image/'.$slider->parent->image) }}" class="d-block w-50 h-50" alt="{{ $slider->name }}"> --}}
                <div class="carousel-caption d-md-block">
                    <h1><a href="{{ $slider->parent->link }}" class="text-decoration-none" style="color:white" target="_blank" rel="noopener noreferrer">{{ $slider->title }}</a></h1>
                <p>{{ $slider->description }}.</p>
                </div>
            </div>
        @endforeach  
      </div>
      @if ($sliders->count() > 1)
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        <ol class="carousel-indicators">
          @stack('loop')
        </ol>
      @endif
    
    
    </div>
    
  </div>
  @endif