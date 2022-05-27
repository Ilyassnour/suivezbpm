@extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')


       
         


                    <div class="container" style="margin-top: 60px;">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>


                <div class="col-lg-10">
                    <h3 class="text-center text-danger"><b>Edit Compte</b> </h3>

                    
				    <div class="form-group">
                        <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                            <input value="{{ $posts->cif }}"type="text" name="cif" class="form-control m-2" placeholder="cif">
                         <input value="{{ $posts->nom }}" type="text" name="nom" class="form-control m-2" placeholder="NOM">
                         <input value="{{ $posts->nutelephone }}" type="number" name="nutelephone" class="form-control m-2" placeholder="N*telephone">
                         <input value="{{ $posts->adhesion }}"type="date" name="adhesion" class="form-control m-2" placeholder="adhesion">
                        
                         <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Etat</label>
  <select value="{{ $posts->etat}}" class="form-select" name="etat" id="inputGroupSelect01">
    <option value="{{ $posts->etat}}"  selected placeholder="click ici">  </option>
    <option value="Inscription incomplet">Inscription incomplet</option>
    <option value="Non liee">Non liee</option>
    <option value="Liee">Liee</option>
  </select> 

        </div>

       
                        <button type="submit" class="btn btn-danger mt-3 ">Edit</button>
                        <a href="/homme" class="btn btn-danger mt-3 "
                                       style="color:black"><i class=""></i> &nbsp;Anuller</a>
                        </form>
                   </div>
              
</div>

            <br><br><br><br> <br><br><br><br>
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