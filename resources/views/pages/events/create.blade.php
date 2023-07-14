@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Please create a new event base on <code>form</code> below</h4>
            </div>
            <div id="loginMessage"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Event name</label>
                            <input type="text" class="form-control" id="name"
                                placeholder="example. Radja Band Concert">
                        </div>
                        <div class="form-group mt-4">
                            <label for="tickets">Tickets available</label>
                            <input type="number" class="form-control" id="tickets" placeholder="example. 5000">
                        </div>
                        <div class="form-group mt-4">
                            <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Choose a date</label>
                            <input type="date" class="form-control" id="date">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#submit').click(function() {
                // e.preventDefault();
                var name = $('#name').val();
                var tickets = $('#tickets').val();
                var date = $('#date').val();
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: '/event/create',
                    type: 'post',
                    data: {
                        'name': name,
                        'tickets': tickets,
                        'date': date,
                        '_token': token
                    },
                    success: function(response) {
                        // Tangani respon sukses
                        var successMessage = document.createElement("div");
                        successMessage.className = "alert alert-success";
                        successMessage.textContent = "Create event successfully."
                        $('#loginMessage').html(successMessage);

                    },
                    error: function(xhr, error, status) {
                        // Tangani respon error
                        var errorMessage = document.createElement("div");
                        errorMessage.className = "alert alert-danger";
                        errorMessage.textContent = xhr.responseJSON.message;
                        $('#loginMessage').html(errorMessage);
                        setTimeout(function() {
                            errorMessage.remove();
                        }, 5000);
                    }
                });
            });
        });
    </script>
@endsection
