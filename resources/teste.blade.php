<div class="card">
    <div class="card-header">
        <h4>List Hunters
        <a href="{{ url("create_hunter") }}" class="btn btn-success float-end"><i class="fa fa-plus"></i>&nbsp;Create</a>
        </h4>
    </div>
</div>


<div class="contained">
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <h4>List Hunters
                    <a href="{{ url("create_hunter") }}" class="btn btn-success float-end"><i class="fa fa-plus"></i>&nbsp;Create</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Year</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Type Hunter</th>
                                <th>Type Nen</th>
                                <th>Type Blood</th>
                                <th>Date Register</th>
                                <th>Date Update</th>
                                <th>Action(s)</th>        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hunter as $hxh)
                                <tr>
                                    <td>{{ $hxh->id }}</td>
                                    <td>{{ $hxh->name_hunter }}</td>
                                    <td>{{ $hxh->year_hunter }}</td>
                                    <td>{{ $hxh->height_hunter }} kg</td>
                                    <td>{{ $hxh->weight_hunter }} m</td>
                                    <td>{{ $hxh->type_hunter }}</td>
                                    <td>{{ $hxh->type_nen }}</td>
                                    <td>{{ $hxh->tipo_blood }}</td>
                                    <td>{{ \Carbon\Carbon::parse($hxh->date_register)->format('d/m/Y H:i:s')}}</td>
                                    <td>{{ $hxh->data_update == $hxh->date_register ? 'No update' : \Carbon\Carbon::parse($hxh->date_update)->format('d/m/Y H:i:s')}}</td>
                                    <td>
                                        <a href="{{ url("update_hunter/$hxh->id") }}" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;Update</a>
                                        {{ ' ' }}
                                        <a href="{{ url("delete_hunter/$hxh->id") }}" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    {{ $hunter->links() }}
                </div>
            </div> 
        </div>
    </div>    
</div>