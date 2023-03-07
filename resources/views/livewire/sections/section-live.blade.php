<div>
    @if ($show_table)
    <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('section_trans.add_section') }}</button><br><br>
    
    <div class="card card-statistics h-100">
        <div class="card-body">
            <div class="accordion gray plus-icon round">

                @foreach ($grades as $grade)
                    <div class="acd-group">
                        <a href="#" class="acd-heading">{{ $grade->Name_Grade }}</a>
                        <div class="acd-des">
                            <div class="row">
                                <div class="col-xl-12 mb-30">
                                    <div class="card card-statistics h-100">
                                        <div class="card-body">
                                            <div class="d-block d-md-flex justify-content-between">
                                                <div class="d-block">
                                                </div>
                                            </div>
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0">
                                                    <thead>
                                                    <tr class="text-dark">
                                                        <th>#</th>
                                                        <th>{{ trans('section_trans.name_section') }}</th>
                                                        <th>{{ trans('classroom_trans.Name_Class') }}</th>
                                                        <th>{{ trans('section_trans.Status') }}</th>
                                                        <th>{{ trans('main_trans.Processes') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ($grade->Sections as $list_Sections)
                                                        <tr>
                                                            
                                                            <?php $i++; ?>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $list_Sections->Name_Section }} </td>
                                                            <td>{{ $list_Sections->Classrooms->Name_Class }} 
                                                            </td>
                                                            <td>
                                                                @if (@$list_Sections->Status === 1)
                                                                    <label
                                                                        class="badge badge-success">{{ trans('Sections_trans.Status_Section_AC') }}</label>
                                                                @else
                                                                    <label
                                                                        class="badge badge-danger">{{ trans('Sections_trans.Status_Section_No') }}</label>
                                                                @endif

                                                            </td>

                                                            <td>
                                                                <button wire:click="showformedit({{ $list_Sections->id }})" title="{{ trans('main_trans.edit') }}"
                                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $list_Sections->id }})" title="{{ trans('main_trans.delete') }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                    @endforeach 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
</div>

@else

    @include('livewire.sections.form_section')

@endif



</div>

