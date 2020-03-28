@extends('layout.app')

@section('content')

<div class="page-menu">
    <div class="container">
       
            

        <div id="pageMenu-trigger">
            <i class="fa fa-bars"></i>
        </div>

    </div>
</div>
 <!-- Page Content -->
 <section id="page-content" class="no-sidebar">
        
    <div class="container">
        <!-- DataTable -->
        <div class="row mb-5">
            <div class="col-lg-6">
                <h4>Liste des privillèges actuels</h4>
            </div>           
            <div class="p-dropdown ml-3 float-right">
                @include('partials.option')
                
            </div>    <!-- Modal -->
            

        </div>
        </div>
        
        <div class="row">

            <div class="col-lg-12">
                <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($privilleges)>0)

                            @foreach ($privilleges as $privillege)
                                <tr>
                                    <td>{{$privillege->id}}</td>
                                    <td>{{$privillege->designation_privillege}}</td>
                                                                      
                                    <td><a class="ml-2" href="" data-toggle="modal" data-target="#modaleditproduit" data-original-title="Edit"><i class="icon-edit21"></i></a>
                                    <a class="ml-2" href="" data-toggle="tooltip" data-original-title="Delete"><i class="icon-trash-2"></i></a>
                                        <a class="ml-2" href="" data-toggle="tooltip" data-original-title="Settings"><i class="icon-settings1"></i></a>
                                    </td>
                                </tr>
                            
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
        <!-- end: DataTable -->
    </div>
    

    </section>
    

    
@endsection