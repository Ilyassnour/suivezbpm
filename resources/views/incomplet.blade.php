
        @extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

            <h3 class="text-center text-danger"><b>Liste des comptes incomplets</b> </h3>
            <a href="/create" class="btn btn-outline-success"
           style="color:black"><i class=""></i> &nbsp;Nouveau Compte +</a>
 
                        <a class="btn btn-outline-success" href="{{ url('export_comptes') }}" onclick="return confirm('Êtes-vous sûr de vouloir Exporter ');"
                            style="color:black"><i class="fas fa-file-download"></i>&nbsp;Export excel</a>
 <br> 
            <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>CIF</th>
            <th>Nome</th>
            <th>N*telephone</th>
            <th>Date adhesion</th>
            <th>CCL</th>
            <th>Etat</th>
                  <!--  <th>Cover</th>-->
                    <th>Edit</th>
                    <th>Supprimer</th>
                  </tr>
                  <tr>
        
      
                </thead>
                <tbody>


                    @foreach ($posts as $post)
                 <tr>
                       <th scope="row">{{ $post->id }}</th>
                       <td>{{ $post->cif }}</td>
                       <td>{{ $post->nom }}</td>
                       <td>{{ $post->nutelephone }}</td>
                       <td>{{ $post->adhesion }}</td>
                       <td>{{ $post->ccl }}</td>
                       <td>{{ $post->etat }}</td>
                       
                       <!--<td><img src="cover/{{ $post->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
-->
                      <td><a href="/edit/{{ $post->id }}" class="btn btn-outline-primary">Edit</a></td>
                        <td>
                            <form action="/delete/{{ $post->id }}" method="post">
                                <button class="btn btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer! ');"
                                    type="submit">supprimer</button>
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                   </tr>
                   @endforeach

                </tbody>
              </table>
               {{$posts->links()}}
        </div>

        
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
@endsections
