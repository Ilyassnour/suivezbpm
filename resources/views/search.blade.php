@extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

           <br>
             @if(isset($countries))

               <table class="table table-hover">
               <thead>
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
                       @if(count($countries) > 0)
                           @foreach($countries as $countrie)
                             
                            
                                  <tr>
                                  <td>{{ $countrie->id }}</td>
                       <td>{{ $countrie->cif }}</td>
                       <td>{{$countrie->nom }}</td>
                       <td>{{$countrie->nutelephone }}</td>
                       <td>{{$countrie->adhesion }}</td>
                       <td>{{ $countrie->ccl }}</td>
                       <td>{{ $countrie->etat }}</td>
                        <td><a href="/edit/{{ $countrie->id }}" class="btn btn-outline-primary">Edit</a></td>
                        <td>
                            <form action="/delete/{{ $countrie->id }}" method="post">
                                <button class="btn btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer! ');"
                                    type="submit">supprimer</button>
                                @csrf
                                @method('delete')
                            </form>
                        </td>

                   

                 


                              </tr>
                           @endforeach
                       @else

                          <tr><td>Ne existe pas </td></tr>
                       @endif
                   </tbody>
               </table>
               
   

               <div class="pagination-block">
                   <?php //{{ $countries->links('layouts.paginationlinks') }} ?>
                   {{  $countries->appends(request()->input())->links('layouts.paginationlinks') }}
               </div>

             @endif
          </div>
       </div>
    </div><br><br><br>
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