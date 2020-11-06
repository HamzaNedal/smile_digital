<script src="{{ asset('frontend') }}/js/jquery-3.5.1.min.js "></script>
<script src="{{ asset('frontend') }}/js/popper.min.js "></script>
<script src="{{ asset('frontend') }}/js/bootstrap.min.js "></script>
<script src="{{ asset('frontend') }}/js/owl.carousel.min.js "></script>
<script src="{{ asset('frontend') }}/js/smooth-scroll.min.js"></script>
<script src="{{ asset('frontend') }}/js/wow.min.js"></script>
@if (session('lang') == 'ar')
    <script src="{{ asset('frontend') }}/js/main-rtl.js "></script>
    @else
    <script src="{{ asset('frontend') }}/js/main.js "></script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous"></script>
<script>
    $(".submit-form").on('click',function(){
        $(this).parent().parent().children().find('.formService').submit();
    })
</script>
<script>
    new WOW().init();
    $('#exampleModalCenter').on('hidden.bs.modal', function () {
        document.getElementById('runVideo').pause();
    });
    $('#exampleModalCenter').on('show.bs.modal', function () {
        document.getElementById('runVideo').play()
    });
    $(window).on('scroll',function(){
        var currentScrollPos = window.pageYOffset;        
        if (currentScrollPos > 0 ) {
            $('#top').addClass('fixed-top')
            $('#top').css('background-color','white')
            $('#top').css('box-shadow','0 0 10px rgba(123, 123, 123, 0.5)')
        }else{
            if($('#top').hasClass('fixed-top')){
                $('#top').removeClass('fixed-top')
                $('#top').css('background-color','none')
                $('#top').css('box-shadow','none')
            }
        }
        
       
    });

</script>
@toastr_js
@toastr_render