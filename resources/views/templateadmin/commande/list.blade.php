@extends('templateadmin.layouts.app')

@section('content')

<div class="product-status mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Liste des Commandes</h4>
                        
                        <table>
                            <tr> 
                                <th>#</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Fabriquant</th>
                                <th>Stock</th>                                
                                <th>Prix</th>
                                <th>Action</th>
                            </tr>
                            @if (count($commandes)>0)

                            @foreach ($commandes as $commande)
                                <tr>
                                    <td>{{$commande->id}}</td>
                                    <td><img src="img/new-product/5-small.jpg" alt="commande" /></td>
                                    <td>{{$commande->nom}}</td>
                                    <td>{{$commande->description}}</td>
                                    <td>{{$commande->status}}</td>
                                    <td>{{$commande->fabricant}}</td>
                                    <td>{{$commande->type_commande_id}}</td>
                                    <td>{{$commande->prix_unitaire}}</td>
                                    <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>                                   
                                    {{-- <td><a class="ml-2" href="#" data-toggle="tooltip" data-original-title="Edit"><i class="icon-edit21"></i></a>
                                        <form action="{{route('deletecommande', $commande->id)}}" method="POST">
                                            @csrf
                                            <a class="ml-2" href="" data-toggle="tooltip" data-original-title="Delete"><i class="icon-trash-2"></i></a>
                                        </form>
                                        
                                        <a class="ml-2" href="#" data-toggle="tooltip" data-original-title="Settings"><i class="icon-settings1"></i></a>
                                    </td> --}}
                                </tr>
                            
                            @endforeach
                        @endif
                            
                        </table>
                        <div class="custom-pagination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Precedent</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection