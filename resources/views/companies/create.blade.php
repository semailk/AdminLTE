@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>
    <script src="{{ asset('js/select2.js') }}"></script>
    <div class="container">
        <h2 class="text-center">COMPANY CREATE</h2>
        <div class="select-2">
            <form action="" id="form">
                <label for="name">Name</label>
                <input required type="text" name="name" id="name" class="form-control">

                <label for="id_select2_demo1">Clients</label>
                <select required name="clients[]" class="form-control selector" id="id_select2_demo1"></select>

                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </form>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script>
        $(document).ready(function () {
            var form = document.querySelector('#form');

            form.onsubmit = async (e) => {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    url: "{{ route('companies.store') }}",
                    method: "POST",
                    data: {
                        name: $('#name').val(),
                        clients: $('#id_select2_demo1').val()
                    },
                    success: function (response){
                        Swal.fire(
                            'Good job!',
                            'Company Create!!!',
                            'success'
                        )
                    }
                });
            };
            $('.selector').select2({
                multiple: true,
            });
            $.ajax({
                url: "{{ route('get.companies.ajax') }}",
                method: "GET",
                success: function (response) {
                    var result = '';
                    data = response
                    $.each(response, function (index, value) {
                        result += '<option value="' + value.id + '">' + value.name + '</option>';
                    })
                    $('#id_select2_demo1').append(result)
                }
            })
        });
    </script>
@endsection
