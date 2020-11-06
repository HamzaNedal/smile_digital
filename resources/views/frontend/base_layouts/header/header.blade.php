
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smile Digital for Entrepreneurial Marketing &amp; Business Solutions: Is one of the tributaries of the Outstanding Smart Solutions Global Group- OSSGG, which includes an elite team in marketing &amp; business solutions who work creatively and providing their accumulated experiences to serve ambitious companies &amp; institutions. In a way that contributes to highlighting and developing their missions in a way that brightens their aspirations..">


    {{-- <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,900;1,700&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    @if (session('lang') == 'ar')
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap-rtl.min.css">
    @else
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    @endif

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    @if (session('lang') == 'ar')
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/style_rlt.css">
    @else
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />
    <title>{{ __('home.title') }}</title>
    <style>
        .skiptranslate{
            display: none !important;
        }
        body{
            position: relative !important;
            min-height: 100% !important;
            top: 0 !important;
        }
        .scrollChange {
             height: 185px;
             overflow-y: scroll;
        }
        .scrollChange::-webkit-scrollbar {
            width: 12px;
            background: none;
        }

        .scrollChange::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            border-radius: 10px;
            background: none;
        }

        .scrollChange::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
            background: none;
        }
        ​ .styleNavAfterScroll {
  background-color: white;
  width: 100%;
  box-shadow: 0 0 10px rgba(123, 123, 123, 0.5);
}
    </style>
    @toastr_css
