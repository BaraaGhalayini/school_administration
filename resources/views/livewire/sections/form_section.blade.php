<div class="row setup-content">
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('section_trans.name_ar')}}</label>
                    <input type="text" wire:model.lazy="name_ar"  class="form-control">
                    @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="name_en">{{trans('section_trans.name_en')}}</label>
                    <input type="text" wire:model.lazy="name_en" class="form-control" >
                    @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="name_grade" class="control-label">{{ trans('grade_trans.name_grade') }}</label>
                    <select wire:model.lazy="name_grade" class="custom-select" onchange="">
                        <!--placeholder-->
                        <option value="" selected >{{ trans('section_trans.Select_Grade') }}</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->Name_Grade }}</option>
                        @endforeach
                    </select>
                    @error('name_grade')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="name_class" class="control-label">{{ trans('classroom_trans.Name_Class') }}</label>
                    <select wire:model.lazy="name_class" name="name_class" class="custom-select" onchange="">
                        <!--placeholder-->
                        <option value="" selected >{{ trans('section_trans.Select_Class') }}</option>
                        @foreach ($classrooms as $classroom) 
                        <option value="{{ $classroom->id }}">{{ $classroom->Name_Class }}</option>
                        @endforeach
                    </select>
                    @error('name_class')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @if($updateMode)
                <div class="form-row">
                    <div class="col">
                        @if ($Status === 1)
                            <input
                                type="checkbox"
                                checked
                                class="form-check-input"
                                wire:model.lazy="Status"
                                value="1"
                                id="status_check">
                                
                        @else
                            <input
                                type="checkbox"
                                class="form-check-input"
                                wire:model.lazy="Status"
                                value="2"
                                id="status_check">
                        @endif
                        <label class="form-check-label" for="status_check">{{ trans('section_trans.Status_Section_AC') }}</label>

                    </div>
                </div>
                @endif
            <br>
            <div  class="form-row">
                <div class="col">
                @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_edit" type="button">{{trans('section_trans.edit_section')}}</button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="Submit_add" type="button">{{trans('section_trans.add_section')}}</button>
                @endif
                </div>
            </div>

        </div>
    </div>
</div>
