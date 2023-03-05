<div>
    @if ($show_table)
    <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('grade_trans.add_grade') }}</button><br><br>
    
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                style="text-align: center">
            <thead>
            <tr class="table-success">
                <th>#</th>
                <th>{{ trans('grade_trans.name_grade') }}</th>
                <th>{{ trans('grade_trans.note') }}</th>
                <th>{{ trans('main_trans.Processes') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0;  ?>
            @foreach ($grades as $grade)
                <tr>
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $grade->Name_Grade }}</td>
                    <td>{{ $grade->note }}</td>

                    <td>
                        <button wire:click="showformedit({{ $grade->id }})" title="{{ trans('main_trans.edit') }}"
                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        {{-- <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button> --}}
                        <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $grade->id }})" title="{{ trans('main_trans.delete') }}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    
    @include('livewire.grades.form_grade')

@endif


</div>
