
@extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

        <div class="container" style="margin-top: 60px;">
            <div class="row">


              
                <div class="col-lg-9">
                    <h3 class="text-center text-danger"><b>Ajouter un nouveau Compte</b> </h3>
				            
                   <!-- <a class="btn btn-outline-success" href="{{ url('import_comptes') }}"
                            style="color:black"><i class="fas fa-file-download"></i>&nbsp;Import excel</a>
 <br> <br> 
 -->
           
            <div class="form-group">
                        <form action="/post" method="post" enctype="multipart/form-data">
                         @csrf
        				 <input type="text" required name="cif" class="form-control m-2" placeholder="cif">
                         <input required type="text" name="nom" class="form-control m-2" placeholder="NOM">
                         <input required type="number" name="nutelephone" class="form-control m-2" placeholder="N*telephone">
                         <input required type="date" name="adhesion" class="form-control m-2" placeholder="adhesion">

                         <div class="input-group mb-3">
  <label required class="input-group-text" for="inputGroupSelect01">Etat</label>
  <select class="form-select" name="etat" id="inputGroupSelect01">
    <option selected> </option>
    <option value="Inscription incomplet">Inscription incomplet</option>
    <option value="Non liee">Non liee</option>
    <option value="Liee">Liee</option>
  </select>
        </div>
        			<label class="m-2">Cover Image</label>
                         <input required value="Inscription incomplet" type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">

                        <!-- <label class="m-2">Images</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
-->
                        <button type="submit" class="btn btn-danger mt-3 ">Ajouter</button>
                        <a href="/homme" class="btn btn-danger mt-3 "
                                       style="color:black"><i class=""></i> &nbsp;Anuller</a>
                        </form>
                           
                   </div>
                </div>
            </div>

            <br><br><br><br><br>
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>	
@endsection







