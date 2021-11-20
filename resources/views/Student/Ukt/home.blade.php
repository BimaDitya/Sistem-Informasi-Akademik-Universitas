@extends('Student.Ukt.master')
@section('konten')
<div id="contact" class="contact-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
          <h6>SINIKAD</h6>
          <h4>Pembayaran <em>UKT</em></h4>
          <div class="line-dec"></div>
        </div>
      </div>
      <div class="modal-view">
        <table class="table" id="example1">
          <thead>
            <tr style="background:rgb(14, 14, 250);color:rgb(255, 255, 255);">
              <th> No</th>
              <th> NIM</th>
              <th> Bidikmisi</th>
              <th> Tahun Ajaran</th>
              <th> Jumlah</th>		
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $isi[''];?></td>
              <td><?php echo $isi[''];?></td>
              <td><?php echo $isi[''];?></td>
              <td>Rp.<?php echo number_format($isi['']);?>,-</td>
              <td><?php echo $isi[''];?></td>
            </tr>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
      <div class="clearfix" style="padding-top:5pc;"></div>
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
  
