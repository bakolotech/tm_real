@extends('front.layout.main-layout')
<html>
    <head></head>
    <body>
        @foreach($data as $value)
            <div>{{$value->ref_commande}}</div>
        @endforeach

        <button onclick="deleteExampleFile()">Valider</button>

        <script>

            function deleteExampleFile() {
                $.ajax({
                    type: 'POST',
                    url: '/delete_example_file',
                    data: {},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Here is response', response)
                    }
                })
            }
        </script>
    </body>
</html>