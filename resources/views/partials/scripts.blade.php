 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('pluggins/jquery/jquery.min.js')}}"></script>
 <script src="{{ asset('pluggins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <!-- Core plugin JavaScript-->
 <script src="{{ asset('pluggins/jquery-easing/jquery.easing.min.js')}}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

 <!-- Page level plugins -->
 <script src="{{ asset('pluggins/chart.js/Chart.min.js')}}"></script>
 <!-- fontawesome -->
 <script src="https://kit.fontawesome.com/9abc6fbf4a.js" crossorigin="anonymous"></script>
 <!-- Page level custom scripts -->
 <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>
 <script src="{{ asset('js/demo/chart-pie-demo.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
 <script src="{{ asset('js/jquery.min.js')}}"></script>
 <script src="{{ asset('js/module.js')}}"></script>
 <script src="{{ asset('js/hotkeys.js')}}"></script>
 <script src="{{ asset('js/uploader.js')}}"></script>
 <script src="{{ asset('js/simditor.js')}}"></script>
 <!-- accordeon -->
 <script src="{{ asset('js/accordeon.js')}}"></script>
 <!-- input generate -->

 <script src="{{ asset('js/input.js')}}"></script>
 <!-- summernote
 -->

 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js" integrity="sha256-5slxYrL5Ct3mhMAp/dgnb5JSnTYMtkr4dHby34N10qw=" crossorigin="anonymous"></script>

 <!-- language pack -->
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/lang/summernote-ko-KR.min.js" integrity="sha256-y2bkXLA0VKwUx5hwbBKnaboRThcu7YOFyuYarJbCnoQ=" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

 <script>
     $('#summernote').summernote({
         placeholder: 'Description',
         tabsize: 2,
         height: 400,
         lang: 'fr-FR', // default: 'en-US'
     });


     $("#summer").summernote({
         placeholder: 'Description',
         tabsize: 2,
         height: 400,
         lang: 'fr-FR', // default: 'en-US'
     });

     $('.summer').each(function(index){
        console.log(index);
     })
 </script>
