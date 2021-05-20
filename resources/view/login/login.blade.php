@extends("app.app")
@section("title")
    login
@endsection

@section("content")

    @include("layouts.pageHeader")
    <!-- Contact Start -->
    <div class="contact">

        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="contact-form">
                        <div id="success">
                            <?php
                            if (message()->has("failed") || errors()->any()):

                            $showClass ='alert-danger';

                            $showMsg = message()->has("failed") ? message()->get("failed") : "invalid email or password";
                            ?>
                                <div class="alert <?=$showClass?>"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><?=$showMsg?></strong></div>
                            <?php
                                endif;
                            ?>
                        </div>
                        <form name="sentMessage" method="post" action="/login">

                            @csrf

                            <div class="control-group">

                                <input type="text" class="form-control"  placeholder="Your email"  name="email" />

                            </div>

                            <br>

                            <div class="control-group">

                                <input type="password" class="form-control"  placeholder="Your password" name="password" />

                            </div>
                            <br>
                            <div>

                                <button class="btn" type="submit">login</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
