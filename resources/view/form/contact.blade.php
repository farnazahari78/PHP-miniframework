@extends("app.app")
@section("title")
    contact us
@endsection

@section("content")

    @include("layouts.pageHeader")
    <!-- Contact Start -->
    <div class="contact">

        <div class="container">
            <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>Get In Touch</p>
                <h2>For Any Query</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-4 contact-item wow zoomIn" data-wow-delay="0.2s">
                            <i class="fa fa-map-marker-alt"></i>
                            <div class="contact-text">
                                <h2>Location</h2>
                                <p>123 Street, New York, USA</p>
                            </div>
                        </div>
                        <div class="col-md-4 contact-item wow zoomIn" data-wow-delay="0.4s">
                            <i class="fa fa-phone-alt"></i>
                            <div class="contact-text">
                                <h2>Phone</h2>
                                <p>+012 345 67890</p>
                            </div>
                        </div>
                        <div class="col-md-4 contact-item wow zoomIn" data-wow-delay="0.6s">
                            <i class="far fa-envelope"></i>
                            <div class="contact-text">
                                <h2>Email</h2>
                                <p>info@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="contact-form">
                        <div id="success">
                            <?php
                            if (message()->has("congratulations") || message()->has("notSend")):
                            $showClass = message()->has("congratulations") ? "alert-success" : 'alert-danger';
                            $showMsg = message()->has("congratulations") ? message()->get("congratulations") : message()->get("notSend");
                            ?>
                                <div class="alert <?=$showClass?>"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><?=$showMsg?></strong></div>
                            <?php
                                endif;
                            ?>
                        </div>
                        <form name="sentMessage" method="post" action="/contact">
                            @csrf

                            @method("put")

                            <div class="control-group">
                                <input type="text" class="form-control" id="" placeholder="Your Name"  name="contact[name]" />
                                <?php
                                if (errors()->has("customerName")){
                                foreach (errors()->get("customerName") as $error){
                                ?>
                                <p class="help-block text-danger"><?=$error?></p>
                                <?php
                                }
                                }else{?>
                                    <p class="help-block text-danger"></p>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="contact[email]" placeholder="Your Email" value="<?=old()->get("contact.email")?>"  name="contact[email]" />
                                <?php
                                if (errors()->has("email")){
                                foreach (errors()->get("email") as $error){
                                ?>
                                <p class="help-block text-danger"><?=$error?></p>
                                <?php
                                }
                                }else{?>
                                <p class="help-block text-danger"></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" value="<?=old()->get('subject')?>" name="subject"/>
                                <?php
                                if (errors()->has("subject")){
                                foreach (errors()->get("subject") as $error){
                                ?>
                                <p class="help-block text-danger"><?=$error?></p>
                                <?php
                                }
                                }else{?>
                                <p class="help-block text-danger"></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder="Message" name="message"><?=old()->get("message")?></textarea>
                                <?php
                                if (errors()->has("message")){
                                foreach (errors()->get("message") as $error){
                                ?>
                                <p class="help-block text-danger"><?=$error?></p>
                                <?php
                                }
                                }else{?>
                                <p class="help-block text-danger"></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div>
                                <button class="btn" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
