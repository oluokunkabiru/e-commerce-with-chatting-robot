{{--  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">  --}}
 {{-- <link rel="stylesheet" href="{{ asset('asset/chat.min.css') }}"> --}}
<script>
//   var botmanWidget = {
//   aboutText: 'Write Something',
//   introMessage: "✋ Hi! I'm Okediya Kenny <br><br> How may I help you?"
//   };

        var avatar = "{{ asset('asset/images/kenny.jpg') }}"
        var botmanWidget = {
                chatServer : "{{ route('botman') }}",
                frameEndpoint : "{{ url('botman/chat') }}",
                title : "Negotiate this product",
                timeFormat : "HH:MM",
                dateTimeFormat : "d/m/yy HH:MM",
                introMessage : "Hi! I'm Okediya Kenny <br><br> How may I help you?",
                mainColor : "#7fad39",
                bubbleBackground : "#7fad39",
                bubbleAvatarUrl :avatar,
                aboutText : "OLUOKUN KABIRU ADESINA",
                placeholderText : "Type message here ....."
            };
</script>
 {{-- <script src="{{ asset('asset/widget.js') }}}"></script> --}}

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>