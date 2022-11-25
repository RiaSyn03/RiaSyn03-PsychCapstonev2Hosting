<html>
    <head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 
</head>

        <body>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ url('contact-submit') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name="fullname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Subject</label>
                                        <input type="text" name="subject" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <textarea name="message" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>