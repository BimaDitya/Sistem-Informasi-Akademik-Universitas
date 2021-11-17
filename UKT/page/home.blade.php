@extends('layouts.frontend.master')
@section('konten')
<div id="contact" class="contact-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
          <h6>SIKIDU</h6>
          <h4>Pembayaran <em>UKT</em></h4>
          <div class="line-dec"></div>
        </div>
      </div>
      <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <form id="contact" action="" method="post">
          <div class="row">
            <div class="col-lg-12">
              <div class="contact-dec">
                <img src="" alt="">
              </div>
            </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="name" name="name" id="name" placeholder="NIM" autocomplete="on" required>
                    </fieldset>
                    <fieldset>
                      <input type="text" name="nim" id="email" placeholder="Semester" autocomplete="on"required>
                    </fieldset>
                    <fieldset>
                      <input type="subject" name="subject" id="subject" placeholder="Jurusan" autocomplete="on">
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="Jumlah UKT" required=""></textarea>  
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop  
  
