  @empty(!$staticPages->toArray())
    
  <!-- Start About Section -->
    <section class="start wow slideInLeft">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <div class="start-img">
                        <img src="{{ asset('frontend') }}/img/about.png" width="100%" alt="">
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-play" ></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="start-containt">
                        <h2>
                            {{ $staticPages->name }}
                        </h2>
                        <p> {{ $staticPages->value }}.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <video width="450" height="240" controls id="runVideo">
                <source src=" {{ asset('files/'.$staticPages->parent->file) }}" type="video/mp4">
                <source src=" {{ asset('files/'.$staticPages->parent->file) }}" type="video/ogg">
                Your browser does not support the video tag.
              </video>
        </div>
      </div>
    </div>
  </div>
    </section>
    @push('js')
        <script>
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        </script>
    @endpush
    @endempty