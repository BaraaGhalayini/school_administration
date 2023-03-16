<div>
    @if ($show_table)
    <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('classroom_trans.add_classroom') }}</button><br><br>
    
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                style="text-align: center">
            <thead>
            <tr class="table-success">
                <th>#</th>
                <th>{{ trans('classroom_trans.Name_Class') }}</th>
                <th>{{ trans('classroom_trans.grade_name') }}</th>
                <th>{{ trans('main_trans.Processes') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($classrooms as $classroom) 
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $classroom->Name_Class }}</td>
                    <td>{{ $classroom->Grades->Name_Grade }}</td>

                    <td>
                        <button wire:click="showformedit({{ $classroom->id }})" title="{{ trans('main_trans.edit') }}"
                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $classroom->id }})" title="{{ trans('main_trans.delete') }}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    
    @include('livewire.classrooms.form_classroom')

@endif


</div>
