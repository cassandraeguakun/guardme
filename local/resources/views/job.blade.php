<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 

        $url = URL::to("/"); ?> 

        @include('style')
        <script src="<?php echo $url;?>/js/jquery-ui.js" type="text/javascript" charset="utf-8"></script>    
    </head>
    <body>
        <div class="wrapper"> 
            <div id="pageContent">    
                <!-- Content -->
                <section class="content">
                    <div class="container">
                        <div class="product-info__title">
                        <h2>Full Stack Laravel 5.5 Developer</h2>
                        <h6>Category: Web Development</h6>
                        </div>
                        <div class="row product-info-outer">
                        <div class="col-sm-6 hidden-xs">
                            <div class="product-main-image no-zoom" id="mainProductImg">
                                <div class="product-main-image__item ">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d63835.83982100492!2d36.08432676573114!3d-0.3590294603892526!3m2!1i1024!2i768!4f13.1!2m1!1smaps!5e0!3m2!1sen!2ske!4v1523220114394" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="modal fade zoom" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">✕ </button>
                                    <div>
                                    <iframe width="100%" height="350" src="#"></iframe>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="product-info col-sm-6">
                            <div class="product-info__sku pull-right">DevsInit &nbsp;&nbsp;<span class="label label-success">Web Development</span></div>
                            <div class="price-box product-info__price"><span class="price-box__new">$65.00</span></div>
                            <div class="divider divider--xs product-info__divider"></div>
                            <div class="product-info__description"> 
                            DevsInit is a Web, Software and Mobile Development company based in Nairobi, Kenya. The Company uses Laravel with PHP, Python with Django, Java with Kotlin and Android, Javascript with
                            Angular 5+, React and Vue. DevsInit focuses on making the difference in the Software word by providing flair of elegant software solutions that are affordable.
                            </div>
                            <div class="product-info__description"> 
                            DevsInit is a Web, Software and Mobile Development company based in Nairobi, Kenya. The Company uses Laravel with PHP, Python with Django, Java with Kotlin and Android, Javascript with
                            Angular 5+, React and Vue. DevsInit focuses on making the difference in the Software word by providing flair of elegant software solutions that are affordable.
                            </div>
                            <label>Quantity:</label>
                            <div class="outer">
                            <div class="input-group-qty pull-left"> <span class="pull-left"> </span>
                                <input type="text" name="quant[1]" class="input-number input--wd input-qty pull-left" value="1" min="1" max="100">
                                <span class="pull-left btn-number-container">
                                <button type="button" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[1]"> + </button>
                                <button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus" data-field="quant[1]"> &#8211; </button>
                                </span> </div>
                            <div class="pull-left">
                                <button class="btn btn--wd text-uppercase">Apply Now</button>
                            </div>
                            </div>
                            <div class="divider divider--xs"></div>
                            <ul class="product-links product-links--inline">
                            <li><a href="#"><span class="icon icon-favorite"></span>Add to wishlist</a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </section>
                <section class="content top-null">
                    <div class="container product-additional">
                        <section class="product-additional__box" id="Description">
                        <h3 class="text-uppercase">Description</h3>
                        <p>
                            We are currently looking well experienced Laravel 5.5 gurus.
                        </p>
                        <ul class="simple-list">
                            <li>2 years experience</li>
                            <li>Experince with frontend frameworks such as Vue and React</li>
                            <li>Can work with webpack</li>
                            <li>Can work with gulpjs</li>
                            <li>Efficient in making APIs</li>
                        </ul>
                        </section>
                        <section class="product-additional__box" id="Reviews">
                            <h3 class="text-uppercase">Reviews</h3>
                            <div class="row">
                                <div class="review">
                                    <div class="rating"> <span class="icon icon-star"></span><span class="icon icon-star"></span><span class="icon icon-star"></span><span class="icon icon-star"></span><span class="icon icon-star empty-star"></span> </div>
                                    <h5 class="review__title">THIS IS A BADASS CLIENT</h5>
                                    <div class="review__content">
                                        I'm so happy at this discovery of this client. Clean code and delivers his job in time. Good communication throught the job moreover.
                                    </div>
                                    <div class="review__meta">By <a href="#"><strong>ander</strong></a> on November 25, 2014</div>
                                    <div class="review__comments"><a href="#">Comments (1)</a></div>
                                    <div class="review__helpful">Was this review helpful to you? <a href="#">Yes</a> <a href="#">No</a></div>
                                </div>
                                <div class="review">
                                    <div class="rating"> <span class="icon icon-star"></span><span class="icon icon-star"></span><span class="icon icon-star"></span><span class="icon icon-star"></span><span class="icon icon-star empty-star"></span> </div>
                                    <h5 class="review__title">Excellent, I appreciate!</h5>
                                    <div class="review__content">
                                        Excelent work from the client. I appreciate all the job. Deserves a five star.
                                    </div>
                                    <div class="review__meta">By <a href="#"><strong>ander</strong></a> on November 25, 2014</div>
                                    <div class="review__comments"><a href="#">Comments (1)</a></div>
                                    <div class="review__helpful">Was this review helpful to you? <a href="#">Yes</a> <a href="#">No</a></div>
                                </div>
                                <div class="divider divider--xs"></div>
                                <a href="#" class="btn btn--wd">Write a review</a>
                            </div>
                        </section>
                    </div>
                </section>    
            </div> 
        </div>

        @include('footer')
        <?php if(session()->has('message')){?>
        <script type="text/javascript">
            alert("<?php echo session()->get('message');?>");
        </script>
        </div>
        <?php } ?>  
    </body>
</html>